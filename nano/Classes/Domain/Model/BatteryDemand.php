<?php

namespace DTP\Nano\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Battery Demand
 */
class BatteryDemand extends AbstractEntity implements \DTP\Nano\Domain\Model\DemandInterface {
  
  /** @var int */
  protected $application;
  
  /** @var int */
  protected $brand;
  
  /** @var int */
  protected $vbrand;
  
  /** @var int */
  protected $vmodel;
  
  /** @var \DTP\Nano\Domain\Model\Category */
  protected $category;
  
  /** @var int */
  protected $limit;
  
  /** @var int */
  protected $offset;

  /**
   * 
   * @param int $application
   */
  public function setApplication($application) {
    $this->application = $application;
    return $this;
  }

  /**
   *
   * @return int
   */
  public function getApplication() {
    return $this->application;
  }

  /**
   *
   * @param int $brand
   */
  public function setBrand($brand) {
    $this->brand = $brand;
  }
  
  /**
   *
   * @return int
   */
  public function getBrand() {
    return $this->brand;
  }


  /**
   *
   * @return int
   */
  public function getVbrand() {
    return $this->vbrand;
  }

  /**
   *
   * @param int $vbrand
   */
  public function setVbrand($vbrand) {
    $this->vbrand = $vbrand;
  }

  /**
   *
   * @return int
   */
  public function getVmodel() {
    return $this->vmodel;
  }

  /**
   *
   * @param int $vmodel
   */
  public function setVmodel($vmodel) {
    $this->vmodel = $vmodel;
  }

  /**
   *
   * @return \DTP\Nano\Domain\Model\Category
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   *
   * @param \DTP\Nano\Domain\Model\Category $category
   */
  public function setCategory($category) {
    $this->category = $category;
  }

/**
   * Set order
   *
   * @param string $order
   * order
   */
  public function setOrder($order) {
    $this->order = $order;
    return $this;
  }

  /**
   * Get order
   *
   * @return string
   */
  public function getOrder() {
    return $this->order;
  }

  /**
   * Set limit
   *
   * @param int $limit
   * limit
   */
  public function setLimit($limit) {
    $this->limit = (int) $limit;
    return $this;
  }

  /**
   * Get limit
   *
   * @return int
   */
  public function getLimit() {
    return $this->limit;
  }

  /**
   * Set offset
   *
   * @param int $offset
   * offset
   */
  public function setOffset($offset) {
    $this->offset = (int) $offset;
    return $this;
  }

  /**
   * Get offset
   *
   * @return int
   */
  public function getOffset() {
    return $this->offset;
  }
}
