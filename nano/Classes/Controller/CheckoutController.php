<?php

namespace ELCA\Nano\Controller;

use In2code\Powermail\Domain\Model\Answer;
use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Domain\Repository\AnswerRepository;
use In2code\Powermail\Utility\SessionUtility;
use TYPO3\CMS\Core\Error\Http\PageNotFoundException;
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;

/**
 * Checkout controller
 */
class CheckoutController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   * Session Handler
   *
   * @var \ELCA\Nano\Service\SessionHandler
   * @inject
   */
  protected $sessionHandler;
  
  /**
   * Cart Utility
   *
   * @var \ELCA\Nano\Utility\CartUtility
   * @inject
   */
  protected $cartUtility;
  
  /**
   * Plugin Settings
   *
   * @var array
   */
  protected $pluginSettings;
  
  /**
   * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
   * @inject
   */
  protected $contentObject;
  
  /**
   * @var \In2code\Powermail\Domain\Service\UploadService
   * @inject
   */
  protected $uploadService;
  
  /**
   * @var \In2code\Powermail\DataProcessor\DataProcessorRunner
   * @inject
   */
  protected $dataProcessorRunner;
  
  /**
   * @var \In2code\Powermail\Domain\Factory\MailFactory
   * @inject
   */
  protected $mailFactory;
  
  /**
   * Persistence Manager
   *
   * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
   * @inject
   */
  protected $persistenceManager;
  
  /**
   * Order Repository
   *
   * @var \ELCA\Nano\Domain\Repository\OrderRepository
   * @inject
   */
  protected $orderRepository;
  
  /**
   * OrderProduct Repository
   *
   * @var \ELCA\Nano\Domain\Repository\OrderProductRepository
   * @inject
   */
  protected $orderProductRepository;
  
  /**
   * @var \In2code\Powermail\Domain\Repository\FormRepository
   * @inject
   */
  protected $formRepository;
  
  /**
   * @var \In2code\Powermail\Domain\Repository\MailRepository
   * @inject
   */
  protected $mailRepository;
  
  /**
   * @var \In2code\Powermail\Domain\Repository\FieldRepository
   * @inject
   */
  protected $fieldRepository;
  
  /**
   * Cart product
   *
   * @var \ELCA\Nano\Domain\Model\Cart\Cart
   */
  protected $cart;

  /**
   * Initializes all actions.
   */
  protected function initializeAction() {
    $settings = $this->settings;
    $this->cart = $this->cartUtility->getCartFromSession($settings);
    if($this->cart->isCartEmpty()) {
      return $this->uriBuilder
      ->setTargetPageUid($settings['cartPid'])
      ->build();
    }
    
    $this->pluginSettings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
  }

  /**
   * initializeCreateAction
   *
   * @return void
   */
  public function initializeCreateAction() {
    //$this->forwardIfFormParamsDoNotMatch();
    //$this->forwardIfMailParamEmpty();
    $this->reformatParamsForAction();
  }

  /**
   * index
   * @return void
   */
  public function indexAction() {
    $settings = $this->settings;
    $this->cart = $this->cartUtility->getCartFromSession($settings);
    $form = $this->formRepository->findByUid($settings['checkoutFormUid']);
    SessionUtility::saveFormStartInSession($settings, $form);
    
    $this->view->assignMultiple([
      'form' => $form,
      'ttContentData' => $this->contentObject->data,
      'products' => $this->cart->getProducts()
    ]);
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
  public function createAction(Mail $mail, string $hash = null) {
    $settings = $this->settings;
    $this->dataProcessorRunner->callDataProcessors(
      $mail,
      $this->actionMethodName,
      $this->settings,
      $this->contentObject
    );
   
    $this->mailFactory->prepareMailForPersistence($mail, $settings);
    $this->mailRepository->add($mail);
    $this->persistenceManager->persistAll();
    
    $this->cart = $this->cartUtility->getCartFromSession($settings);
    $answers = $mail->getAnswersByFieldMarker();
    if(!$this->cart->isCartEmpty()) {
      $order = new \ELCA\Nano\Domain\Model\Order;
      $order->setTitle('Đơn đặt hàng ' . date('d-m-Y H:i:s'));
      if(isset($answers['hoten'])) {
        $order->setFullname($answers['hoten']->getValue());
      }
      if(isset($answers['email'])) {
        $order->setEmail($answers['email']->getValue());
      }
      if(isset($answers['sodienthoai'])) {
        $order->setPhone($answers['sodienthoai']->getValue());
      }
      if(isset($answers['diachi'])) {
        $order->setAddress($answers['diachi']->getValue());
      }
      if(isset($answers['ghichudonhang'])) {
        $order->setComment($answers['ghichudonhang']->getValue());
      }
      $order->setStatus(1);
      $order->setPid($settings['orderStoragePid']);
      
      if($cartProducts = $this->cart->getProducts()) {
        foreach($cartProducts as $cartProduct) {
          $orderProduct = new \ELCA\Nano\Domain\Model\OrderProduct();
          $orderProduct->setOrder($order);
          $orderProduct->setTitle($cartProduct->getTitle());
          $orderProduct->setModel($cartProduct->getCode());
          $orderProduct->setQuantity($cartProduct->getQuantity());
          $orderProduct->setPid($settings['orderStoragePid']);
          $this->orderProductRepository->add($orderProduct);
        }
      }
      
      $this->mailRepository->update($mail);
      $this->orderRepository->add($order);
      $this->persistenceManager->persistAll();
      
      $this->uriBuilder->reset()
        ->setTargetPageUid($settings['checkoutPid'])
        ->setUseCacheHash(0)
        ->setCreateAbsoluteUri(true)
      ;
      if (\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SSL')) {
        $this->uriBuilder->setAbsoluteUriScheme('https');
      }
      $arguments = [
        'action' => 'success',
        'hash' => $order->getHash(),
      ];
      $uri = $this->uriBuilder->uriFor($actionName, $arguments);
      $this->redirectToUri($uri);
    } else {
      throw new PageNotFoundException('The requested page does not exist!', 1301648781);
    }
  }

  /**
   * Order successfully
   * @param string $hash 
   */
  public function successAction($hash = '') {
    $settings = $this->settings;
    /* @var \ELCA\Nano\Domain\Model\Order $order */
    if(!empty($hash) && ($order = $this->orderRepository->findByHash($hash))) {
      $this->view->assign('order', $order);
    } else {
      throw new PageNotFoundException('The requested page does not exist!', 1301648781);
    }
    
    $this->cart = $this->cartUtility->getNewCart($settings);
    $this->sessionHandler->writeToSession($this->cart, $settings['cartPid']);
  }

  /**
   * Reformat array for createAction
   *
   * @return void
   */
  protected function reformatParamsForAction() {
    $this->uploadService->preflight($this->settings);
    $arguments = $this->request->getArguments();
    if (! isset($arguments['field'])) {
      return;
    }
    $newArguments = [
      'mail' => $arguments['mail']
    ];
    // allow subvalues in new property mapper
    $mailMvcArgument = $this->arguments->getArgument('mail');
    $propertyMapping = $mailMvcArgument->getPropertyMappingConfiguration();
    $propertyMapping->allowProperties('answers');
    $propertyMapping->allowCreationForSubProperty('answers');
    $propertyMapping->allowModificationForSubProperty('answers');
    $propertyMapping->allowProperties('form');
    $propertyMapping->allowCreationForSubProperty('form');
    $propertyMapping->allowModificationForSubProperty('form');
    
    // allow creation of new objects (for validation)
    $propertyMapping->setTypeConverterOptions(PersistentObjectConverter::class, [
      PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED => true,
      PersistentObjectConverter::CONFIGURATION_MODIFICATION_ALLOWED => true
    ]);
    
    $iteration = 0;
    foreach ((array) $arguments['field'] as $marker => $value) {
      // ignore internal fields (honeypod)
      if (substr($marker, 0, 2) === '__') {
        continue;
      }
      $fieldUid = $this->fieldRepository->getFieldUidFromMarker($marker, $arguments['mail']['form']);
      // Skip fields without Uid (secondary password, upload)
      if ($fieldUid === 0) {
        continue;
      }
      
      // allow subvalues in new property mapper
      $propertyMapping->forProperty('answers')->allowProperties($iteration);
      $propertyMapping->forProperty('answers.' . $iteration)->allowAllProperties();
      $propertyMapping->allowCreationForSubProperty('answers.' . $iteration);
      $propertyMapping->allowModificationForSubProperty('answers.' . $iteration);
      
      /** @var Field $field */
      $field = $this->fieldRepository->findByUid($fieldUid);
      $valueType = $field->dataTypeFromFieldType($this->fieldRepository->getFieldTypeFromMarker($marker, $arguments['mail']['form']));
      if ($valueType === Answer::VALUE_TYPE_UPLOAD && is_array($value)) {
        $value = $this->uploadService->getNewFileNamesByMarker($marker);
      }
      if (is_array($value)) {
        if (empty($value)) {
          $value = '';
        } else {
          $value = json_encode($value);
        }
      }
      $newArguments['mail']['answers'][$iteration] = [
        'field' => strval($fieldUid),
        'value' => $value,
        'valueType' => $valueType
      ];
      
      // edit form: add answer id
      if (! empty($arguments['field']['__identity'])) {
        $answerRepository = $this->objectManager->get(AnswerRepository::class);
        $answer = $answerRepository->findByFieldAndMail($fieldUid, $arguments['field']['__identity']);
        if ($answer !== null) {
          $newArguments['mail']['answers'][$iteration]['__identity'] = $answer->getUid();
        }
      }
      $iteration++;
    }
    
    // edit form: add mail id
    if (! empty($arguments['field']['__identity'])) {
      $newArguments['mail']['__identity'] = $arguments['field']['__identity'];
    }
    
    $this->request->setArguments($newArguments);
    $this->request->setArgument('field', null);
  }
}
