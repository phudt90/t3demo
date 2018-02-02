<?php

namespace ELCA\Nano\Domain\Repository;

/**
 * Battery repository
 */
class BatteryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
  public function findByApplicaationIds(array $appIds, $limit) {
    $query = $this->createQuery();
    $query->matching($query->logicalAnd($query->in('applications.uid', $appIds)));
    $query->setLimit($limit);
    return $query->execute();
  }
  
  public static function debugQuery($query) {
    $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
    $queryParser = $objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
  }
}
