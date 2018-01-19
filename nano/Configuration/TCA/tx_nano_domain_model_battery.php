<?php
defined('TYPO3_MODE') or die();

return [
  'ctrl' => [
    'label' => 'title',
    'label_alt' => 'bodytext',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'editlock' => 'editlock',
    'title' => 'Battery',
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
    'searchFields' => 'title,bodytext',
    'default_sortby' => 'ORDER BY created DESC',
    'sortby' => 'sorting'
  ],
  'interface' => [
    'showRecordFieldList' => 'title,teaser,bodytext,created'
  ],
  'columns' => [
    'l10n_diffsource' => [
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
    'rowDescription' => [
      'exclude' => true,
      'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.description',
      'config' => [
        'type' => 'text',
        'rows' => 5,
        'cols' => 30
      ]
    ],
    // domain model fields
    'title' => [
      'exclude' => false,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel',
      'config' => [
        'type' => 'input',
        'size' => 60,
        'max' => 255,
        'eval' => 'required'
      ]
    ],
    'teaser' => [
      'exclude' => true,
      'l10n_mode' => 'noCopy',
      'label' => 'Teaser',
      'config' => [
        'type' => 'text',
        'cols' => 60,
        'rows' => 5
      ]
    ],
    'bodytext' => [
      'exclude' => false,
      'l10n_mode' => 'noCopy',
      'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel',
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
    'created' => [
      'exclude' => true,
      'label' => 'Created',
      'config' => [
        'type' => 'input',
        'size' => 16,
        'eval' => 'datetime,required'
      ]
    ],
    'updated' => [
      'exclude' => true,
      'label' => 'Created',
      'config' => [
        'type' => 'input',
        'size' => 16,
        'eval' => 'datetime,required'
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
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'Application',
      'config' => [
        'type' => 'group',
        'internal_type' => 'db',
        'allowed' => 'tx_nano_domain_model_application',
        'MM' => 'tx_nano_domain_model_battery_application_mm',
        'foreign_table' => 'tx_nano_domain_model_application',
        'foreign_table_where' => 'ORDER BY tx_nano_domain_model_application.sorting',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99
      ]
    ],
    'project_group' => [
      'label' => 'LLL:EXT:pim/Resources/Private/Language/locallang_tca.xlf:tx_pim_domain_model_project.project_group',
      'exclude' => 0,
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'fe_groups',
        'size' => '6',
        'minitems' => '1',
      ]
    ],
    'brand' => [
      'label' => 'Brand',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_nano_domain_model_brand',
        'size' => '6',
        'minitems' => '1',
        'maxitems' => '1',
      ]
    ],
    'code' => [
      'label' => 'Code',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required'
      ]
    ],
    'terminal_type' => [],
    'terminal_layout' => [],
    'voltage' => [],
    'technology' => [],
    'capacity_20' => [],
    'capacity_100' => [],
    'cca_en' => [],
    'cca_sae' => [],
    'length' => [],
    'width' => [],
    'height' => [],
    'guarantee' => [],
    'fal_media' => [
      'exclude' => true,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'Media',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('fal_media', [
        'appearance' => [
          'createNewRelationLinkTitle' => 'Add media',
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
      ], $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'])
    ]
  ],
  'types' => [
    // default battery
    '0' => [
      'columnsOverrides' => [
        'bodytext' => [
          'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'teaser' => [
          'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ]
      ],
      'showitem' => 'title,teaser,bodytext'
    ]
  
  ],
  'palettes' => []
];