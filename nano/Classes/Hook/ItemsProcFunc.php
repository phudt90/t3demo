<?php

namespace DTP\Nano\Hook;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Userfunc to render some special elements
 */
class ItemsProcFunc {
  /**
   *
   * @var \DTP\Nano\Domain\Repository\VmodelRepository
   */
  protected $vmodelRepository;
  
  public function __construct() {
    $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
    $this->vmodelRepository = $objectManager->get(\DTP\Nano\Domain\Repository\VmodelRepository::class);
  }
  
  /**
   * Modifies the select box of vmodel-options by vbrand value
   *
   * @param array &$config configuration array
   */
  public function user_vmodel(array &$config) {
    $vbrand = $config['row']['settings.vbrand'][0];
    $items = $this->vmodelRepository->findByVehicalBrand($vbrand);
    $config['items'] = [];
    array_push($config['items'], ['', '']);
    /* @var \DTP\Nano\Domain\Model\Vmodel[] $items */
    foreach ($items as $item) {
      array_push($config['items'], [htmlspecialchars($item->getTitle()), $item->getUid()]);
    }
  }
}
