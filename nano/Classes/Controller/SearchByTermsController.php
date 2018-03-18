<?php

namespace ELCA\Nano\Controller;

use ELCA\Nano\Domain\Model\Vbrand;
use function GuzzleHttp\json_encode;

/**
 * SearchByTerms controller
 */
class SearchByTermsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\VbrandRepository
   */
  protected $vbrandRepository;
  
  /**
   *
   * @var \ELCA\Nano\Domain\Repository\VmodelRepository
   */
  protected $vmodelRepository;

  /**
   * Inject a repository to enable DI
   *
   * @param \ELCA\Nano\Domain\Repository\VbrandRepository $vbrandRepository
   */
  public function injectVbrandRepository(\ELCA\Nano\Domain\Repository\VbrandRepository $vbrandRepository) {
    $this->vbrandRepository = $vbrandRepository;
  }
  
  /**
   * Inject a repository to enable DI
   *
   * @param \ELCA\Nano\Domain\Repository\VmodelRepository $vmodelRepository
   */
  public function injectVmodelRepository(\ELCA\Nano\Domain\Repository\VmodelRepository $vmodelRepository) {
    $this->vmodelRepository = $vmodelRepository;
  }
  
  public function indexAction() {
    $vbrands = $this->vbrandRepository->findAll();
    $vmodels = $this->vmodelRepository->findAll();
    $values = [];
    /* @var \ELCA\Nano\Domain\Model\Vmodel $vmodel */
    foreach($vmodels as $vmodel) {
      array_push($values, [
        'id' => $vmodel->getUid(),
        'text' => $vmodel->getTitle(),
        'parent' => $vmodel->getVbrand()->getUid()
      ]);
    }
    
    $this->view->assign('vbrands', $vbrands);
    $this->view->assign('vmodels', $vmodels);
    $this->view->assign('vmodel_options', json_encode($values));
  }
  
  /**
   * action list
   *
   * @param Vbrand $vbrand
   */
  public function listAction(Vbrand $vbrand = null) {
    /* @var $demand \ELCA\Nano\Domain\Model\VmodelDemand */
    $demand = $this->objectManager->get(\ELCA\Nano\Domain\Model\VmodelDemand::class, $this->settings);
    $demand->setVbrand($vbrand);
    $vmodels = $this->vmodelRepository->findDemanded($demand);
    $this->view->assign('vmodels', $vmodels);
  }
}
