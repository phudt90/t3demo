<?php

namespace DTP\Nano\Domain\Repository;

use DTP\Nano\Domain\Model\DemandInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Order repository
 */
class OrderRepository extends \DTP\Nano\Domain\Repository\AbstractDemandedRepository
{
  public function findByHash($hash) {
    $query = $this->createQuery();
    
    $query->getQuerySettings()->setRespectStoragePage(false);
    
    $query->matching($query->equals('hash', $hash));
    
    return $query->execute()->getFirst();
  }
  
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
