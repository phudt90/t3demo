plugin.tx_powermail {
  settings.setup {    
    finishers {
      1 {
        class = DTP\Nano\Finisher\CheckoutFinisher
        
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