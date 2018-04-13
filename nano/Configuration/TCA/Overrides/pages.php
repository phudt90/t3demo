<?php
defined('TYPO3_MODE') || die();

/**********************
 * Temporary variables
 **********************/
$extensionKey = 'nano';

/*******************
 * Register PageTS
 *******************/

// Records List
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
  $extensionKey,
  'Configuration/PageTS/Mod/RecordsList.ts',
  'Nano: Records List'
);