<?php
defined('TYPO3_MODE') or die();

/**
 * *************
 * Plugins
 * *************
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'BatteryList', 'Danh sách ắc quy');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'BatteryByApplication', 'Ắc quy theo loại xe');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'SearchBattery', 'Tìm ắc quy');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'WidgetSearchByTerms', 'Widget: Search by terms');

$pluginSignature = 'nano_batterybyapplication';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:nano/Configuration/FlexForms/flexform_nano.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_nano_domain_model_battery');