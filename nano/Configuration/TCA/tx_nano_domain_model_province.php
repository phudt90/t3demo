<?php
defined('TYPO3_MODE') or die();

return [
  'ctrl' => [
    'title' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_province.label',
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
    'showRecordFieldList' => 'title,code,type'
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
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_province.title',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'code' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_province.code',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 32,
        'eval' => 'required'
      ]
    ],
    'type' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_province.type',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['Tỉnh', 1],
          ['Thành phố', 2],
        ],
      ]
    ],
    'districts' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_province.districts',
      'config' => [
        'type' => 'inline',
        'foreign_table' => 'tx_nano_domain_model_district',
        'foreign_field' => 'province',
        'foreign_sortby' => 'sorting',
        'minitems' => 1,
        'maxitems' => 99,
        'appearance' => [
          'collapseAll' => 1,
          'expandSingle' => 1,
          'useSortable' => 1,
        ]
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
      'showitem' => 'title,hidden,--linebreak--,code,type,--linebreak--,districts',
    ],
  ]
];