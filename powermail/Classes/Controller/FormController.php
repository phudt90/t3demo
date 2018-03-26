<?php
declare(strict_types=1);
namespace In2code\Powermail\Controller;

use In2code\Powermail\DataProcessor\DataProcessorRunner;
use In2code\Powermail\Domain\Factory\MailFactory;
use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Domain\Service\ConfigurationService;
use In2code\Powermail\Domain\Service\Mail\SendOptinConfirmationMailPreflight;
use In2code\Powermail\Domain\Service\Mail\SendReceiverMailPreflight;
use In2code\Powermail\Domain\Service\Mail\SendSenderMailPreflight;
use In2code\Powermail\Finisher\FinisherRunner;
use In2code\Powermail\Utility\ConfigurationUtility;
use In2code\Powermail\Utility\LocalizationUtility;
use In2code\Powermail\Utility\ObjectUtility;
use In2code\Powermail\Utility\OptinUtility;
use In2code\Powermail\Utility\SessionUtility;
use In2code\Powermail\Utility\TemplateUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/**
 * Class FormController
 */
class FormController extends AbstractController
{

    /**
     * @var PersistenceManager
     */
    protected $persistenceManager;

    /**
     * @var DataProcessorRunner
     */
    protected $dataProcessorRunner;

    /**
     * action show form for creating new mails
     *
     * @return void
     */
    public function formAction()
    {
        $form = $this->formRepository->findByUid($this->settings['main']['form']);
        $this->signalDispatch(__CLASS__, __FUNCTION__ . 'BeforeRenderView', [$form, $this]);
        SessionUtility::saveFormStartInSession($this->settings, $form);
        $this->view->assignMultiple(
            [
                'form' => $form,
                'ttContentData' => $this->contentObject->data,
                'messageClass' => $this->messageClass,
                'action' => ($this->settings['main']['confirmation'] ? 'confirmation' : 'create')
            ]
        );
    }

    /**
     * Rewrite Arguments to receive a clean mail object in createAction
     *
     * @return void
     */
    public function initializeCreateAction()
    {
        $this->forwardIfFormParamsDoNotMatch();
        $this->forwardIfMailParamEmpty();
        $this->reformatParamsForAction();
        $this->debugVariables();
    }

    /**
     * Action create entry
     *
     * @param Mail $mail
     * @param string $hash
     * @validate $mail In2code\Powermail\Domain\Validator\UploadValidator
     * @validate $mail In2code\Powermail\Domain\Validator\InputValidator
     * @validate $mail In2code\Powermail\Domain\Validator\PasswordValidator
     * @validate $mail In2code\Powermail\Domain\Validator\CaptchaValidator
     * @validate $mail In2code\Powermail\Domain\Validator\SpamShieldValidator
     * @validate $mail In2code\Powermail\Domain\Validator\UniqueValidator
     * @validate $mail In2code\Powermail\Domain\Validator\ForeignValidator
     * @validate $mail In2code\Powermail\Domain\Validator\CustomValidator
     * @return void
     */
    public function createAction(Mail $mail, string $hash = null)
    {
        $this->signalDispatch(__CLASS__, __FUNCTION__ . 'BeforeRenderView', [$mail, $hash, $this]);
        $this->dataProcessorRunner->callDataProcessors(
            $mail,
            $this->actionMethodName,
            $this->settings,
            $this->contentObject
        );
        if ($this->isMailPersistActive($hash)) {
            $this->saveMail($mail);
            $this->signalDispatch(__CLASS__, __FUNCTION__ . 'AfterMailDbSaved', [$mail, $this]);
        }
        if ($this->isNoOptin($mail, $hash)) {
            $this->sendMailPreflight($mail, $hash);
        } else {
            /** @noinspection PhpMethodParametersCountMismatchInspection */
            $mailPreflight = $this->objectManager->get(
                SendOptinConfirmationMailPreflight::class,
                $this->settings,
                $this->conf
            );
            $mailPreflight->sendOptinConfirmationMail($mail);
            $this->view->assign('optinActive', true);
        }
        if ($this->isPersistActive()) {
            $this->mailRepository->update($mail);
            $this->persistenceManager->persistAll();
        }

        $this->signalDispatch(__CLASS__, __FUNCTION__ . 'AfterSubmitView', [$mail, $hash, $this]);
        $this->prepareOutput($mail);

        $finisherRunner = $this->objectManager->get(FinisherRunner::class);
        $finisherRunner->callFinishers(
            $mail,
            $this->isNoOptin($mail, $hash),
            $this->actionMethodName,
            $this->settings,
            $this->contentObject
        );
    }

    /**
     * Rewrite Arguments to receive a clean mail object in confirmationAction
     *
     * @return void
     */
    public function initializeConfirmationAction()
    {
        $this->forwardIfFormParamsDoNotMatch();
        $this->forwardIfMailParamEmpty();
        $this->reformatParamsForAction();
        $this->debugVariables();
    }

