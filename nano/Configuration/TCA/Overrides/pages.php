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

$additionalColumns = [
  'tx_nano_nav_layout' => [
    'exclude' => 1,
    'label'   => 'Menu Layout',
    'config' => [
      'type' => 'select',
      'renderType' => 'selectSingle',
      'minitems' => 1,
      'maxitems' => 1,
      'items' => [
        ['Default', 0],
        ['3 Columns', 1],
        ['Horizontal', 2],
      ],
    ]
  ],
  'tx_nano_nav_type' => [
    'exclude' => 1,
    'label'   => 'Link Type',
    'config' => [
      'type' => 'select',
      'renderType' => 'selectSingle',
      'minitems' => 1,
      'maxitems' => 1,
      'items' => [
        ['Default', 0],
        ['Image', 1],
      ],
    ]
  ],
  'tx_nano_nav_position' => [
    'exclude' => 1,
    'label'   => 'Position',
    'config' => [
      'type' => 'select',
      'renderType' => 'selectSingle',
      'minitems' => 1,
      'maxitems' => 1,
      'items' => [
        ['', 0],
        ['1', 1],
        ['2', 2],
        ['3', 3],
      ],
    ]
  ],
];
// Add new fields to pages
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $additionalColumns);

// Make fields visible in the TCEforms
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
  'pages',
  'tx_nano_nav_layout,tx_nano_nav_type,tx_nano_nav_position',
  '1',
  'after:nav_icon'
);
