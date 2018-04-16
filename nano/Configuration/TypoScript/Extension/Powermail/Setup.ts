plugin.tx_powermail {
  view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/PowerMail/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/PowerMail/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/PowerMail/
  }
  
  settings.setup {
    validation {
      native = 1
      client = 1
      server = 1
    }
    
    validators {
      1 {
        class = ELCA\Nano\Domain\Validator\CheckoutValidator
        
        config {
          cartPid = {$plugin.cartPid}
          checkoutPid = {$plugin.checkoutPid} 
          checkoutFormUid = {$plugin.checkoutFormUid}
        }
      }
    }
    
    finishers {
      1 {
        class = ELCA\Nano\Finisher\CheckoutFinisher
        
        config {
          cartPid = {$plugin.cartPid}
          checkoutPid = {$plugin.checkoutPid} 
          checkoutFormUid = {$plugin.checkoutFormUid}
          orderStoragePid = {$plugin.orderStoragePid}
        }
      }
    }
  }
}