    /**
     * Show Confirmation message after submit (if view is activated)
     *
     * @param Mail $mail
     * @validate $mail In2code\Powermail\Domain\Validator\UploadValidator
     * @validate $mail In2code\Powermail\Domain\Validator\InputValidator
     * @validate $mail In2code\Powermail\Domain\Validator\PasswordValidator
     * @validate $mail In2code\Powermail\Domain\Validator\CaptchaValidator
     * @validate $mail In2code\Powermail\Domain\Validator\SpamShieldValidator
     * @validate $mail In2code\Powermail\Domain\Validator\UniqueValidator
     * @validate $mail In2code\Powermail\Domain\Validator\ForeignValidator
     * @validate $mail In2code\Powermail\Domain\Validator\CustomValidator
     * @return void
     */
    public function confirmationAction(Mail $mail)
    {
        $this->signalDispatch(__CLASS__, __FUNCTION__ . 'BeforeRenderView', [$mail, $this]);
        $this->dataProcessorRunner->callDataProcessors(
            $mail,
            $this->actionMethodName,
            $this->settings,
            $this->contentObject
        );
        $this->prepareOutput($mail);
    }

    /**
     * @param Mail $mail
     * @param string $hash
     * @return void
     */
    protected function sendMailPreflight(Mail $mail, string $hash = null)
    {
        try {
            if ($this->isSenderMailEnabled() && $this->mailRepository->getSenderMailFromArguments($mail)) {
                /** @noinspection PhpMethodParametersCountMismatchInspection */
                $mailPreflight = $this->objectManager->get(
                    SendSenderMailPreflight::class,
                    $this->settings,
                    $this->conf
                );
                $mailPreflight->sendSenderMail($mail);
            }
            if ($this->isReceiverMailEnabled()) {
                /** @noinspection PhpMethodParametersCountMismatchInspection */
                $mailPreflight = $this->objectManager->get(SendReceiverMailPreflight::class, $this->settings);
                $isSent = $mailPreflight->sendReceiverMail($mail, $hash);
                if ($isSent === false) {
                    $this->addFlashMessage(
                        LocalizationUtility::translate('error_mail_not_created'),
                        '',
                        AbstractMessage::ERROR
                    );
                    $this->messageClass = 'error';
                }
            }
        } catch (\Exception $exception) {
            $logger = ObjectUtility::getLogger(__CLASS__);
            $logger->critical('Mail could not be sent', [$exception->getMessage()]);
        }
    }

    /**
     * Prepare output
     *
     * @param Mail $mail
     * @return void
     */
    protected function prepareOutput(Mail $mail)
    {
        $this->view->assignMultiple(
            [
                'variablesWithMarkers' => $this->mailRepository->getVariablesWithMarkersFromMail($mail, true),
                'mail' => $mail,
                'marketingInfos' => SessionUtility::getMarketingInfos(),
                'messageClass' => $this->messageClass,
                'ttContentData' => $this->contentObject->data,
                'uploadService' => $this->uploadService,
                'powermail_rte' => $this->settings['thx']['body'],
                'powermail_all' => TemplateUtility::powermailAll($mail, 'web', $this->settings, $this->actionMethodName)
            ]
        );
        $this->view->assignMultiple($this->mailRepository->getVariablesWithMarkersFromMail($mail, true));
        $this->view->assignMultiple($this->mailRepository->getLabelsWithMarkersFromMail($mail));
    }

    /**
     * Save mail on submit
     *
     * @param Mail $mail
     * @return void
     * @codeCoverageIgnore
     */
    protected function saveMail(Mail $mail)
    {
        $mailFactory = $this->objectManager->get(MailFactory::class);
        $mailFactory->prepareMailForPersistence($mail, $this->settings);
        $this->mailRepository->add($mail);
        $this->persistenceManager->persistAll();
    }

    /**
     * Confirm Double Optin
     *
     * @param int $mail mail uid
     * @param string $hash Given Hash String
     * @return void
     */
    public function optinConfirmAction(int $mail, string $hash)
    {
        $this->signalDispatch(__CLASS__, __FUNCTION__ . 'BeforeRenderView', [$mail, $hash, $this]);
        $mail = $this->mailRepository->findByUid($mail);
        $this->forwardIfFormParamsDoNotMatchForOptinConfirm($mail);
        $labelKey = 'failed';

        if ($mail !== null && OptinUtility::checkOptinHash($hash, $mail)) {
            if ($mail->getHidden()) {
                $mail->setHidden(false);
                $this->mailRepository->update($mail);
                $this->persistenceManager->persistAll();

                $this->forward('create', null, null, ['mail' => $mail, 'hash' => $hash]);
            }
            $labelKey = 'done';
        }
        $this->view->assign('labelKey', $labelKey);
    }

