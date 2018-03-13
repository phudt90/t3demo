<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'BatteryList', [
  'Battery' => 'list,details',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'BatteryByApplication', [
  'Battery' => 'batteryByApplication',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'SearchBattery', [
  'Battery' => 'search,details',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetSearchByTerms', [
  'SearchByTerms' => 'index,list',
], []);

if(\TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->isDevelopment()) {
  foreach ($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'] as $cacheName => $cacheConfiguration) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheName]['backend'] = \TYPO3\CMS\Core\Cache\Backend\NullBackend::class;
  }
}