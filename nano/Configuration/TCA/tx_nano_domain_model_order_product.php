<?php
defined('TYPO3_MODE') or die();

return [
  'ctrl' => [
    'title' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order_product.label',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'editlock' => 'editlock',
    'delete' => 'deleted',
    'versioningWS' => true,
    'origUid' => 't3_origuid',
    'hideAtCopy' => true,
    'prependAtCopy' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
    'transOrigPointerField' => 'l18n_parent',
    'transOrigDiffSourceField' => 'l18n_diffsource',
    'languageField' => 'sys_language_uid',
    'translationSource' => 'l10n_source',
    'enablecolumns' => [
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime'
    ],
    'searchFields' => 'title',
    'default_sortby' => 'ORDER BY crdate DESC',
    'sortby' => 'sorting'
  ],
  'interface' => [
    'showRecordFieldList' => 'title,order,product,model,quantity'
  ],
  'columns' => [
    'l18n_diffsource' => [
      'config' => [
        'type' => 'passthrough',
        'default' => ''
      ]
    ],
    'hidden' => [
      'exclude' => true,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
      'config' => [
        'type' => 'check',
        'default' => 0
      ]
    ],
    'cruser_id' => [
      'label' => 'cruser_id',
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'editlock' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:lang/locallang_tca.xlf:editlock',
      'config' => [
        'type' => 'check'
      ]
    ],
    'pid' => [
      'label' => 'pid',
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'crdate' => [
      'label' => 'crdate',
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'tstamp' => [
      'label' => 'tstamp',
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'sorting' => [
      'label' => 'sorting',
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'starttime' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
      'config' => [
        'type' => 'input',
        'size' => 16,
        'eval' => 'datetime',
        'default' => 0
      ]
    ],
    'endtime' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
      'config' => [
        'type' => 'input',
        'size' => 16,
        'eval' => 'datetime',
        'default' => 0
      ]
    ],
    // domain model fields
    'title' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order_product.title',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'order' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order_product.order',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_order',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_order.sorting',
        'size' => '6',
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'battery' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order_product.battery',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_battery',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_battery.sorting',
        'size' => '6',
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'model' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order_product.model',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'quantity' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order_product.quantity',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 255,
        'eval' => 'required,trim,int'
      ]
    ],
  ],
  'types' => [
    '0' => [
      'showitem' => '--palette--;;paletteGeneral'
    ]
    
  ],
  'palettes' => [
    'paletteGeneral' => [
      'showitem' => 'title,hidden,--linebreak--,model,quantity,--linebreak--,order,battery',
    ],
  ]
];