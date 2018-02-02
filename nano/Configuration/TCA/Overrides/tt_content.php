<?php
defined('TYPO3_MODE') or die();

/**
 * *************
 * Plugins
 * *************
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'Battery', 'Ắc quy xe');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('nano', 'BatteryByApplication', 'Ắc quy xe theo loại xe');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_nano_domain_model_battery');