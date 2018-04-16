plugin.tx_nano_pagecheckout {
  mvc {
    callDefaultActionIfActionCantBeResolved = 0
  }
  
  features {
    skipDefaultArguments = 0
    requireCHashArgumentForActionArguments = 0
  }
  
  persistence {
    storagePid = {$plugin.storagePid}
  }
  
  view {
		templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
	}
	settings {
		cartPid = {$plugin.cartPid}
		checkoutPid = {$plugin.checkoutPid}
		detailsPid = {$plugin.detailsPid}
		orderStoragePid = {$plugin.orderStoragePid}
		checkoutFormUid = {$plugin.checkoutFormUid}
	}
}