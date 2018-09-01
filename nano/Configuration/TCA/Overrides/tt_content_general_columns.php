<?php

defined('TYPO3_MODE') || die();

/***************
 * Adjust columns for generic usage
 */

$GLOBALS['TCA']['tt_content']['columns']['tx_nano_client_item'] = [
  'label' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item',
  'config' => [
    'type' => 'inline',
    'foreign_table' => 'tx_nano_client_item',
    'foreign_field' => 'tt_content',
    'appearance' => [
      'useSortable' => true,
      'showSynchronizationLink' => true,
      'showAllLocalizationLink' => true,
      'showPossibleLocalizationRecords' => true,
      'showRemovedLocalizationRecords' => false,
      'expandSingle' => true,
      'enabledControls' => [
        'localize' => true,
      ]
    ],
    'behaviour' => [
      'mode' => 'select',
      'localizeChildrenAtParentLocalization' => true,
    ]
  ]
];