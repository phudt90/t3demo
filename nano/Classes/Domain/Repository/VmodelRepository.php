<?php

namespace DTP\Nano\Domain\Repository;

use DTP\Nano\Domain\Model\DemandInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Vehical model repository
 */
class VmodelRepository extends \DTP\Nano\Domain\Repository\AbstractDemandedRepository
{  
  protected $defaultOrderings = [
    'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
  ];
  
  public function findByVehicalBrand($vbrand) {
    $query = $this->createQuery();
    
    $query->getQuerySettings()->setRespectStoragePage(false);
    
    $query->matching($query->equals('vbrand', $vbrand));
    
    return $query->execute();
  }
  
  protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand) {
    /** @var \DTP\Nano\Domain\Model\VmodelDemand $demand */
    $constraints = [];
    
    if($demand->getVbrand() != null) {
      $constraints['vbrand'] = $query->equals('vbrand', $demand->getVbrand());
    }
    
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
