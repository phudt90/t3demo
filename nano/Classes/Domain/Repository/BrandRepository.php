<?php

namespace DTP\Nano\Domain\Repository;

use DTP\Nano\Domain\Model\DemandInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Brand repository
 */
class BrandRepository extends \DTP\Nano\Domain\Repository\AbstractDemandedRepository
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
