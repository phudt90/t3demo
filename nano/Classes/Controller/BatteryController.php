<?php

namespace ELCA\Nano\Controller;

use ELCA\Nano\Domain\Model\Application as ApplicationModel;
use ELCA\Nano\Domain\Model\Brand as BrandModel;
use ELCA\Nano\Domain\Model\Vbrand;
use ELCA\Nano\Domain\Model\Vmodel;
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
   *
   * @var \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
   * @inject
   */
  protected $categoryRepository;

  /**
   * Inject a battery repository to enable DI
   *
   * @param \ELCA\Nano\Domain\Repository\BatteryRepository $batteryRepository
   */
  public function injectBatteryRepository(\ELCA\Nano\Domain\Repository\BatteryRepository $batteryRepository) {
    $this->batteryRepository = $batteryRepository;
  }
  
  /**
   * Create the demand object which define which records will get shown
   *
   * @param array $settings
   * @param \TYPO3\CMS\Extbase\Mvc\Controller\Arguments $arguments
   * @return \ELCA\Nano\Domain\Model\BatteryDemand
   */
  protected function createDemandObjectFromSettings($settings, \TYPO3\CMS\Extbase\Mvc\Controller\Arguments $arguments) {
    /* @var $demand \ELCA\Nano\Domain\Model\BatteryDemand */
    $demand = $this->objectManager->get(\ELCA\Nano\Domain\Model\BatteryDemand::class, $settings);
    
    if ($settings['orderBy']) {
      $demand->setOrder($settings['orderBy'] . ' ' . $settings['orderDirection']);
    }
    $demand->setLimit($settings['limit']);
    $demand->setOffset($settings['offset']);
    
    return $demand;
  }

  /**
   * Output a list view of batteries
   * 
   * @param ApplicationModel $application
   * @param BrandModel $brand 
   */
  public function listAction(ApplicationModel $application = null, BrandModel $brand = null) {
    $demand = $this->createDemandObjectFromSettings($this->settings, $this->arguments);
    if($application) {
      $demand->setApplication($application);
    }
    
    $records = $this->batteryRepository->findDemanded($demand);
    
    $this->view->assign('batteries', $records);
  }

  /**
   * Output a list view of batteries
   *
   * @param Vbrand $vbrand
   * @param Vmodel $vmodel
   */
  public function searchAction(Vbrand $vbrand = null, Vmodel $vmodel = null) {
    $demand = $this->createDemandObjectFromSettings($this->settings, $this->arguments);
    
    if($vbrand) {
      $demand->setVbrand($vbrand);
      
      if($vmodel && ($vmodel->getVbrand()->getUid() === $vbrand->getUid())) {
        $demand->setVmodel($vmodel);
      }
    }
    
    $records = $this->batteryRepository->findDemanded($demand);

    $this->view->assign('batteries', $records);
  }
  
  /**
   * Output a list view of batteries by application
   * @param ApplicationModel
   *
   */
  public function batteryByApplicationAction() {
    $batteries = $this->batteryRepository->findAll();
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * Battery Details
   * @param BatteryModel
   */
  public function detailsAction(BatteryModel $battery) {
    //d($battery->getCategories());
    $this->view->assign('battery', $battery);
  }
}
