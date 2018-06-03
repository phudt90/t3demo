<?php

namespace DTP\Nano\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Vmodel Demand
 */
class VmodelDemand extends AbstractEntity implements \DTP\Nano\Domain\Model\DemandInterface {
  
  /** @var \DTP\Nano\Domain\Model\Vbrand */
  protected $vbrand;
  
  /** @var int */
  protected $limit;
  
  /** @var int */
  protected $offset;

  /**
   *
   * @return \DTP\Nano\Domain\Model\Vbrand
   */
  public function getVbrand() {
    return $this->vbrand;
  }

  /**
   *
   * @param \DTP\Nano\Domain\Model\Vbrand $vbrand
   */
  public function setVbrand($vbrand) {
    $this->vbrand = $vbrand;
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
