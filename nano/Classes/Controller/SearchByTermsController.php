<?php

namespace ELCA\Nano\Controller;

use ELCA\Nano\Domain\Model\Vbrand;

/**
 * SearchByTerms controller
 */
class SearchByTermsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\VmodelRepository
   */
  protected $vmodelRepository;

  /**
   * Inject a repository to enable DI
   *
   * @param \ELCA\Nano\Domain\Repository\VmodelRepository $vmodelRepository
   */
  public function injectBatteryRepository(\ELCA\Nano\Domain\Repository\VmodelRepository $vmodelRepository) {
    $this->vmodelRepository = $vmodelRepository;
  }
  
  public function indexAction() {
    
  }
  
  /**
   * action list
   *
   * @param Vbrand $vbrand
   */
  public function listAction(Vbrand $vbrand = null) {
    $records = $this->vmodelRepository->findAll();
    $this->view->assign('records', $records);
  }
}
