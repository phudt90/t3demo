<?php

namespace DTP\Nano\Service;

use TYPO3\CMS\Core\SingletonInterface;

/**
 * SessionHandler
 */
class SessionHandler implements SingletonInterface {
  /**
   *
   * @var string
   * 
   */
  protected $prefixKey = 'cart_';

  /**
   * Returns the object stored in the user's PHP session
   *
   * @param string $key
   *
   * @return \DTP\Nano\Domain\Model\Cart\Cart
   */
  public function restoreFromSession($key) {
    $sessionData = $GLOBALS['TSFE']->fe_user->getKey('ses', $this->prefixKey . $key);
    return unserialize($sessionData);
  }

  /**
   * Writes an object into the PHP session
   *
   * @param \DTP\Nano\Domain\Model\Cart\Cart $cart
   * @param string $key
   * 
   * @return SessionHandler $this
   */
  public function writeToSession(\DTP\Nano\Domain\Model\Cart\Cart $cart, $key) {
    $sessionData = serialize($cart);
    $GLOBALS['TSFE']->fe_user->setKey('ses', $this->prefixKey . $key, $sessionData);
    $GLOBALS['TSFE']->fe_user->storeSessionData();
    return $this;
  }

  /**
   * Cleans up the session: removes the stored object from the PHP session
   *
   * @param string $key
   *
   * @return SessionHandler $this
   */
  public function cleanUpSession($key) {
    $GLOBALS['TSFE']->fe_user->setKey('ses', $this->prefixKey . $key, null);
    $GLOBALS['TSFE']->fe_user->storeSessionData();
    return $this;
  }

  /**
   * Sets own prefix key for session
   *
   * @param string $prefixKey
   */
  public function setPrefixKey($prefixKey) {
    $this->prefixKey = $prefixKey;
  }
}
