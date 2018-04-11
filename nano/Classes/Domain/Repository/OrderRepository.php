<?php

namespace ELCA\Nano\Domain\Repository;

use ELCA\Nano\Domain\Model\DemandInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Order repository
 */
class OrderRepository extends \ELCA\Nano\Domain\Repository\AbstractDemandedRepository
{
  protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand) {
    
    $constraints = [];
 
    // Clean not used constraints
    foreach ($constraints as $key => $value) {
      if (is_null($value)) {
        unset($constraints[$key]);
      }
    }
    
    return $constraints;
  }
  
  protected function createOrderingsFromDemand(DemandInterface $demand) {
    $orderings = [];
    
    return $orderings;
  }
}
