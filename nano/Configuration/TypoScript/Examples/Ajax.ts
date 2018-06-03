widget_searchbyterms_ajax_vehicalmodel_page = PAGE
widget_searchbyterms_ajax_vehicalmodel_page {
  typeNum = 231990
 
  config {
    disableAllHeaderCode = 1
    additionalHeaders = Content-type:application/html
    xhtml_cleaning = 0
    debug = 0
    no_cache = 1
    admPanel = 0
  }
 
  10 = USER
  10 {
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    vendorName = DTP
    extensionName = Nano
    pluginName = WidgetSearchByVehicalTerms
    resolveMainShortcut = 1
  }
}