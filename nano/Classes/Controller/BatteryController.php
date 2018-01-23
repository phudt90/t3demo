<?php

namespace ELCA\Nano\Controller;

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
}
