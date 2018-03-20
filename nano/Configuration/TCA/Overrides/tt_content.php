<?php
defined('TYPO3_MODE') or die();

/**
 * *************
 * Plugins
 * *************
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageBatteryList', 'Danh mục ắc quy');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageBatteryDetails', 'Chi tiết ắc quy');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'PageBatterySearchByVehical', 'Tìm ắc quy theo xe');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'WidgetBatteryByApplication', 'Widget: Ắc quy theo loại xe');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'WidgetSearchByVehicalTerms', 'Widget: Search by vehical terms');

$pluginSignature = 'nano_widgetbatterybyapplication';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:nano/Configuration/FlexForms/flexform_nano.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_nano_domain_model_battery');