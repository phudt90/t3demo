
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