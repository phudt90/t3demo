<?php

namespace DTP\Nano\Domain\Model\Cart;

/**
 * CartProduct Model
 */
class CartProduct {
  
  /**
   * Uid
   *
   * @var int
   */
  protected $uid;
  
  /**
   * Cart
   *
   * @var \DTP\Nano\Domain\Model\Cart\Cart
   */
  protected $cart = null;
  
  /**
   * Thumb
   *
   * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
   */
  protected $thumb;
  
  /**
   * Title
   *
   * @var string
   */
  protected $title;
  
  /**
   * Code
   *
   * @var string
   */
  protected $code;
  
  /**
   * Brand
   *
   * @var string
   */
  protected $brand;
  
  /**
   * Quantity
   *
   * @var int
   */
  protected $quantity;

  /**
   *
   * @return number
   */
  public function getUid() {
    return $this->uid;
  }

  /**
   *
   * @param number $uid
   */
  public function setUid($uid) {
    $this->uid = $uid;
  }

  /**
   *
   * @return \DTP\Nano\Domain\Model\Cart\Cart
   */
  public function getCart() {
    return $this->cart;
  }

  /**
   *
   * @param \DTP\Nano\Domain\Model\Cart\Cart $cart
   */
  public function setCart($cart) {
    $this->cart = $cart;
  }

  /**
   *
   * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
   */
  public function getThumb() {
    return $this->thumb;
  }

  /**
   *
   * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $thumb
   */
  public function setThumb($thumb) {
    $this->thumb = $thumb;
  }

/**
   *
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   *
   * @param string $title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   *
   * @return string
   */
  public function getCode() {
    return $this->code;
  }

  /**
   *
   * @param string $code
   */
  public function setCode($code) {
    $this->code = $code;
  }

  /**
   *
   * @return string
   */
  public function getBrand() {
    return $this->brand;
  }

  /**
   *
   * @param string $brand
   */
  public function setBrand($brand) {
    $this->brand = $brand;
  }

  /**
   *
   * @return number
   */
  public function getQuantity() {
    return $this->quantity;
  }

  /**
   *
   * @param number $quantity
   */
  public function setQuantity($quantity) {
    $this->quantity = $quantity;
  }
}
