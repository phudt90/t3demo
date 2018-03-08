<?php
defined('TYPO3_MODE') || die();

// Add an extra categories selection field to the tx_nano_domain_model_battery table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable('nano', 'tx_nano_domain_model_battery', 
  // Do not use the default field name ("categories") for pages, tt_content, sys_file_metadata, which is already used
  'categories', [
    // Set a custom label
    'label' => 'Danh mục ắc quy',
    // This field should not be an exclude-field
    'exclude' => FALSE,
    // Override generic configuration, e.g. sort by title rather than by sorting
    'fieldConfiguration' => [
      'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC'
    ],
    // string (keyword), see TCA reference for details
    'l10n_mode' => 'exclude',
    // list of keywords, see TCA reference for details
    'l10n_display' => 'hideDiff'
  ]
);