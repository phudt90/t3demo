lib.widgetSearchByVehical = COA
lib.widgetSearchByVehical.searchForm = USER
lib.widgetSearchByVehical.searchForm {
  userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
  vendorName = ELCA
  extensionName = Nano
  pluginName = WidgetSearchByVehicalTerms
  
  view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
  }
  persistence {
    storagePid = {$plugin.storagePid}
  }
  
  settings {
    searchPid = {$plugin.searchPid}
  }
}