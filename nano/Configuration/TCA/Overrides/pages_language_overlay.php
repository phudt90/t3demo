<?php
defined('TYPO3_MODE') or die();

// Adding field to pages TCA
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
    'label'   => 'Columns',
    'config' => [
      'type' => 'select',
      'renderType' => 'selectSingle',
      'minitems' => 1,
      'maxitems' => 1,
      'items' => [
        ['', 0],
        ['2', 2],
        ['3', 3],
      ],
    ]
  ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $additionalColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
  'pages_language_overlay', 
  'tx_nano_nav_layout,tx_nano_nav_type,tx_nano_nav_position', 
  '1', 
  'after:nav_icon'
);
