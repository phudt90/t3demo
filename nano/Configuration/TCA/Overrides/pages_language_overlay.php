<?php
defined('TYPO3_MODE') or die();

// Adding field to pages TCA
$additionalColumns = [
  'tx_nano_nav_position' => [
    'exclude' => 1,
    'label'   => 'Vị trí cột',
    'config' => [
      'type' => 'select',
      'renderType' => 'selectSingle',
      'size' => 30,
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $additionalColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', 'tx_nano_nav_position', '1', 'after:nav_icon');
