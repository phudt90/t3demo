plugin.tx_powermail {
  settings.setup {
    validators {
      1 {
        class = DTP\Nano\Domain\Validator\CheckoutValidator
        
        config {
          cartPid = {$plugin.cartPid}
          checkoutPid = {$plugin.checkoutPid} 
          checkoutFormUid = {$plugin.checkoutFormUid}
        }
      }
    }
  }
}