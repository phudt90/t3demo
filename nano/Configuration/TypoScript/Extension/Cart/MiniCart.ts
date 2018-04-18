plugin.tx_nano_widgetminicart {
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

lib.miniCart = USER
lib.miniCart {
	userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
  vendorName = ELCA
  extensionName = Nano
  pluginName = WidgetMiniCart
  switchableControllerActions {
		Cart {
			1 = miniCart
		}
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