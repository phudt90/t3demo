<?php

namespace ELCA\Nano\Controller;

use ELCA\Nano\Domain\Model\Vbrand;

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
    $this->view->assign('vbrands', $vbrands);
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
