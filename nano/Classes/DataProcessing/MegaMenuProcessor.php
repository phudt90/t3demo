<?php

namespace DTP\Nano\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;

class MegaMenuProcessor implements DataProcessorInterface {
  /**
   * The content object renderer
   *
   * @var ContentObjectRenderer
   */
  public $cObj;
  
  /**
   * The processor configuration
   *
   * @var array
   */
  protected $processorConfiguration;
  
  /**
   * The database connection;
   *
   * @var ConnectionPool
   */
  protected $connectionPool;
  
  
  /**
   * The storage page id
   *
   * @var int
   */
  protected $storagePid;
  
  /**
   * The list page id
   *
   * @var int
   */
  protected $listPid;
  
  /**
   * Constructs a new MegaMenuProcessor
   * 
   */
  public function __construct() {
    $this->connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
  }
  
  /**
   *
   * @param ContentObjectRenderer $cObj
   * The data of the content element or page
   * @param array $contentObjectConfiguration
   * The configuration of Content Object
   * @param array $processorConfiguration
   * The configuration of this processor
   * @param array $processedData
   * Key/value store of processed data (e.g. to be passed to a Fluid View)
   * @return array the processed data as key/value store
   */
  public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {    
    $this->cObj = $cObj;
    $this->processorConfiguration = $processorConfiguration;
    
    $rootUid = 14;
    $rootCategoryUid = 511;
    $pages = \TYPO3\CMS\Core\Category\Collection\CategoryCollection::load($rootCategoryUid, true, 'pages')->getItems();
    
    /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
    /* $queryBuilder = $this->connectionPool->getQueryBuilderForTable('sys_category_record_mm');
    $queryBuilder->getRestrictions()->removeAll();
    
    $where = $queryBuilder->expr()->andX(
      $queryBuilder->expr()->eq('mm.tablenames', "'pages'"),
      $queryBuilder->expr()->in('mm.uid_foreign', array_column($pages, 'uid')),
      $queryBuilder->expr()->eq('sys.parent', $rootCategoryUid) 
    );
    $queryBuilder->select('sys.uid', 'sys.title', 'sys.parent', 'mm.uid_foreign')
    ->from('sys_category', 'sys')
    ->leftJoin('sys', 'sys_category_record_mm', 'mm', 'sys.uid=mm.uid_local')
    ->where($where)
    ;
    $categories = $queryBuilder->execute()->fetchAll(); */
    
    $megamenu = [];
    $groupTitles = [
      0 => '', 
      1 => 'Theo thương hiệu ắc quy', 
      2 => 'Theo thương hiệu xe', 
      3 => 'Theo thương hiệu xe'
    ];
    $categoriesOne = array_filter($pages, function($page) use ($rootUid) {
      return ($page['pid'] == $rootUid);
    });
    if($categoriesOne) {
      foreach($categoriesOne as $categoryOne) {
        $megamenuItem = [
          'title' => $categoryOne['title'],
          'link' => $cObj->typoLink_URL([
            'parameter' => $categoryOne['uid'],
            'useCacheHash' => true,
            'forceAbsoluteUrl' => true,
          ]),
        ];
        
        $categoriesTwo = array_filter($pages, function($page) use ($categoryOne) {
          return ($page['pid'] == $categoryOne['uid']);
        });
        $children = [];
        if($categoriesTwo) {
          if($categoryGroups = $this->arrayGroupBy($categoriesTwo, 'tx_nano_nav_position')) {
            foreach($categoryGroups as $i=>$categoryGroup) {
              usort($categoryGroup, function($a, $b) {
                return ($a['sorting'] < $b['sorting']) ? -1 : 1;
              });
              $group = [
                'title' => $groupTitles[$i],
                'items' => []
              ];
              foreach($categoryGroup as $groupItem) {
                $group['items'][] = [
                  'title' => $groupItem['title'],
                  'link' => $cObj->typoLink_URL([
                    'parameter' => $groupItem['uid'],
                    'useCacheHash' => true,
                    'forceAbsoluteUrl' => true,
                  ]),
                ];
              }
              $children[] = $group;
            }
          }
        }
        $megamenuItem['children'] = $children;
        $megamenu[] = $megamenuItem;
      }
    }
    
    // Return processed data
    $processedData['megamenu'] = $megamenu;
    return $processedData;
  }
  
  /**
   * Groups an array by a given key.
   *
   * Groups an array into arrays by a given key, or set of keys, shared between all array members.
   *
   * Based on {@author Jake Zatecky}'s {@link https://github.com/jakezatecky/array_group_by array_group_by()} function.
   * This variant allows $key to be closures.
   *
   * @param array $array   The array to have grouping performed on.
   * @param mixed $key,... The key to group or split by. Can be a _string_,
   *                       an _integer_, a _float_, or a _callable_.
   *
   *                       If the key is a callback, it must return
   *                       a valid key from the array.
   *
   *                       If the key is _NULL_, the iterated element is skipped.
   *
   *                       ```
   *                       string|int callback ( mixed $item )
   *                       ```
   *
   * @return array|null Returns a multidimensional array or `null` if `$key` is invalid.
   */
  protected function arrayGroupBy(array $array, $key) {
    if (! is_string($key) && ! is_int($key) && ! is_float($key) && ! is_callable($key)) {
      trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
      return null;
    }
    $func = (! is_string($key) && is_callable($key) ? $key : null);
    $_key = $key;
    // Load the new array, splitting by the target key
    $grouped = [];
    foreach ($array as $value) {
      $key = null;
      if (is_callable($func)) {
        $key = call_user_func($func, $value);
      }
      elseif (is_object($value) && isset($value->{$_key})) {
        $key = $value->{$_key};
      }
      elseif (isset($value[$_key])) {
        $key = $value[$_key];
      }
      if ($key === null) {
        continue;
      }
      $grouped[$key][] = $value;
    }
    // Recursively build a nested grouping if more parameters are supplied
    // Each grouped array value is grouped according to the next sequential key
    if (func_num_args() > 2) {
      $args = func_get_args();
      foreach ($grouped as $key => $value) {
        $params = array_merge([
          $value
        ], array_slice($args, 2, func_num_args()));
        $grouped[$key] = call_user_func_array('array_group_by', $params);
      }
    }
    return $grouped;
  }
  
  /**
   * Get configuration value from processorConfiguration
   *
   * @param string $key
   * @return string
   */
  protected function getConfigurationValue($key)
  {
    return $this->cObj->stdWrapValue($key, $this->processorConfiguration);
  }
}
