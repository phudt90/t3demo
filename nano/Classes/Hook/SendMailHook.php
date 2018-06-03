<?php

namespace DTP\Nano\Hook;

use TYPO3\CMS\Core\Mail\MailMessage;
use In2code\Powermail\Domain\Service\Mail\SendMailService;

/**
 * Class SendMailHook
 */
class SendMailHook {

  /**
   * Change mail message from before sending email for preventing email to spam folder
   * 
   * @param MailMessage $email Object store email information
   * @param array $message Array with all needed mail information
   * @param SendMailService $sendMailService
   *
   * @return void
   */
  public function prepareAndSend(MailMessage $message, array $email, SendMailService $sendMailService) {
    if(isset($GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username']) && !empty($GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'])) {
      $senderMail = $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'];
      $senderName = 'Phu Do';
      //$message->setFrom(['phudt900@gmail.com' => $email['senderName']]);
    }
  }
}