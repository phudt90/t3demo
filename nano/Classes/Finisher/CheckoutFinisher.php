<?php

namespace ELCA\Nano\Finisher;

use In2code\Powermail\Finisher\AbstractFinisher;

/**
 * Class CheckoutFinisher
 */
class CheckoutFinisher extends AbstractFinisher {
  /**
   * Persistence Manager
   *
   * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
   * @inject
   */
  protected $persistenceManager;
  
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
   * Order Repository
   *
   * @var \ELCA\Nano\Domain\Repository\OrderRepository
   * @inject
   */
  protected $orderRepository;
  
  /**
   * Order Product Repository
   *
   * @var \ELCA\Nano\Domain\Repository\OrderProductRepository
   * @inject
   */
  protected $orderProductRepository;
  
  /**
   * Cart
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
      
      $order = new \ELCA\Nano\Domain\Model\Order;
      $order->setTitle('Đơn đặt hàng ' . date('d-m-Y H:i:s'));
      $order->setFullname('fullname');
      $order->setEmail('email');
      $order->setPhone('phone');
      $order->setAddress('address');
      $order->setStatus(1);
      $order->setComment('comment');
      $order->setPid(20);
      $this->orderRepository->add($order);
      
      $cartProducts = $this->cart->getProducts();
      foreach($cartProducts as $cartProduct) {
        $orderProduct = new \ELCA\Nano\Domain\Model\OrderProduct();
        $orderProduct->setOrder($order);
        $orderProduct->setTitle($cartProduct->getTitle());
        $orderProduct->setModel($cartProduct->getCode());
        $orderProduct->setQuantity($cartProduct->getQuantity());
        $orderProduct->setPid(20);
        $this->orderProductRepository->add($orderProduct);
      }
      $this->persistenceManager->persistAll();
      
      // clear cart
      $this->cart = $this->cartUtility->getNewCart($this->configuration);
      $this->sessionHandler->writeToSession($this->cart, $this->configuration['cartPid']);
    } else {
        
    }
  }
}