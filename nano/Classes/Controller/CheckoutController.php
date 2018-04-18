<?php

namespace ELCA\Nano\Controller;

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
      $uri = $this->uriBuilder
      ->setTargetPageUid($settings['cartPid'])
      ->build();
      $this->redirectToUri($uri);
    }
    
    $this->pluginSettings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
  }

  /**
   * initializeCreateAction
   *
   * @return void
   */
  public function initializeCreateAction() {
    /** @var \TYPO3\CMS\Extbase\Mvc\Controller\Argument $orderArgument */
    $orderArgument = $this->arguments->getArgument('order');
    $propertyMapping = $orderArgument->getPropertyMappingConfiguration();
    $propertyMapping->allowProperties('fullname', 'email', 'phone', 'address', 'comment');
    
    // allow creation of new objects (for validation)
    $propertyMapping->setTypeConverterOptions(PersistentObjectConverter::class, [
      PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED => true,
      PersistentObjectConverter::CONFIGURATION_MODIFICATION_ALLOWED => true
    ]);
    
  }

  /**
   * indexAction
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
   * @param \ELCA\Nano\Domain\Model\Order $order
   * @return void
   */
  public function createAction(\ELCA\Nano\Domain\Model\Order $order) {
    $settings = $this->settings;
    $arguments = $this->request->getArguments();
    $this->cart = $this->cartUtility->getCartFromSession($settings);
    
    if(!$this->cart->isCartEmpty()) {
      $order->setTitle('Đơn đặt hàng ' . date('d-m-Y H:i:s'));
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
}
