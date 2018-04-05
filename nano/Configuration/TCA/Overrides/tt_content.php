<?php
defined('TYPO3_MODE') or die();

/**
 * *****************
 * Frontend Plugins
 * *****************
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageBatteryList', 'Page: Danh mục ắc quy');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageBatteryDetails', 'Page: Chi tiết ắc quy');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageBatterySearchByVehical', 'Page: Tìm ắc quy theo xe');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageShoppingCart', 'Page: Shopping cart');
//\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageCheckout', 'Page: Checkout');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'WidgetBatteryByApplication', 'Widget: Ắc quy theo loại xe');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'WidgetSearchByVehicalTerms', 'Widget: Search by vehical terms');

/**
 * ********************************************
 * Frontend Plugins flexform for configuration
 * ********************************************
 */
$pluginSignature = 'nano_widgetbatterybyapplication';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:nano/Configuration/FlexForms/flexform_nano.xml');

/**
 * *********************************
 * Allow tables for insert records
 * *********************************
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_nano_domain_model_battery');