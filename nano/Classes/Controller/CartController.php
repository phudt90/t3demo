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
    $this->cart = $this->cartUtility->getCartFromSession($this->settings, $this->pluginSettings);
  }

  /**
   * Add product to cart
   *
   */
  public function addProductAction() {
    $this->cart = $this->cartUtility->getCartFromSession($this->settings, $this->pluginSettings);
  }
  
  /**
   * Add to cart button
   * @param \ELCA\Nano\Domain\Model\Battery $product
   */
  public function addToCartAction(\ELCA\Nano\Domain\Model\Battery $product = null) {
    d($this->request->getArguments());
    d($this->pluginSettings);
  }
}
