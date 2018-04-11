<?php

namespace ELCA\Nano\Domain\Validator;

use In2code\Powermail\Domain\Validator\AbstractValidator;
use ELCA\Nano\Extbase\Error\CartIsEmptyError;
use TYPO3\CMS\Extbase\Error\Result;

/**
 * Class CheckoutValidator
 */
class CheckoutValidator extends AbstractValidator {
  /**
   * Session Handler
   *
   * @var \ELCA\Nano\Service\SessionHandler
   * @inject
   */
  protected $sessionHandler;
  
  /**
   * Cart Utility
   *
   * @var \ELCA\Nano\Utility\CartUtility
   * @inject
   */
  protected $cartUtility;
  
  /**
   * Cart product
   *
   * @var \ELCA\Nano\Domain\Model\Cart\Cart
   */
  protected $cart;
  
  /**
   * validate
   *
   * @param \In2code\Powermail\Domain\Model\Mail $mail
   * @return \TYPO3\CMS\Extbase\Error\Result
   */
  public function validate($mail) {
    $result = new Result();
    if($mail->getForm()->getUid() == $this->configuration['checkoutFormUid']) {
      $this->cart = $this->cartUtility->getCartFromSession($this->configuration);
      
      if($this->cart->isCartEmpty()) {
        $result->addError(new CartIsEmptyError('CartIsEmpty', 'This cart is empty.'));
      }
    }
    return $result;
  }
}