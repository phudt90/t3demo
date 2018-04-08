<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/SearchByVehical/SearchForm.ts">

plugin.tx_nano_pagebatterysearchbyvehical {
  view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
    
    features {
	  	requireCHashArgumentForActionArguments = 0
	  }
    
    widget {
    	TYPO3\CMS\Fluid\ViewHelpers\Widget\PaginateViewHelper {
    		templateRootPaths = EXT:nano/Resources/Private/Templates/
    	}
    }
  }
  
  settings {
		detailsPid = {$plugin.detailsPid}
	}
}

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
		vendorName = ELCA
    extensionName = Nano
    pluginName = WidgetSearchByVehicalTerms
		resolveMainShortcut = 1
	}
}