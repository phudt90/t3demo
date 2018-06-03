<?php

namespace DTP\Nano\Domain\Repository;

use DTP\Nano\Domain\Model\DemandInterface;

/**
 * Abstract demanded repository
 */
abstract class AbstractDemandedRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
  /**
   *
   * @var \TYPO3\CMS\Extbase\Persistence\Generic\Storage\BackendInterface
   */
  protected $storageBackend;

  /**
   *
   * @param \TYPO3\CMS\Extbase\Persistence\Generic\Storage\BackendInterface $storageBackend
   */
  public function injectStorageBackend(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\BackendInterface $storageBackend) {
    $this->storageBackend = $storageBackend;
  }

  /**
   * Returns an array of constraints created from a given demand object.
   *
   * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
   * @param DemandInterface $demand
   * @return array<\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface>
   * @abstract
   */
  abstract protected function createConstraintsFromDemand(\TYPO3\CMS\Extbase\Persistence\QueryInterface $query, DemandInterface $demand);

  /**
   * Returns an array of orderings created from a given demand object.
   *
   * @param DemandInterface $demand
   * @return array<\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface>
   * @abstract
   */
  abstract protected function createOrderingsFromDemand(DemandInterface $demand);

  /**
   * Returns the objects of this repository matching the demand.
   *
   * @param DemandInterface $demand
   * @param bool $respectEnableFields
   * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
   */
  public function findDemanded(DemandInterface $demand, $respectEnableFields = true) {
    $query = $this->generateQuery($demand, $respectEnableFields);
    //$this->debugQuery($query);
    return $query->execute();
  }

  protected function generateQuery(DemandInterface $demand, $respectEnableFields = true) {
    $query = $this->createQuery();
    
    $query->getQuerySettings()->setRespectStoragePage(false);
    
    $constraints = $this->createConstraintsFromDemand($query, $demand);

    if ($respectEnableFields === false) {
      $query->getQuerySettings()->setIgnoreEnableFields(true);
      
      $constraints[] = $query->equals('deleted', 0);
    }
    
    if (! empty($constraints)) {
      $query->matching($query->logicalAnd($constraints));
    }
    
    if ($orderings = $this->createOrderingsFromDemand($demand)) {
      $query->setOrderings($orderings);
    }
    
    // @todo consider moving this to a separate function as well
    if ($demand->getLimit() != null) {
      $query->setLimit((int) $demand->getLimit());
    }
    
    // @todo consider moving this to a separate function as well
    if ($demand->getOffset() != null) {
      if (! $query->getLimit()) {
        $query->setLimit(PHP_INT_MAX);
      }
      $query->setOffset((int) $demand->getOffset());
    }
    
    return $query;
  }

  /**
   * Returns the total number objects of this repository matching the demand.
   *
   * @param DemandInterface $demand
   * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
   */
  public function countDemanded(DemandInterface $demand) {
    $query = $this->createQuery();
    
    if ($constraints = $this->createConstraintsFromDemand($query, $demand)) {
      $query->matching($query->logicalAnd($constraints));
    }
    
    $result = $query->execute();
    return $result->count();
  }

  /**
   * Copy of the one from Typo3DbBackend
   * Replace query placeholders in a query part by the given
   * parameters.
   *
   * @param string $sqlString
   * The query part with placeholders
   * @param array $parameters
   * The parameters
   * @param string $tableName
   *
   * @throws \TYPO3\CMS\Extbase\Persistence\Generic\Exception
   */
  protected function replacePlaceholders(&$sqlString, array $parameters, $tableName = 'foo') {
    if (substr_count($sqlString, '?') !== count($parameters)) {
      throw new \TYPO3\CMS\Extbase\Persistence\Generic\Exception('The number of question marks to replace must be equal to the number of parameters.', 1242816074);
    }
    $offset = 0;
    foreach ($parameters as $parameter) {
      $markPosition = strpos($sqlString, '?', $offset);
      if ($markPosition !== false) {
        if ($parameter === null) {
          $parameter = 'NULL';
        }
        elseif (is_array($parameter) || $parameter instanceof \ArrayAccess || $parameter instanceof \Traversable) {
          $items = [];
          foreach ($parameter as $item) {
            $items[] = $GLOBALS['TYPO3_DB']->fullQuoteStr($item, $tableName);
          }
          $parameter = '(' . implode(',', $items) . ')';
        }
        else {
          $parameter = $GLOBALS['TYPO3_DB']->fullQuoteStr($parameter, $tableName);
        }
        $sqlString = substr($sqlString, 0, $markPosition) . $parameter . substr($sqlString, ($markPosition + 1));
      }
      $offset = $markPosition + strlen($parameter);
    }
  }
  
  protected static function debugQuery($query) {
    $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
    $queryParser = $objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
  }
}
