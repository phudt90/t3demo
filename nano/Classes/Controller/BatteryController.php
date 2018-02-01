<?php

namespace ELCA\Nano\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use ELCA\Nano\Domain\Model\Application as ApplicationModel;
use ELCA\Nano\Domain\Model\Battery as BatteryModel;

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
   * @param ApplicationModel
   * 
   */
  public function listAction(ApplicationModel $application = null) {
    $batteries = $this->batteryRepository->findAll();
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * @param BatteryModel
   */
  public function detailsAction(BatteryModel $battery) {
    $this->view->assign('battery', $battery);
  }
}
