<?php

namespace DTP\Nano\Controller;

/**
 * SearchByVehical controller
 */
class SearchByVehicalController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
  /**
   *
   * @var \DTP\Nano\Domain\Repository\VbrandRepository
   */
  protected $vbrandRepository;
  
  /**
   *
   * @var \DTP\Nano\Domain\Repository\VmodelRepository
   */
  protected $vmodelRepository;

  /**
   * Inject a repository to enable DI
   *
   * @param \DTP\Nano\Domain\Repository\VbrandRepository $vbrandRepository
   */
  public function injectVbrandRepository(\DTP\Nano\Domain\Repository\VbrandRepository $vbrandRepository) {
    $this->vbrandRepository = $vbrandRepository;
  }
  
  /**
   * Inject a repository to enable DI
   *
   * @param \DTP\Nano\Domain\Repository\VmodelRepository $vmodelRepository
   */
  public function injectVmodelRepository(\DTP\Nano\Domain\Repository\VmodelRepository $vmodelRepository) {
    $this->vmodelRepository = $vmodelRepository;
  }
  
  /**
   * Show search by vehical form
   *
   */
  public function showFormAction() {
    $vbrands = $this->vbrandRepository->findAll();
    $vmodels = $this->vmodelRepository->findAll();
    $values = [];
    /* @var \DTP\Nano\Domain\Model\Vmodel $vmodel */
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
}
