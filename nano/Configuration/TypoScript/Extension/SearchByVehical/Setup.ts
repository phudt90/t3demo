<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/SearchByVehical/SearchForm.ts">

plugin.tx_nano_pagebatterysearchbyvehical {
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