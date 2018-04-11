
plugin.tx_powermail.settings.setup {
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
      	checkoutFormUid = {$plugin.checkoutFormUid}
    	}
 		}
  }
  
  finishers {
    1 {
  		class = ELCA\Nano\Finisher\CheckoutFinisher
  		
  		config {
  			cartPid = {$plugin.cartPid}
  			checkoutFormUid = {$plugin.checkoutFormUid}
  		}
    }
  }
}