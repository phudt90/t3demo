<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nano/Configuration/TypoScript/Extension/Cart/CartProduct.ts">

plugin.tx_nano_pageshoppingcart {
  view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
  }
  
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
  
  settings {
  	cartPid = {$plugin.cartPid}
  	detailsPid = {$plugin.detailsPid}
  }
}

config.tx_extbase.persistence.classes {
  ELCA\Nano\Domain\Model\OrderProduct {
    mapping {
      tableName = tx_nano_domain_model_order_product
    }
  }
}