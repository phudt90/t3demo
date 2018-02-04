<?php
defined('TYPO3_MODE') or die();

/**
 * *************
 * Plugins
 * *************
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'Battery', 'Ắc quy xe');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'BatteryByApplication', 'Ắc quy theo loại xe');

$pluginSignature = 'nano_batterybyapplication';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:nano/Configuration/FlexForms/flexform_nano.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_nano_domain_model_battery');