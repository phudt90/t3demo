<?php

namespace ELCA\Nano\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Battery Demand
 */
class BatteryDemand extends AbstractEntity implements \ELCA\Nano\Domain\Model\DemandInterface {
  
  /** @var \ELCA\Nano\Domain\Model\Application */
  protected $application;
  
  /** @var int */
  protected $limit;
  
  /** @var int */
  protected $offset;

  /**
   *
   * @param \ELCA\Nano\Domain\Model\Application $application
   */
  public function setApplication(\ELCA\Nano\Domain\Model\Application $application) {
    $this->application = $application;
    return $this;
  }

  /**
   *
   * @return \ELCA\Nano\Domain\Model\Application
   */
  public function getApplication() {
    return $this->application;
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
