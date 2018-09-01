<?php
defined('TYPO3_MODE') or die();

foreach (['application', 'brand', 'battery', 'vbrand', 'vmodel'] as $table) {
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nano_domain_model_' . $table);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nano_client_item');