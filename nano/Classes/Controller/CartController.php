<?php

namespace ELCA\Nano\Controller;

/**
 * Cart controller
 */
class CartController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
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
   * Show list products in cart
   *
   */
  public function indexAction() {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    
    $this->view->assign('products', $this->cart->getProducts());
  }

  /**
   * Add product to cart
   * @param \ELCA\Nano\Domain\Model\Battery $product
   */
  public function addProductAction(\ELCA\Nano\Domain\Model\Battery $product) {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings);
    
    $this->cart->addProduct($product);
    
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
