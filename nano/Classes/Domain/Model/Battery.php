<?php

namespace ELCA\Nano\Domain\Model;

/**
 * Battery model
 */
class Battery extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
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
  protected $teaser;
  
  /**
   *
   * @var string
   */
  protected $bodytext;
  
  /**
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ELCA\Nano\Domain\Model\Application>
   * @lazy
   */
  protected $applications;
  
  /**
   *
   * @var \ELCA\Nano\Domain\Model\Brand
   */
  protected $brand;
  
  /**
   *
   * @var string
   */
  protected $keywords;
  
  /**
   *
   * @var string
   */
  protected $description;
  
  /**
   * Fal media items
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\FileReference>
   * @lazy
   */
  protected $falMedia;
  
  /**
   * Fal media items with showinpreview set
   *
   * @var array @transient
   */
  protected $falMediaPreviews;
  
  /**
   * Fal media items with showinpreview not set
   *
   * @var array @transient
   */
  protected $falMediaNonPreviews;
  
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
   * Initialize applications and media relation
   *
   * @return \ELCA\Nano\Domain\Model\Battery
   */
  public function __construct() {
    $this->applications = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    $this->falMedia = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
  }

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
   * Get Teaser text
   *
   * @return string
   */
  public function getTeaser() {
    return $this->teaser;
  }

  /**
   * Set Teaser text
   *
   * @param string $teaser
   * teaser text
   */
  public function setTeaser($teaser) {
    $this->teaser = $teaser;
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
   * Get applications
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ELCA\Nano\Domain\Model\Application>
   */
  public function getApplications() {
    return $this->applications;
  }

  /**
   * Set applications
   *
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $applications
   */
  public function setApplications($applications) {
    $this->applications = $applications;
  }

  /**
   * Adds a application to this applications.
   *
   * @param \ELCA\Nano\Domain\Model\Application $application
   */
  public function addApplication(\ELCA\Nano\Domain\Model\Application $application) {
    $this->getApplications()->attach($application);
  }

  /**
   *
   * @return \ELCA\Nano\Domain\Model\Brand
   */
  public function getBrand() {
    return $this->brand;
  }

  /**
   *
   * @param \ELCA\Nano\Domain\Model\Brand $brand
   */
  public function setBrand($brand) {
    $this->brand = $brand;
  }

/**
   * Get keywords
   *
   * @return string
   */
  public function getKeywords() {
    return $this->keywords;
  }

  /**
   * Set keywords
   *
   * @param string $keywords
   * keywords
   */
  public function setKeywords($keywords) {
    $this->keywords = $keywords;
  }

  /**
   * Get description
   *
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Set description
   *
   * @param string $description
   * description
   */
  public function setDescription($description) {
    $this->description = $description;
  }

  /**
   * Get the Fal media items
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
   */
  public function getFalMedia() {
    return $this->falMedia;
  }

  /**
   * Short method for getFalMedia()
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
   */
  public function getMedia() {
    return $this->getFalMedia();
  }

  /**
   * Set Fal media relation
   *
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $falMedia
   */
  public function setFalMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $falMedia) {
    $this->falMedia = $falMedia;
  }

  /**
   * Add a Fal media file reference
   *
   * @param \GeorgRinger\News\Domain\Model\FileReference $falMedia
   */
  public function addFalMedia(\GeorgRinger\News\Domain\Model\FileReference $falMedia) {
    if ($this->getFalMedia() === null) {
      $this->falMedia = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    $this->falMedia->attach($falMedia);
  }

  /**
   * Get the Fal media items
   *
   * @return array
   */
  public function getFalMediaPreviews() {
    if ($this->falMediaPreviews === null && $this->getFalMedia()) {
      $this->falMediaPreviews = [];
      /** @var $mediaItem \GeorgRinger\News\Domain\Model\FileReference */
      foreach ($this->getFalMedia() as $mediaItem) {
        if ($mediaItem->getOriginalResource()->getProperty('showinpreview')) {
          $this->falMediaPreviews[] = $mediaItem;
        }
      }
    }
    return $this->falMediaPreviews;
  }

  /**
   * Short method for getFalMediaPreviews
   *
   * @return array
   */
  public function getMediaPreviews() {
    return $this->getFalMediaPreviews();
  }

  /**
   * Get all media elements which are not tagged as preview
   *
   * @return array
   */
  public function getFalMediaNonPreviews() {
    if ($this->falMediaNonPreviews === null && $this->getFalMedia()) {
      $this->falMediaNonPreviews = [];
      /** @var $mediaItem \GeorgRinger\News\Domain\Model\FileReference */
      foreach ($this->getFalMedia() as $mediaItem) {
        if (! $mediaItem->getOriginalResource()->getProperty('showinpreview')) {
          $this->falMediaNonPreviews[] = $mediaItem;
        }
      }
    }
    return $this->falMediaNonPreviews;
  }

  /**
   * Short method for getFalMediaNonPreviews
   *
   * @return array
   */
  public function getMediaNonPreviews() {
    return $this->getFalMediaNonPreviews();
  }

  /**
   * Get first media element which is tagged as preview and is of type image
   *
   * @return \GeorgRinger\News\Domain\Model\FileReference
   */
  public function getFirstFalImagePreview() {
    $mediaElements = $this->getFalMediaPreviews();
    if (is_array($mediaElements)) {
      foreach ($mediaElements as $mediaElement) {
        return $mediaElement;
      }
    }
    return null;
  }

  /**
   * Short method for getFirstFalImagePreview
   *
   * @return \GeorgRinger\News\Domain\Model\FileReference
   */
  public function getFirstPreview() {
    return $this->getFirstFalImagePreview();
  }
  
  public function getFirstFalMedia() {
    $mediaElements = $this->getFalMediaNonPreviews();
    if (is_array($mediaElements)) {
      foreach ($mediaElements as $mediaElement) {
        return $mediaElement;
      }
    }
    return null;
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
