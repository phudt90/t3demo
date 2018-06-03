<?php

namespace DTP\Nano\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class VehicalTermsProcessor implements DataProcessorInterface {
  
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
    $this->storagePid = $this->getConfigurationValue('storagePid');
    $this->listPid = $this->getConfigurationValue('searchPid');
    
    $terms['vbrands'] = $this->getRecordsByTableName('tx_nano_domain_model_vbrand');
    //$terms['vmodels'] = $this->getRecordsByTableName('tx_nano_domain_model_vmodel');

    // Return processed data
    $processedData['terms'] = $terms;
    return $processedData;
  }
  
  /**
   * Get vehical brand records
   *
   * @return array
   */
  protected function getRecordsByTableName ($tableName) {
    $records = [];
    if($items = $this->cObj->getRecords($tableName, [
      'pidInList' => $this->storagePid,
      'selectFields' => 'uid,title',
      'orderBy' => 'sorting',
      'where' => 'hidden!=1'
    ])) {
      foreach($items as $item) {
        $records[$item['uid']] = $item['title'];
      }
    }
    return $records;
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
  
  /**
   * Get Uri Builder
   *
   * @return UriBuilder
   */
  protected function getUriBuilder() {
    return GeneralUtility::makeInstance(UriBuilder::class);
  }
}
