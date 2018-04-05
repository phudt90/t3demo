<?php

namespace ELCA\Nano\Domain\Model\Cart;

/**
 * Cart Model
 */
class Cart {
  
  /**
   * Products
   *
   * @var \ELCA\Nano\Domain\Model\Battery[]
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
   * @return \ELCA\Nano\Domain\Model\Battery[]
   */
  public function getProducts() {
    return $this->products;
  }

  /**
   *
   * @param int $id
   * @return \ELCA\Nano\Domain\Model\Battery
   */
  public function getProductById($id) {
    return $this->products[$id];
  }

  /**
   * Get a product in cart
   * @param int $id 
   * @return \ELCA\Nano\Domain\Model\Battery
   *
   */
  public function getProduct($id) {
    return $this->getProductById($id);
  }
  
  /**
   * Add product to cart
   * @param \ELCA\Nano\Domain\Model\Battery $product
   */
  public function addProduct($product) {
    $id = $product->getUid();
  }
  
  /**
   * Remove product from cart
   * @param \ELCA\Nano\Domain\Model\Battery $product
   */
  public function removeProduct($product) {
    $id = $product->getUid();
  }
}
