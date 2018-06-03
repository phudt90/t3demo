<?php

namespace DTP\Nano\Controller;

/**
 * Cart controller
 */
class CartController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   * Session Handler
   *
   * @var \DTP\Nano\Service\SessionHandler
   * @inject
   */
  protected $sessionHandler;
  
  /**
   * Cart Utility
   *
   * @var \DTP\Nano\Utility\CartUtility
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
   * Order Repository
   *
   * @var \DTP\Nano\Domain\Repository\OrderRepository
   * @inject
   */
  protected $orderRepository;
  
  /**
   * Cart product
   *
   * @var \DTP\Nano\Domain\Model\Cart\Cart
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
   * Show list products in cart
   * @return void
   */
  public function indexAction() {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    
    $this->view->assign('products', $this->cart->getProducts());
  }
  
  /**
   * Show mini cart
   * @return void
   */
  public function miniCartAction() {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    $this->view->assign('total', $this->cart->getTotalProducts());
    $this->view->assign('products', $this->cart->getProducts());
  }

  /**
   * Add product to cart
   * @param \DTP\Nano\Domain\Model\Battery $product
   */
  public function addProductAction(\DTP\Nano\Domain\Model\Battery $product) {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    
    $this->cart->addProduct($product);
    
    $this->cartUtility->writeCartToSession($this->cart, $this->settings);
    
    $this->view->assign('total', $this->cart->getTotalProducts());
    $this->view->assign('products', $this->cart->getProducts());
  }
  
  /**
   * Update product from cart
   * @param string $uid
   * @param string $quantity
   */
  public function updateProductAction($uid, $quantity = 1) {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    
    $this->cart->updateProductByUid($uid, $quantity);
    $this->cartUtility->writeCartToSession($this->cart, $this->settings);

    return $this->redirectToUri($this->getCartIndexUri($this->settings['cartPid']));
  }
  
  /**
   * Remove product from cart
   * @param string $uid
   */
  public function removeProductAction($uid) {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    
    $this->cart->removeProductByUid($uid);

    $this->cartUtility->writeCartToSession($this->cart, $this->settings);
    
    return $this->redirectToUri($this->getCartIndexUri($this->settings['cartPid']));
  }
  
  /**
   * Clear Cart
   */
  public function clearCartAction() {
    $this->cart = $this->cartUtility->getNewCart($this->settings);
    $this->sessionHandler->writeToSession($this->cart, $this->settings['cartPid']);
    
    return $this->redirectToUri($this->getCartIndexUri($this->settings['cartPid']));
  }

  protected function getCartIndexUri($cartPid) {
    return $this->uriBuilder
      ->setTargetPageUid($cartPid)
      ->build();
  }
}
