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
   * @var \ELCA\Nano\Domain\Repository\ApplicationRepository
   * @inject
   */
  protected $applicationRepository;
  
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\BatteryRepository
   * @inject
   */
  protected $batteryRepository;
  
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\VbrandRepository
   * @inject
   */
  protected $vbrandRepository;
  
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\VmodelRepository
   * @inject
   */
  protected $vmodelRepository;
  
  /**
   * Create the demand object which define which records will get shown
   *
   * @param array $settings
   * @return \ELCA\Nano\Domain\Model\BatteryDemand
   */
  protected function createDemandObjectFromSettings($settings) {
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
    $demand = $this->createDemandObjectFromSettings($this->settings);
    
    $title = 'Sản phẩm';
    if($application) {
      $title = "{$application->getTitle()}";
      $demand->setApplication($application);
    }
    
    if($brand) {
      $title .= " {$brand->getTitle()}";
      $demand->setBrand($brand);
    }
    
    $records = $this->batteryRepository->findDemanded($demand);

    $this->setPageTitle($title);
    $this->view->assign('heading', $title);
    $this->view->assign('batteries', $records);
  }

  /**
   * Output a list view of batteries
   *
   * @param Vbrand $vbrand
   * @param Vmodel $vmodel
   */
  public function searchAction(Vbrand $vbrand = null, Vmodel $vmodel = null) {
    $demand = $this->createDemandObjectFromSettings($this->settings);
    
    $title = 'Tìm ắc quy';
    if($vbrand) {
      $title .= " xe {$vbrand->getTitle()}";
      $demand->setVbrand($vbrand);
      if($vmodel && ($vmodel->getVbrand()->getUid() === $vbrand->getUid())) {
        $title .= " {$vmodel->getTitle()}";
        $demand->setVmodel($vmodel);
      }
    }
    
    $batteries = $this->batteryRepository->findDemanded($demand);
    
    $this->setPageTitle($title);
    $this->view->assign('heading', $title);
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * Output a list view of batteries by application
   * @param ApplicationModel
   *
   */
  public function batteryByApplicationAction() {
    $batteries = [];
    $demand = $this->createDemandObjectFromSettings($this->settings);
    if($application = $this->applicationRepository->findByUid($this->settings['applications'])) {
      $demand->setApplication($application);
      $batteries = $this->batteryRepository->findDemanded($demand);
    }
    
    $this->view->assign('batteries', $batteries);
  }
  
  /**
   * Battery Details
   * @param BatteryModel
   */
  public function detailsAction(BatteryModel $battery) {
    $this->setPageTitle($battery->getTitle());
    $this->view->assign('battery', $battery);
  }
  
  /**
   * Set current page title
   * @param string $title
   */
  protected function setPageTitle($title) {
    $altTitle = 'Ắc quy ô tô - Ắc quy xe phân khối lớn - Ắc quy xe máy - Phụ kiện ắc quy';
    if($title) {
      $this->getPageRenderer()->setTitle(sprintf('%s - %s', $title, $altTitle));
    } else {
      $this->getPageRenderer()->setTitle($altTitle);
    }
  }
  
  /**
   * Get Page renderer
   * @return \TYPO3\CMS\Core\Page\PageRenderer
   */
  protected function getPageRenderer() {
    return $this->objectManager->get(\TYPO3\CMS\Core\Page\PageRenderer::class);
  }
}
