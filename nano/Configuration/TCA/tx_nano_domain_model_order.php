<?php
defined('TYPO3_MODE') or die();

return [
  'ctrl' => [
    'title' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.label',
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
    'showRecordFieldList' => 'title,fullname,email,phone,address,province,district,status,comment'
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
    'hash' => [
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'title' => [
      'exclude' => false,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:header_formlabel',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'fullname' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.fullname',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'email' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.email',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'phone' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.phone',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 64,
        'eval' => 'required'
      ]
    ],
    'address' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.address',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'province' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.province',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_province',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_province.sorting',
        'size' => 6,
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'district' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.district',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_district',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_district.sorting',
        'size' => 6,
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'status' => [
      'exclude' => false,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.status',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['Chờ duyệt', 1],
          ['Đã duyệt', 2],
          ['Đang thực hiện', 3],
          ['Đang giao', 4],
          ['Đã giao', 5],
          ['Đã xong', 6],
        ],
      ]
    ],
    'comment' => [
      'exclude' => false,
      'l10n_mode' => 'noCopy',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.comment',
      'config' => [
        'type' => 'text',
        'cols' => 30,
        'rows' => 5,
        'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
        'wizards' => [
          'RTE' => [
            'notNewRecords' => 1,
            'RTEonly' => 1,
            'type' => 'script',
            'title' => 'Full screen Rich Text Editing',
            'icon' => 'actions-wizard-rte',
            'module' => [
              'name' => 'wizard_rte'
            ]
          ]
        ]
      ]
    ],
    'products' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_order.products',
      'config' => [
        'type' => 'inline',
        'foreign_table' => 'tx_nano_domain_model_order_product',
        'foreign_field' => 'order',
        'foreign_sortby' => 'sorting',
        'minitems' => 1,
        'maxitems' => 1000,
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
      'showitem' => '--palette--;;paletteGeneral,--linebreak--,;;paletteContact,status,--linebreak--,comment,--linebreak--,products'
    ]
    
  ],
  'palettes' => [
    'paletteGeneral' => [
      'showitem' => 'title,hidden',
    ],
    'paletteContact' => [
      'showitem' => 'fullname,email,phone,--linebreak--,address,--linebreak--'
    ],
  ]
];