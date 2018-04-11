<?php

namespace ELCA\Nano\Domain\Model;

/**
 * CartUser Model
 */
class CartUser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
  /**
   * fHash
   *
   * @var string
   */
  protected $fHash;
  
  /**
   * sHash
   *
   * @var string
   */
  protected $sHash;
  
  /**
   * FeUser
   *
   * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
   */
  protected $feUser;

  /**
   * Cart constructor
   */
  public function __construct() {
    $this->fHash = bin2hex(openssl_random_pseudo_bytes(32));
    $this->sHash = bin2hex(openssl_random_pseudo_bytes(32));
  }

  /**
   * Returns fHash
   *
   * @return string
   */
  public function getFHash() {
    return $this->fHash;
  }

  /**
   * Sets fHash
   */
  public function setFHash($fHash) {
    $this->fHash = $fHash;
  }

  /**
   * Returns sHash
   *
   * @return string
   */
  public function getSHash() {
    return $this->sHash;
  }

  /**
   * Sets sHash
   */
  public function setSHash($sHash) {
    $this->sHash = $sHash;
  }

  /**
   * Returns FeUser
   *
   * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
   */
  public function getFeUser() {
    return $this->feUser;
  }

  /**
   * Sets FeUser
   *
   * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feUser
   */
  public function setFeUser($feUser) {
    $this->feUser = $feUser;
  }
}
