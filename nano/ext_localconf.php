<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('ELCA.nano', 'Battery', [
  'Battery' => 'list,detail',
], [
  'Battery' => 'list,detail'
]);