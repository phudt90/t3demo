<?php

namespace ELCA\Nano\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

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
  
  /**
   * @param \ELCA\Nano\Domain\Model\Battery
   */
  public function detailsAction(\ELCA\Nano\Domain\Model\Battery $battery) {
    $templatePathAndFilename = GeneralUtility::getFileAbsFileName('EXT:bootstrap_package/Resources/Private/Templates/Page/Default.html');
    
    $view = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
    
    $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
    $templateRootPath = GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPaths'][10]);
    $templatePathAndFilename = $templateRootPath . 'Battery/Details.html';
    $templatePathAndFilename = 'D:/UniServerZ/www/examples/typo3conf/ext/nano/Resources/Private/Templates/Battery/Details.html';
    $layoutpathAndFilename = 'D:/UniServerZ/www/examples/typo3conf/ext/bootstrap_package/Resources/Private/Layouts/Page/Default.html';
    $view->setTemplatePathAndFilename($templatePathAndFilename);
    $view->setTemplateSource('Default');
    return $view->render();
    $this->view->assign('battery', $battery);
  }
  
  
}
