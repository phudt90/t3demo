<?php

namespace ELCA\Nano\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Battery controller
 */
class BatteryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\BatteryRepository
   */
  protected $batteryRepository;

  /**
   * Inject a battery repository to enable DI
   *
   * @param \ELCA\Nano\Domain\Repository\BatteryRepository $batteryRepository
   */
  public function injectNewsRepository(\ELCA\Nano\Domain\Repository\BatteryRepository $batteryRepository) {
    $this->batteryRepository = $batteryRepository;
  }

  /**
   * Output a list view of batteries
   */
  public function listAction() {
    $batteries = $this->batteryRepository->findAll();
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * @param \ELCA\Nano\Domain\Model\Battery
   */
  public function detailsAction(\ELCA\Nano\Domain\Model\Battery $battery) {
    d($GLOBALS['TSFE']);
    $this->view->assign('battery', $battery);
  }
  
  
}
