<?php

namespace ELCA\Nano\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use ELCA\Nano\Domain\Model\DemandInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

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
    
    $constraints['category'] = $query->contains('categories', 1);
    
    /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
      ->getQueryBuilderForTable('sys_category_record_mm');
    $queryBuilder->getRestrictions()->removeAll();
    $queryBuilder->select('uid_local')
      ->from('sys_category_record_mm')
      ->where(
          $queryBuilder->expr()->andX(
            $queryBuilder->expr()->in('tablenames', "'tx_nano_domain_model_vbrand', 'tx_nano_domain_model_vmodel'"),
            $queryBuilder->expr()->in('uid_foreign', ['1', '2'])
          )
        )
    ;
    $records = $queryBuilder->execute()->fetchAll();
    d($records);
    
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
