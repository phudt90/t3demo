<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/Cart/Setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/Checkout/Setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/SearchByVehical/Setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/Powermail/Setup.ts">

plugin.tx_nano_pagebatterylist {
  view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
    
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
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
    
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

plugin.tx_nano_widgetbatterybyapplication {
	view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
  }
  
	settings {
		listPid = {$plugin.listPid}
		detailsPid = {$plugin.detailsPid}
	}
}