    /**
     * Marketing Tracking Action
     *
     * @param string $referer Referer
     * @param int $language Frontend Language Uid
     * @param int $pid Page Id
     * @param int $mobileDevice Is mobile device?
     * @return void
     * @codeCoverageIgnore
     */
    public function marketingAction($referer = null, int $language = 0, int $pid = 0, int $mobileDevice = 0)
    {
        SessionUtility::storeMarketingInformation($referer, $language, $pid, $mobileDevice);
    }

    /**
     * Initializes this object
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function initializeObject()
    {
        // @extensionScannerIgnoreLine Seems to be a false positive: getContentObject() is still correct in 9.0
        $this->contentObject = $this->configurationManager->getContentObject();
        $configurationService = $this->objectManager->get(ConfigurationService::class);
        $this->conf = $configurationService->getTypoScriptConfiguration();
        ConfigurationUtility::mergeTypoScript2FlexForm($this->settings);
        if ($this->settings['debug']['settings']) {
            $logger = ObjectUtility::getLogger(__CLASS__);
            $logger->info('Powermail settings', $this->settings);
        }
        $this->signalDispatch(__CLASS__, __FUNCTION__ . 'Settings', [$this]);
    }

    /**
     * Initialize Action
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function initializeAction()
    {
        parent::initializeAction();

        // @codeCoverageIgnoreStart
        if (!isset($this->settings['staticTemplate'])) {
            $this->controllerContext = $this->buildControllerContext();
            $this->addFlashMessage(LocalizationUtility::translate('error_no_typoscript'), '', AbstractMessage::ERROR);
        }
    }

    /**
     * Forward to formAction if wrong form in plugin variables given
     *        used for createAction() and confirmationAction()
     *
     * @return void
     */
    protected function forwardIfFormParamsDoNotMatch()
    {
        $arguments = $this->request->getArguments();
        $formsToContent = GeneralUtility::intExplode(',', $this->settings['main']['form']);
        if (is_array($arguments['mail']) && !in_array($arguments['mail']['form'], $formsToContent)) {
            $this->forward('form');
        }
    }

    /**
     * Forward to formAction if no mail param given
     *
     * @return void
     */
    protected function forwardIfMailParamEmpty()
    {
        $arguments = $this->request->getArguments();
        if (empty($arguments['mail'])) {
            $logger = ObjectUtility::getLogger(__CLASS__);
            $logger->alert('Redirect (mail empty)', $arguments);
            $this->forward('form');
        }
    }

    /**
     * Forward to formAction if wrong form in plugin variables given
     *        used in optinConfirmAction()
     *
     * @param Mail $mail
     * @return void
     */
    protected function forwardIfFormParamsDoNotMatchForOptinConfirm(Mail $mail = null)
    {
        if ($mail !== null) {
            $formsToContent = GeneralUtility::intExplode(',', $this->settings['main']['form']);
            if (!in_array($mail->getForm()->getUid(), $formsToContent)) {
                $logger = ObjectUtility::getLogger(__CLASS__);
                $logger->alert('Redirect (optin)', [$formsToContent, (array)$mail]);
                $this->forward('form');
            }
        }
    }

    /**
     * Decide if the mail object should be persisted or not
     *        persist if
     *            - enabled with TypoScript AND hash is not set OR
     *            - optin is enabled AND hash is not set (even if disabled in TS)
     *
     * @param string $hash
     * @return bool
     */
    protected function isMailPersistActive(string $hash = null): bool
    {
        return ($this->isPersistActive() || !empty($this->settings['main']['optin'])) && $hash === null;
    }

    /**
     * Check if mail should be send
     *        send when
     *            - optin is deaktivated OR
     *            - optin is active AND hash is correct
     *
     * @param Mail $mail
     * @param string $hash
     * @return bool
     */
    protected function isNoOptin(Mail $mail, string $hash = null): bool
    {
        return empty($this->settings['main']['optin']) ||
            (!empty($this->settings['main']['optin']) && OptinUtility::checkOptinHash($hash, $mail));
    }

    /**
     * @return void
     * @codeCoverageIgnore
     */
    protected function debugVariables()
    {
        if (!empty($this->settings['debug']['variables'])) {
            $logger = ObjectUtility::getLogger(__CLASS__);
            $logger->info('Variables', GeneralUtility::_POST());
        }
    }

    /**
     * @return bool
     */
    protected function isPersistActive(): bool
    {
        return $this->settings['db']['enable'] === '1';
    }

    /**
     * @return bool
     */
    protected function isSenderMailEnabled(): bool
    {
        return $this->settings['sender']['enable'] === '1';
    }

    /**
     * @return bool
     */
    protected function isReceiverMailEnabled(): bool
    {
        return $this->settings['receiver']['enable'] === '1';
    }

    /**
     * @param DataProcessorRunner $dataProcessorRunner
     * @return void
     */
    public function injectDataProcessorRunner(DataProcessorRunner $dataProcessorRunner)
    {
        $this->dataProcessorRunner = $dataProcessorRunner;
    }

    /**
     * @param PersistenceManager $persistenceManager
     * @return void
     */
    public function injectPersistenceManager(PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }
}
