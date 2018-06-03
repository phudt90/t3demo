<?php

namespace DTP\Nano\Controller;

use DTP\Nano\Domain\Model\Vbrand;
use DTP\Nano\Domain\Model\Vmodel;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use DTP\Nano\Domain\Model\Battery as BatteryModel;

/**
 * Battery controller
 */
class BatteryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   *
   * @var \DTP\Nano\Domain\Repository\ApplicationRepository
   * @inject
   */
  protected $applicationRepository;
  
  /**
   *
   * @var \DTP\Nano\Domain\Repository\BatteryRepository
   * @inject
   */
  protected $batteryRepository;
  
  /**
   *
   * @var \DTP\Nano\Domain\Repository\VbrandRepository
   * @inject
   */
  protected $vbrandRepository;
  
  /**
   *
   * @var \DTP\Nano\Domain\Repository\VmodelRepository
   * @inject
   */
  protected $vmodelRepository;
  
  /**
   * Create the demand object which define which records will get shown
   *
   * @param array $settings
   * @return \DTP\Nano\Domain\Model\BatteryDemand
   */
  protected function createDemandObjectFromSettings($settings) {
    /* @var $demand \DTP\Nano\Domain\Model\BatteryDemand */
    $demand = $this->objectManager->get(\DTP\Nano\Domain\Model\BatteryDemand::class, $settings);
    
    if(isset($settings['application']) && !empty($settings['application'])) {
      $demand->setApplication($settings['application']);
    }
    
    if(isset($settings['brand']) && !empty($settings['brand'])) {
      $demand->setBrand($settings['brand']);
    }
    
    if(isset($settings['vbrand']) && !empty($settings['vbrand'])) {
      $demand->setVbrand($settings['vbrand']);
    }
    
    if(isset($settings['vmodel']) && !empty($settings['vmodel'])) {
      $demand->setVmodel($settings['vmodel']);
    }
    
    if (isset($settings['orderBy']) && !empty($settings['orderBy'])) {
      $demand->setOrder($settings['orderBy'] . ' ' . $settings['orderDirection']);
    }
    if(isset($settings['limit'])) {
      $demand->setLimit($settings['limit']);
    }
    if(isset($settings['offset'])) {
      $demand->setOffset($settings['offset']);
    }
    
    return $demand;
  }

  /**
   * Output a list view of batteries
   * 
   */
  public function listAction() {
    $demand = $this->createDemandObjectFromSettings($this->settings);

    $batteries = $this->batteryRepository->findDemanded($demand);

    $this->view->assign('batteries', $batteries);
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
   * Battery Details
   * @param BatteryModel $battery
   */
  public function detailsAction(BatteryModel $battery) {
    $title = (!empty($battery->getSeoTitle())) ? $battery->getSeoTitle() : $battery->getTitle();
    //$this->getPageRenderer()->setTitle($title);
    //$GLOBALS['TSFE']->indexedDocTitle = $title;
    $this->view->assign('battery', $battery);
  }
  
  /**
   * Output a list of selected batteries
   *
   */
  public function selectedBatteriesAction() {
    $settings = $this->settings;
    $batteries = null;
    if(!empty($settings['batteries'])) {
      $uids = GeneralUtility::trimExplode(',', $settings['batteries'], true);
      $batteries = $this->batteryRepository->findByUids($uids);
    } else {
      // TODO throw exception
    }
    $this->view->assign('batteries', $batteries);
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
