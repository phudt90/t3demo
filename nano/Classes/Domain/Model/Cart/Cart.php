<?php

namespace ELCA\Nano\Domain\Model\Cart;

/**
 * Cart Model
 */
class Cart {
  
  /**
   * Products
   *
   * @var \ELCA\Nano\Domain\Model\Cart\CartProduct[]
   */
  protected $products;

  /**
   * __construct
   *
   * @return Cart
   */
  public function __construct() { 
    $this->products = [];
  }

  /**
   * Get products in cart
   * @return \ELCA\Nano\Domain\Model\Cart\CartProduct[]
   */
  public function getProducts() {
    return $this->products;
  }

  /**
   *
   * @param int $uid
   * @return \ELCA\Nano\Domain\Model\Cart\CartProduct
   */
  public function getProductByUid($uid) {
    return $this->products[$uid];
  }

  /**
   * Get a product in cart
   * @param int $uid 
   * @return \ELCA\Nano\Domain\Model\Battery
   *
   */
  public function getProduct($uid) {
    return $this->getProductByUid($uid);
  }
  
  /**
   * Check if cart is empty
   * @return bool
   *
   */
  public function isCartEmpty() {
    return (count($this->getProducts()) > 0) ? false : true;
  }
  
  /**
   * Get total products
   * @return int
   *
   */
  public function getTotalProducts() {
    return count($this->getProducts());
  }
  
  /**
   * Add product to cart
   * @param mixed $product
   */
  public function addProduct($product) {
    $uid = $product->getUid();
    if($product instanceof \ELCA\Nano\Domain\Model\Battery) {
      $newProduct = $this->createCartProductFromBatteryObject($product);      
    } else {
      // TODO throw exception
    }
    if (isset($this->products[$uid])) {
      $existingProduct = $this->products[$uid];
      $this->changeProduct($existingProduct, $newProduct);
    } else {
      $this->products[$uid] = $newProduct;
    }
  }
  
  /**
   * @param \ELCA\Nano\Domain\Model\Battery $product
   */
  protected function createCartProductFromBatteryObject($product) {
    $cartProduct = new \ELCA\Nano\Domain\Model\Cart\CartProduct();
    $cartProduct->setUid($product->getUid());
    $cartProduct->setTitle($product->getTitle());
    $cartProduct->setThumb($product->getFirstFalMedia());
    $cartProduct->setCode($product->getCode());
    $cartProduct->setBrand($product->getBrand()->getTitle());
    $cartProduct->setQuantity(1);
    return $cartProduct;
  }
  
  /**
   * @param \ELCA\Nano\Domain\Model\Cart\CartProduct $existingProduct
   * @param \ELCA\Nano\Domain\Model\Cart\CartProduct $newProduct
   */
  public function changeProduct($existingProduct, $newProduct)
  {
    $uid = $existingProduct->getUid();
    $newQuantity = $existingProduct->getQuantity() + $newProduct->getQuantity();
    
    if($product = $this->getProduct($uid)) {
      $product->setQuantity($newQuantity);
      $this->products[$uid] = $product;
    }
  }
  
  /**
   * @param int $uid
   * @param int $quantity
   */
  public function updateProductByUid($uid, $quantity) {
    if($product = $this->getProduct($uid)) {
      $product->setQuantity($quantity);
      $this->products[$uid] = $product;
    }
  }
  
  /**
   * @param mixed $uid
   *
   * @return bool
   */
  public function removeProductByUid($uid) {
    if(is_scalar($uid) && isset($this->products[$uid])) {
      $product = $this->products[$uid];
      $this->removeProduct($product);
    } else {
      return -1;
    }
    
    return true;
  }
  
  /**
   * Remove product from cart
   * @param \ELCA\Nano\Domain\Model\Cart\CartProduct $product
   */
  public function removeProduct($product) {
    $uid = $product->getUid();
    if(isset($this->products[$uid])) {
      unset($this->products[$uid]);
    }
  }
}
