plugin {
	storagePid = 2
	listPid = 14
	detailsPid = 3
	searchPid = 4
	cartPid = 17
	checkoutPid = 21
	orderStoragePid = 19
	checkoutFormUid = 1
	
	tx_nano_cart {
		view = {
			templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
	    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
	    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
		}
		settings {
			cartPid = 18
			checkoutPid = 23
			orderStoragePid = 19
			checkoutFormUid = 1
		}
	}
}