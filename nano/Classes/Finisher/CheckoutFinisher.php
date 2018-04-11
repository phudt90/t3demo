<?php

namespace ELCA\Nano\Finisher;

use In2code\Powermail\Finisher\AbstractFinisher;

/**
 * Class CheckoutFinisher
 */
class CheckoutFinisher extends AbstractFinisher {
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
   * Cart product
   *
   * @var \ELCA\Nano\Domain\Model\Cart\Cart
   */
  protected $cart;
  
  /**
   * saveFinisher
   *
   * @return void
   */
  public function saveFinisher() {
    $settings = $this->getSettings();
    // check if is checkout form
    if($settings['main']['form'] != $this->configuration['checkoutFormUid']) return;
    //d($this->settings);
    $this->cart = $this->cartUtility->getCartFromSession($this->configuration);
    if(count($this->cart->getProducts()) > 0) {
      // clear cart
      $this->cart = $this->cartUtility->getNewCart($this->configuration);
      $this->sessionHandler->writeToSession($this->cart, $this->configuration['cartPid']);
    } else {
        
    }
  }
}