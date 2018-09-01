<?php

namespace DTP\Nano\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\FlexFormService;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use DTP\Nano\Domain\Repository\BatteryRepository;

/**
 * Minimal TypoScript configuration
 * Process field pi_flexform and overrides the values stored in data
 *
 * Advanced TypoScript configuration
 * Process field assigned in fieldName and stores processed data to new key
 */
class CarouselProductsProcessor implements DataProcessorInterface
{
  /**
   * @var FlexFormService
   */
  protected $flexFormService;

  /**
   *
   * @var BatteryRepository
   */
  protected $batteryRepository;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
    $this->batteryRepository = GeneralUtility::makeInstance(ObjectManager::class)->get(BatteryRepository::class);
  }

  /**
   * @param ContentObjectRenderer $cObj The data of the content element or page
   * @param array $contentObjectConfiguration The configuration of Content Object
   * @param array $processorConfiguration The configuration of this processor
   * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
   * @return array the processed data as key/value store
   */
  public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
  {
    // The field name to process
    $fieldName = $cObj->stdWrapValue('fieldName', $processorConfiguration);

    if (empty($fieldName) && !$processedData['data']['pi_flexform']) {
      return $processedData;
    } else {
      $fieldName = 'pi_flexform';
    }

    // Process Flexform
    $originalValue = $processedData['data'][$fieldName];
    if (!is_string($originalValue)) {
      return $processedData;
    }
    $flexformData = $this->flexFormService->convertFlexFormContentToArray($originalValue);

    $uids = explode(',', $flexformData['settings']['batteries']);

    $batteries = $this->batteryRepository->findByUids($uids)->toArray();

    usort($batteries, function($b1, $b2) use ($uids) {
      $found1 = array_search($b1->getUid(), $uids);
      $found2 = array_search($b2->getUid(), $uids);
      if(($found1 !== FALSE) && ($found2 !== FALSE)) {
        return ($found1 <= $found2) ? -1 : 1;
      }
      return;
    });

    $processedData['products'] = $batteries;

    // Set the target variable
    $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration);
    if (!empty($targetVariableName)) {
      $processedData[$targetVariableName] = $flexformData;
    } else {
      $processedData['data'][$fieldName] = $flexformData;
    }

    return $processedData;
  }
}
