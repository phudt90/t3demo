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
  'Cart' => 'index, addProduct, removeProduct, updateProduct, clearCart',
], [
  'Cart' => 'index, addProduct, removeProduct, updateProduct, clearCart'
]);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'PageCheckout', [
  'Checkout' => 'index, create, success',
], [
  'Checkout' => 'index, create, success',
]);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetMiniCart', [
  'Cart' => 'miniCart',
], [
  'Cart' => 'miniCart',
]);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetSelectedBatteries', [
  'Battery' => 'selectedBatteries',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetBatteryByApplication', [
  'Battery' => 'batteryByApplication',
], []);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'WidgetSearchByVehicalTerms', [
  'SearchByVehical' => 'showForm',
], []);

$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
  \In2code\Powermail\Domain\Service\Mail\SendMailService::class,
  'sendTemplateEmailBeforeSend',
  \ELCA\Nano\Hook\SendMailHook::class,
  'prepareAndSend'
);

// Disable caching on development enviroment
if(\TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->isDevelopment()) {
  foreach ($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'] as $cacheName => $cacheConfiguration) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheName]['backend'] = \TYPO3\CMS\Core\Cache\Backend\NullBackend::class;
  }
}