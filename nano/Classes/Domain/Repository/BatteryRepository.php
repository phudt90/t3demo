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
  /**
   * Returns the list of batteries by uids
   *
   * @param array $uids
   * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
   */
  public function findByUids($uids = array()) {
    $query = $this->createQuery();
    
    $query->getQuerySettings()->setRespectStoragePage(false);
    
    $query->matching($query->in('uid', $uids));
    
    $query->setLimit(100);
    
    return $query->execute();
  }
  
  protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand) {
    /** @var \ELCA\Nano\Domain\Model\BatteryDemand $demand */
    $constraints = [];
    
    if($application = $demand->getApplication()) {
      $constraints['application'] = $query->contains('applications', $application);
    }
    
    if($brand = $demand->getBrand()) {
      $constraints['brand'] = $query->equals('brand', $brand);
    }
    
    if($vbrand = $demand->getVbrand()) {
      /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
      $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
        ->getQueryBuilderForTable('sys_category_record_mm');
      $queryBuilder->getRestrictions()->removeAll();
      
      $where = $queryBuilder->expr()->andX(
        $queryBuilder->expr()->eq('mm.tablenames', "'tx_nano_domain_model_vbrand'"),
        $queryBuilder->expr()->eq('mm.uid_foreign', $vbrand->getUid()),
        $queryBuilder->expr()->eq('sys.parent', 0)
      );
      if($vmodel = $demand->getVModel()) {
        $where = $queryBuilder->expr()->andX(
          $queryBuilder->expr()->eq('mm.tablenames', "'tx_nano_domain_model_vmodel'"),
          $queryBuilder->expr()->eq('mm.uid_foreign', $vmodel->getUid()),
          $queryBuilder->expr()->neq('sys.parent', 0)
        );
      }
      
      $queryBuilder->select('sys.uid')
        ->from('sys_category', 'sys')
        ->leftJoin('sys', 'sys_category_record_mm', 'mm', 'sys.uid=mm.uid_local')
        ->where($where)
        ->setMaxResults(1)
      ;
      //d($queryBuilder->getSQL());
      if($records = $queryBuilder->execute()->fetchAll()) {
        $categories = array_unique(array_column($records, 'uid'));
        $constraints['categories'] = $query->contains('categories', $categories);
      } else {
        $constraints['categories'] = $query->contains('categories', -1);
      }
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
