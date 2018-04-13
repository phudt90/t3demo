<?php

namespace ELCA\Nano\Finisher;

use In2code\Powermail\Finisher\AbstractFinisher;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Utility\HttpUtility;

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
   * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
   * @inject
   */
  protected $uriBuilder;
  
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
   * @var string
   */
  protected $flashMessageQueueDefaultIdentifier = 'extbase.flashmessages.nano.page.shoppingcart';
  
  /**
   * @var \TYPO3\CMS\Core\Messaging\FlashMessageService
   * @inject
   */
  protected $flashMessageService;
  
  /**
   * saveFinisher
   *
   * @return void
   */
  public function saveFinisher() {
    $settings = $this->getSettings();
    $configuration = $this->getConfiguration();
    // check if is checkout form
    if($settings['main']['form'] != $configuration['checkoutFormUid']) return;
    
    $mail = $this->getMail();
    $answers = $mail->getAnswersByFieldMarker();
    $this->cart = $this->cartUtility->getCartFromSession($configuration);
    if(count($this->cart->getProducts()) > 0) {
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
      
      //d($order);die;
      $uri = $this->uriBuilder->setTargetPageUid(21)->setArguments([
        'tx_nano_pagecheckoutsuccess[hash]' => $order->getHash()
      ])->build();
      if (!empty($uri)) {
        HttpUtility::redirect($uri);
      }
    } else {
        
    }
  }
  
  /**
   * Creates a Message object and adds it to the FlashMessageQueue.
   *
   * @param string $messageBody The message
   * @param string $messageTitle Optional message title
   * @param int $severity Optional severity, must be one of \TYPO3\CMS\Core\Messaging\FlashMessage constants
   * @param bool $storeInSession Optional, defines whether the message should be stored in the session (default) or not
   * @throws \InvalidArgumentException if the message body is no string
   * @see \TYPO3\CMS\Core\Messaging\FlashMessage
   * @api
   */
  protected function addFlashMessage($messageBody, $messageTitle = '', $severity = AbstractMessage::OK, $storeInSession = true)
  {
    if (!is_string($messageBody)) {
      throw new \InvalidArgumentException('The message body must be of type string, "' . gettype($messageBody) . '" given.', 1243258395);
    }
    /* @var \TYPO3\CMS\Core\Messaging\FlashMessage $flashMessage */
    $flashMessage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
      \TYPO3\CMS\Core\Messaging\FlashMessage::class,
      (string)$messageBody,
      (string)$messageTitle,
      $severity,
      $storeInSession
    );
    $this->flashMessageService->getMessageQueueByIdentifier()->enqueue($flashMessage);
  }
}