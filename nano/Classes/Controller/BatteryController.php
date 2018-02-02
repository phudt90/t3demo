<?php

namespace ELCA\Nano\Controller;

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
  public function listAction() {
    $batteries = $this->batteryRepository->findAll();
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * Output a list view of batteries by application
   * @param ApplicationModel
   *
   */
  public function batteryByApplicationAction() {    
    $appIds = explode(',', $this->settings['applications']);
    $limit = isset($this->settings['limit']) ? (int)$this->settings['limit'] : 6;
    $batteries = $this->batteryRepository->findByApplicaationIds($appIds, $limit);
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * @param BatteryModel
   */
  public function detailsAction(BatteryModel $battery) {
    $this->view->assign('battery', $battery);
  }
}
