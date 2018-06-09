<?php

namespace DTP\Nano\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\DataProcessing\MenuProcessor;

class CategoriesMenuProcessor extends MenuProcessor {

  /**
   *
   * {@inheritdoc}
   * @see \TYPO3\CMS\Frontend\DataProcessing\MenuProcessor::process()
   */
  public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {
    $processedData = parent::process($cObj, $contentObjectConfiguration, $processorConfiguration, $processedData);
    $processedData[$this->menuTargetVariableName] = $processedData[$this->menuTargetVariableName][0]['children'];
    
    $columnTitles = [
      0 => '',
      1 => 'Theo thương hiệu ắc quy',
      2 => 'Theo thương hiệu xe',
      3 => 'Theo thương hiệu xe'
    ];
    foreach($processedData[$this->menuTargetVariableName] as $i=>$menuItem) {
      if($menuItem['children'] && ($menuItem['layout'] == 1)) {
        $processedData[$this->menuTargetVariableName][$i]['childrenColumns'] = [];
        $childrenColumns = $this->arrayGroupBy($menuItem['children'], 'position');
        foreach($childrenColumns as $pos => $childrenColumn) {
          $processedData[$this->menuTargetVariableName][$i]['childrenColumns'][] = [
            'title' => $columnTitles[$pos],
            'items' => $childrenColumn
          ];
        }
      }
    }
    return $processedData;
  }

  /**
   *
   * {@inheritdoc}
   */
  public function prepareLevelConfiguration() {
    parent::prepareLevelConfiguration();
    
    $this->menuLevelConfig['stdWrap.']['cObject.']['61'] = 'TEXT';
    $this->menuLevelConfig['stdWrap.']['cObject.']['61.'] = [
      'field' => tx_nano_nav_layout,
      'wrap' => ',"layout":|',
    ];
    $this->menuLevelConfig['stdWrap.']['cObject.']['62'] = 'TEXT';
    $this->menuLevelConfig['stdWrap.']['cObject.']['62.'] = [
      'field' => tx_nano_nav_type,
      'wrap' => ',"type":|',
    ];
    $this->menuLevelConfig['stdWrap.']['cObject.']['63'] = 'TEXT';
    $this->menuLevelConfig['stdWrap.']['cObject.']['63.'] = [
      'field' => tx_nano_nav_position,
      'wrap' => ',"position":|',
    ];
    
    $this->menuLevelConfig['stdWrap.']['cObject.']['64'] = 'TEXT';
    $this->menuLevelConfig['stdWrap.']['cObject.']['64.'] = [
      'field' => tx_seo_titletag,
      'wrap' => ',"seotitle":|',
      'preUserFunc' => 'TYPO3\CMS\Frontend\DataProcessing\MenuProcessor->jsonEncodeUserFunc'
    ];
  }
  
  /**
   * Process additional data processors
   *
   * @param array $page
   * @param array $processorConfiguration
   */
  protected function processAdditionalDataProcessors($page, $processorConfiguration)
  {
    if (is_array($page['children'])) {
      foreach ($page['children'] as $key => $item) {
        $page['children'][$key] = $this->processAdditionalDataProcessors($item, $processorConfiguration);
      }
    }
    /** @var ContentObjectRenderer $recordContentObjectRenderer */
    $recordContentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
    $recordContentObjectRenderer->start($page['data'], 'pages');
    $processedPage = $this->contentDataProcessor->process($recordContentObjectRenderer, $processorConfiguration, $page);
    return $processedPage;
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
}
