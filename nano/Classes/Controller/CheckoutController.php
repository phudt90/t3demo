<?php

namespace ELCA\Nano\Controller;

use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Finisher\FinisherRunner;
use TYPO3\CMS\Core\Error\Http\PageNotFoundException;

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
   * Order Repository
   *
   * @var \ELCA\Nano\Domain\Repository\OrderRepository
   * @inject
   */
  protected $orderRepository;
  
  /**
   * @var \In2code\Powermail\Domain\Repository\FormRepository
   * @inject
   */
  protected $formRepository;
  
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
    $this->pluginSettings = $this->configurationManager->getConfiguration(
      \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
    );
  }

  /**
   * index
   * @return void
   */
  public function indexAction() {
    $settings = $this->settings;
    $this->cart = $this->cartUtility->getCartFromSession($settings);
    if($this->cart->isCartEmpty()) {
      return $this->uriBuilder
        ->setTargetPageUid($settings['cartPid'])
        ->build();
    }
    $form = $this->formRepository->findByUid($settings['checkoutFormUid']);
    
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
    if ($this->isMailPersistActive($hash)) {
      $this->saveMail($mail);
    }
 
    if ($this->isPersistActive()) {
      $this->mailRepository->update($mail);
      $this->persistenceManager->persistAll();
    }
   
    $this->prepareOutput($mail);
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
      $message = 'The requested page does not exist!';
      throw new PageNotFoundException($message, 1301648781);
    }
    
    $this->cart = $this->cartUtility->getNewCart($settings);
    $this->sessionHandler->writeToSession($this->cart, $settings['cartPid']);
  }
}
