<?php

namespace ELCA\Nano\Domain\Model;

/**
 * Vehical brand model
 */
class Vbrand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
  /**
   *
   * @var \DateTime
   */
  protected $crdate;
  
  /**
   *
   * @var \DateTime
   */
  protected $tstamp;
  
  /**
   *
   * @var int
   */
  protected $sysLanguageUid;
  
  /**
   *
   * @var int
   */
  protected $l10nParent;
  
  /**
   *
   * @var \DateTime
   */
  protected $starttime;
  
  /**
   *
   * @var \DateTime
   */
  protected $endtime;
  
  /**
   *
   * @var bool
   */
  protected $hidden;
  
  /**
   *
   * @var bool
   */
  protected $deleted;
  
  /**
   *
   * @var int
   */
  protected $cruserId;
  
  /**
   *
   * @var string
   */
  protected $title;
  
  /**
   *
   * @var string
   */
  protected $bodytext;
  
  /**
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ELCA\Nano\Domain\Model\Vmodel>
   * @lazy
   */
  protected $vmodels;
  
  /**
   *
   * @var int
   */
  protected $editlock;
  
  /**
   *
   * @var int
   */
  protected $sorting;

  /**
   * Get title
   *
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Set title
   *
   * @param string $title
   * title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * Get bodytext
   *
   * @return string
   */
  public function getBodytext() {
    return $this->bodytext;
  }

  /**
   * Set bodytext
   *
   * @param string $bodytext
   * main content
   */
  public function setBodytext($bodytext) {
    $this->bodytext = $bodytext;
  }
  
  /**
   * Get vehical models
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ELCA\Nano\Domain\Model\Vmodel>
   */
  public function getVmodels() {
    return $this->vmodels;
  }
  
  /**
   * Set vehicel models
   *
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $vmodels
   */
  public function setVmodels($vmodels) {
    $this->vmodels = $vmodels;
  }
  
  /**
   * Adds a vehicel model to thisvehicel models.
   *
   * @param \ELCA\Nano\Domain\Model\Vmodel $vmodel
   */
  public function addVmodel(\ELCA\Nano\Domain\Model\Vmodel $vmodel) {
    $this->getVmodels()->attach($vmodel);
  }

  /**
   * Get creation date
   *
   * @return int
   */
  public function getCrdate() {
    return $this->crdate;
  }

  /**
   * Set creation date
   *
   * @param int $crdate
   */
  public function setCrdate($crdate) {
    $this->crdate = $crdate;
  }

  /**
   * Get year of crdate
   *
   * @return int
   */
  public function getYearOfCrdate() {
    return $this->getCrdate()->format('Y');
  }

  /**
   * Get month of crdate
   *
   * @return int
   */
  public function getMonthOfCrdate() {
    return $this->getCrdate()->format('m');
  }

  /**
   * Get day of crdate
   *
   * @return int
   */
  public function getDayOfCrdate() {
    return (int) $this->crdate->format('d');
  }

  /**
   * Get timestamp
   *
   * @return int
   */
  public function getTstamp() {
    return $this->tstamp;
  }

  /**
   * Set time stamp
   *
   * @param int $tstamp
   * time stamp
   */
  public function setTstamp($tstamp) {
    $this->tstamp = $tstamp;
  }

  /**
   * Set sys language
   *
   * @param int $sysLanguageUid
   */
  public function setSysLanguageUid($sysLanguageUid) {
    $this->_languageUid = $sysLanguageUid;
  }

  /**
   * Get sys language
   *
   * @return int
   */
  public function getSysLanguageUid() {
    return $this->_languageUid;
  }

  /**
   * Set l10n parent
   *
   * @param int $l10nParent
   */
  public function setL10nParent($l10nParent) {
    $this->l10nParent = $l10nParent;
  }

  /**
   * Get l10n parent
   *
   * @return int
   */
  public function getL10nParent() {
    return $this->l10nParent;
  }

  /**
   * Get year of tstamp
   *
   * @return int
   */
  public function getYearOfTstamp() {
    return $this->getTstamp()->format('Y');
  }

  /**
   * Get month of tstamp
   *
   * @return int
   */
  public function getMonthOfTstamp() {
    return $this->getTstamp()->format('m');
  }

  /**
   * Get day of tstamp
   *
   * @return int
   */
  public function getDayOfTimestamp() {
    return (int) $this->tstamp->format('d');
  }

  /**
   * Get id of creator user
   *
   * @return int
   */
  public function getCruserId() {
    return $this->cruserId;
  }

  /**
   * Set cruser id
   *
   * @param int $cruserId
   * id of creator user
   */
  public function setCruserId($cruserId) {
    $this->cruserId = $cruserId;
  }

  /**
   * Get editlock flag
   *
   * @return int
   */
  public function getEditlock() {
    return $this->editlock;
  }

  /**
   * Set edit lock flag
   *
   * @param int $editlock
   * editlock flag
   */
  public function setEditlock($editlock) {
    $this->editlock = $editlock;
  }

  /**
   * Get hidden flag
   *
   * @return int
   */
  public function getHidden() {
    return $this->hidden;
  }

  /**
   * Set hidden flag
   *
   * @param int $hidden
   * hidden flag
   */
  public function setHidden($hidden) {
    $this->hidden = $hidden;
  }

  /**
   * Get deleted flag
   *
   * @return int
   */
  public function getDeleted() {
    return $this->deleted;
  }

  /**
   * Set deleted flag
   *
   * @param int $deleted
   * deleted flag
   */
  public function setDeleted($deleted) {
    $this->deleted = $deleted;
  }

  /**
   * Get start time
   *
   * @return \DateTime
   */
  public function getStarttime() {
    return $this->starttime;
  }

  /**
   * Set start time
   *
   * @param int $starttime
   * start time
   */
  public function setStarttime($starttime) {
    $this->starttime = $starttime;
  }

  /**
   * Get year of starttime
   *
   * @return int
   */
  public function getYearOfStarttime() {
    return $this->getStarttime()->format('Y');
  }

  /**
   * Get month of starttime
   *
   * @return int
   */
  public function getMonthOfStarttime() {
    return $this->getStarttime()->format('m');
  }

  /**
   * Get day of starttime
   *
   * @return int
   */
  public function getDayOfStarttime() {
    return (int) $this->starttime->format('d');
  }

  /**
   * Get endtime
   *
   * @return \DateTime
   */
  public function getEndtime() {
    return $this->endtime;
  }

  /**
   * Set end time
   *
   * @param int $endtime
   * end time
   */
  public function setEndtime($endtime) {
    $this->endtime = $endtime;
  }

  /**
   * Get year of endtime
   *
   * @return int
   */
  public function getYearOfEndtime() {
    return $this->getEndtime()->format('Y');
  }

  /**
   * Get month of endtime
   *
   * @return int
   */
  public function getMonthOfEndtime() {
    return $this->getEndtime()->format('m');
  }

  /**
   * Get day of endtime
   *
   * @return int
   */
  public function getDayOfEndtime() {
    return (int) $this->endtime->format('d');
  }

  /**
   * Get sorting
   *
   * @return int
   */
  public function getSorting() {
    return $this->sorting;
  }

  /**
   * Set sorting
   *
   * @param int $sorting
   * sorting
   */
  public function setSorting($sorting) {
    $this->sorting = $sorting;
  }
}
