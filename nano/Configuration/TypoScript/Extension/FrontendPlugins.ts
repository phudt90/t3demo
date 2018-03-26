
plugin.tx_nano_pagebatterylist {
  view {
    templateRootPaths {
      10 = EXT:nano/Resources/Private/Templates/Page/
      20 = EXT:bootstrap_package/Resources/Private/Templates/Page
    }
    partialRootPaths {
      10 = EXT:nano/Resources/Private/Partials/Page/
      20 = EXT:bootstrap_package/Resources/Private/Partials/Page
    }
    layoutRootPaths {
      10 = EXT:nano/Resources/Private/Layouts/Page/
      20 = EXT:bootstrap_package/Resources/Private/Layouts/Page/
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

plugin.tx_nano_pagebatterydetails {
  view {
    templateRootPaths {
      10 = EXT:nano/Resources/Private/Templates/Page/
      20 = EXT:bootstrap_package/Resources/Private/Templates/Page
    }
    partialRootPaths {
      10 = EXT:nano/Resources/Private/Partials/Page/
      20 = EXT:bootstrap_package/Resources/Private/Partials/Page
    }
    layoutRootPaths {
      10 = EXT:nano/Resources/Private/Layouts/Page/
      20 = EXT:bootstrap_package/Resources/Private/Layouts/Page/
    }
    
    widget {
    	TYPO3\CMS\Fluid\ViewHelpers\Widget\PaginateViewHelper {
    		templateRootPaths = EXT:nano/Resources/Private/Templates/
    	}
    }
  }
  
  features {
  	requireCHashArgumentForActionArguments = 0
  }
  
  settings {
		detailsPid = {$plugin.detailsPid}
	}
}

plugin.tx_nano_pagebatterysearchbyvehical {
  view {
    templateRootPaths {
      10 = EXT:nano/Resources/Private/Templates/Page/
      20 = EXT:bootstrap_package/Resources/Private/Templates/Page
    }
    partialRootPaths {
      10 = EXT:nano/Resources/Private/Partials/Page/
      20 = EXT:bootstrap_package/Resources/Private/Partials/Page
    }
    layoutRootPaths {
      10 = EXT:nano/Resources/Private/Layouts/Page/
      20 = EXT:bootstrap_package/Resources/Private/Layouts/Page/
    }
    
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

plugin.tx_nano_widgetbatterybyapplication {
	view {
    templateRootPaths {
      10 = EXT:nano/Resources/Private/Templates/Page/
      20 = EXT:bootstrap_package/Resources/Private/Templates/Page
    }
    partialRootPaths {
      10 = EXT:nano/Resources/Private/Partials/Page/
      20 = EXT:bootstrap_package/Resources/Private/Partials/Page
    }
    layoutRootPaths {
      10 = EXT:nano/Resources/Private/Layouts/Page/
      20 = EXT:bootstrap_package/Resources/Private/Layouts/Page/
    }
  }
  
	settings {
		listPid = {$plugin.listPid}
		detailsPid = {$plugin.detailsPid}
	}
}

plugin.tx_nano_widgetsearchbyvehicalterms {
	view {
    templateRootPaths {
      10 = EXT:nano/Resources/Private/Templates/Page/
      20 = EXT:bootstrap_package/Resources/Private/Templates/Page
    }
    partialRootPaths {
      10 = EXT:nano/Resources/Private/Partials/Page/
      20 = EXT:bootstrap_package/Resources/Private/Partials/Page
    }
    layoutRootPaths {
      10 = EXT:nano/Resources/Private/Layouts/Page/
      20 = EXT:bootstrap_package/Resources/Private/Layouts/Page/
    }
  }
  
  features {
  	requireCHashArgumentForActionArguments = 0
  }
	
	persistence {
		storagePid = {$widget.searchByTerms.storagePid}
	}
	
	settings {
		searchPid = {$widget.searchByTerms.searchPid}
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
    pluginName = WidgetSearchByTerms
		resolveMainShortcut = 1
	}
}