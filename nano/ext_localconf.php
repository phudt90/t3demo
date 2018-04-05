<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'PageBatteryList', [
  'Battery' => 'list',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'PageBatteryDetails', [
  'Battery' => 'details',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'PageBatterySearchByVehical', [
  'Battery' => 'search',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'PageShoppingCart', [
  'Cart' => 'index,addProduct,addToCart',
], [
  'Cart' => 'index,addProduct,addToCart'
]);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetBatteryByApplication', [
  'Battery' => 'batteryByApplication',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetSearchByVehicalTerms', [
  'SearchByTerms' => 'index',
], []);

// Disable caching on development enviroment
if(\TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->isDevelopment()) {
  foreach ($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'] as $cacheName => $cacheConfiguration) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheName]['backend'] = \TYPO3\CMS\Core\Cache\Backend\NullBackend::class;
  }
}