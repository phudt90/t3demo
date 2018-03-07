
plugin.tx_nano_batterylist {
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
		detailsPid = {$plugin.detailsPid}
	}
}

plugin.tx_nano_batterybyapplication {
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
		detailsPid = {$plugin.detailsPid}
	}
}

plugin.tx_nano_widgetsearchbyterms {
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
	
	persistence {
		storagePid = {$plugin.storagePid}
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