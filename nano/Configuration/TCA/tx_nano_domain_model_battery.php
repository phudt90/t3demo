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
    'default_sortby' => 'ORDER BY crdate DESC',
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
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:teaser_formlabel',
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
    'applications' => [
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_application.label',
      'config' => [
        'type' => 'select',
        'render_type' => 'selectMultipleSideBySide',
        'MM' => 'tx_nano_domain_model_battery_application_mm',
        'foreign_table' => 'tx_nano_domain_model_application',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_application.sorting',
        'multiple' => false,
        'size' => 10,
        'minitems' => 1,
        'maxitems' => 99
      ]
    ],
    'brand' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_brand.label',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_brand',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_brand.sorting',
        'size' => '1',
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'code' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.code.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required'
      ]
    ],
    'price' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.price.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'double2'
      ],
    ],
    'price_regular' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.price_regular.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'double2'
      ],
    ],
    'terminal_type' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.terminal_type.label',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['', 0],
          ['Cọc nhỏ', 1],
          ['Cọc tiêu chuẩn', 2],
          ['Cọc Bulon', 3],
          ['Cọc xe máy', 4],
        ],
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'terminal_layout' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.terminal_layout.label',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['', 0],
          ['Thuận', 1],
          ['Nghịch', 2],
          ['Chính giữa', 3],
          ['Ngang', 4],
        ],
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'voltage' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.voltage.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'technology' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.technology.label',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          ['', 0],
          ['Miễn bảo dưỡng', 1],
          ['AGM', 2],
          ['Xả sâu', 3],
          ['Truyền thống', 4],
        ],
      ]
    ],
    'capacity_20' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.capacity_20.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'capacity_100' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.capacity_100.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'cca_en' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.cca_en.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'cca_sae' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.cca_sae.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'length' => [
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.length.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'width' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.width.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'height' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.height.label',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,int'
      ]
    ],
    'guarantee' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/locallang_nano.xlf:tx_nano_domain_model_battery.guarantee.label',
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
      'showitem' => 'title,--palette--;;paletteCore,teaser,bodytext,
        --div--;LLL:EXT:nano/Resources/Private/Language/locallang_tca.xlf:pages.tabs.specs,
				--palette--;LLL:EXT:nano/Resources/Private/Language/locallang_tca.xlf:pages.palettes.specs;paletteSpecs,
        --div--;LLL:EXT:nano/Resources/Private/Language/locallang_tca.xlf:pages.tabs.media,
				--palette--;LLL:EXT:nano/Resources/Private/Language/locallang_tca.xlf:pages.palettes.media;paletteMedia,
        --div--;LLL:EXT:nano/Resources/Private/Language/locallang_tca.xlf:pages.tabs.metadata,
				--palette--;LLL:EXT:nano/Resources/Private/Language/locallang_tca.xlf:pages.palettes.metatags;metatags,
        --div--;LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
        --palette--;LLL:EXT:nano/Resources/Private/Language/locallang_ttc.xlf:palette.access;paletteAccess
      '
    ]
  
  ],
  'palettes' => [
    'paletteCore' => [
      'showitem' => 'code,price,price_regular,hidden,--linebreak--,applications,--linebreak--,brand',
    ],
    'paletteSpecs' => [
      'showitem' => 'terminal_type,terminal_layout,voltage,technology,capacity_20,cca_en,cca_sae,length,width,height,guarantee'
    ],
    'paletteMedia' => [
      'showitem' => 'fal_media'
    ],
    'metatags' => [
      'showitem' => 'seo_title,--linebreak--,seo_keywords,--linebreak--,seo_description,',
    ],
    'paletteAccess' => [
      'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
					endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
					--linebreak--, fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:fe_group_formlabel,
					--linebreak--,editlock,'
    ],
  ]
];