<?php

namespace DTP\Nano\Utility;

/**
 * Cart Utility
 */
class CartUtility {
  /**
   * Object Manager
   *
   * @var \TYPO3\CMS\Extbase\Object\ObjectManager
   * @inject
   */
  protected $objectManager;
  
  /**
   * Session Handler
   *
   * @var \DTP\Nano\Service\SessionHandler
   * @inject
   */
  protected $sessionHandler;

  /**
   * Restore cart from session or creates a new one
   *
   * @param array $cartSettings
   *
   * @return \DTP\Nano\Domain\Model\Cart\Cart
   */
  public function getCartFromSession(array $cartSettings) {
    $cart = $this->sessionHandler->restoreFromSession($cartSettings['cartPid']);
    if (! $cart) {
      $cart = $this->getNewCart($cartSettings);
    }
    return $cart;
  }

  /**
   * Restore cart from session or creates a new one
   *
   * @param \DTP\Nano\Domain\Model\Cart\Cart $cart
   * @param array $cartSettings
   */
  public function writeCartToSession($cart, $cartSettings) {
    $this->sessionHandler->writeToSession($cart, $cartSettings['cartPid']);
  }

  /**
   * Creates a new cart
   *
   * @param array $cartSettings
   * 
   * @return \DTP\Nano\Domain\Model\Cart\Cart
   */
  public function getNewCart(array $cartSettings) {
    $cart = $this->objectManager->get(\DTP\Nano\Domain\Model\Cart\Cart::class);

    return $cart;
  }

  /**
   *
   * @param array $services
   * @param int $serviceId
   *
   * @return mixed
   */
  public function getServiceById($services, $serviceId) {
    foreach ($services as $service) {
      if ($service->getId() == $serviceId) {
        return $service;
      }
    }
    
    return false;
  }
}
