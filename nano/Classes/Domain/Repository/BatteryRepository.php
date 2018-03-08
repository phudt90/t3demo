<?php

namespace ELCA\Nano\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use ELCA\Nano\Domain\Model\DemandInterface;

/**
 * Battery repository
 */
class BatteryRepository extends \ELCA\Nano\Domain\Repository\AbstractDemandedRepository
{
  protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand) {
    /** @var \ELCA\Nano\Domain\Model\BatteryDemand $demand */
    $constraints = [];
    
    if($application = $demand->getApplication()) {
      $constraints['application'] = $query->contains('applications', $application);
    }
    
    if($vbrand = $demand->getVbrand()) {
      
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
