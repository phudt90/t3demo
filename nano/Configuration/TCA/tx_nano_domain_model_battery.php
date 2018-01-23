<?php
defined('TYPO3_MODE') or die();

return [
  'ctrl' => [
    'title' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.label',
    'label' => 'title',
    'label_alt' => 'bodytext',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'editlock' => 'editlock',
    'delete' => 'deleted',
    'versioningWS' => true,
    'origUid' => 't3_origuid',
    'hideAtCopy' => true,
    'prependAtCopy' => 'LLL:EXT:nano/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
    'transOrigPointerField' => 'l18n_parent',
    'transOrigDiffSourceField' => 'l18n_diffsource',
    'languageField' => 'sys_language_uid',
    'translationSource' => 'l10n_source',
    'enablecolumns' => [
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime'
    ],
    'searchFields' => 'title,bodytext',
    'default_sortby' => 'ORDER BY created DESC',
    'sortby' => 'sorting'
  ],
  'interface' => [
    'showRecordFieldList' => 'title,teaser,bodytext'
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
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
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
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
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
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
      'config' => [
        'type' => 'input',
        'size' => 16,
        'eval' => 'datetime',
        'default' => 0
      ]
    ],
    'rowDescription' => [
      'exclude' => true,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_general.xlf:LGL.description',
      'config' => [
        'type' => 'text',
        'rows' => 5,
        'cols' => 30
      ]
    ],
    // domain model fields
    'title' => [
      'exclude' => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:header_formlabel',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'teaser' => [
      'exclude' => 0,
      'l10n_mode' => 'noCopy',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.label.teaser',
      'config' => [
        'type' => 'text',
        'cols' => 60,
        'rows' => 5
      ]
    ],
    'bodytext' => [
      'exclude' => 0,
      'l10n_mode' => 'noCopy',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel',
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
    'seo_title' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'SEO title',
      'config' => [
        'type' => 'input',
        'size' => 50,
        'max' => 255
      ]
    ],
    'seo_keywords' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'SEO keywords',
      'config' => [
        'type' => 'text',
        'placeholder' => '',
        'cols' => 30,
        'rows' => 5
      ]
    ],
    'seo_description' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'SEO description',
      'config' => [
        'type' => 'text',
        'cols' => 30,
        'rows' => 5
      ]
    ],
    'application' => [
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_application.label',
      'config' => [
        'type' => 'select',
        'render_type' => 'selectMultipleSideBySide',
        'MM' => 'tx_nano_domain_model_battery_application_mm',
        'foreign_table' => 'tx_nano_domain_model_application',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_application.sorting',
        'multiple' => true,
        'size' => 10,
        'minitems' => 1,
        'maxitems' => 99
      ]
    ],
    'brand' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_application.label',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_brand',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_brand.sorting',
        'size' => '6',
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'code' => [
      'exclude' => 0,
      'label' => 'Mã sản phẩm',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required'
      ]
    ],
    'terminal_type' => [
      'exclude' => 0,
      'label' => 'Terminal type',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['Standard UK Post', 1],
          ['Narrow JAP Post', 2],
          ['Square bolt throught Post', 3],
          ['Side Terminal', 4],
        ],
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'terminal_layout' => [
      'exclude' => 0,
      'label' => 'Terminal layout',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['1', 1],
          ['2', 2],
        ],
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'voltage' => [
      'exclude' => 0,
      'label' => 'Voltage',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'technology' => [
      'exclude' => 0,
      'label' => 'Technology',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ]
    ],
    'capacity_20' => [
      'exclude' => 0,
      'label' => 'Capacity 20',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'capacity_100' => [
      'exclude' => 0,
      'label' => 'Capacity 100',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'cca_en' => [
      'exclude' => 0,
      'label' => 'CCA EN',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'cca_sae' => [
      'exclude' => 0,
      'label' => 'CCA SAE',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'length' => [
      'label' => 'Length',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'width' => [
      'exclude' => 0,
      'label' => 'Width',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'height' => [
      'exclude' => 0,
      'label' => 'Height',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'guarantee' => [
      'exclude' => 0,
      'label' => 'Bảo hành',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ],
    ],
    'fal_media' => [
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'Hình ảnh',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('fal_media', [
        'appearance' => [
          'createNewRelationLinkTitle' => 'Thêm ảnh',
          'showPossibleLocalizationRecords' => true,
          'showRemovedLocalizationRecords' => true,
          'showAllLocalizationLink' => true,
          'showSynchronizationLink' => true
        ],
        'foreign_match_fields' => [
          'fieldname' => 'fal_media',
          'tablenames' => 'tx_nano_domain_model_battery',
          'table_local' => 'sys_file'
        ],
        'overrideChildTca' => [
          'types' => [
            '0' => [
              'showitem' => '
                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
              'showitem' => '
                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
              'showitem' => '
                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
              'showitem' => '
                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
              'showitem' => '
                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
                --palette--;;filePalette'
            ],
            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
              'showitem' => '
                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                --palette--;;filePalette'
            ]
          ]
        ]
      ], 'gif,jpg,jpeg,bmp,png')
    ]
  ],
  'types' => [
    '0' => [
      'columnsOverrides' => [
        'bodytext' => [
          'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'teaser' => [
          'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ]
      ],
      'showitem' => 'title,teaser,bodytext,application,brand,code,terminal_type,terminal_layout,voltage,technology,capacity_20,capacity_100,cca_en,cca_sae,length,width,height,guarantee,fal_media'
    ]
  
  ],
  'palettes' => []
];