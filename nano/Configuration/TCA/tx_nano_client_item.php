<?php

return [
  'ctrl' => [
    'label' => 'nav_title',
    'sortby' => 'sorting',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'title' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item',
    'delete' => 'deleted',
    'versioningWS' => true,
    'origUid' => 't3_origuid',
    'hideTable' => true,
    'hideAtCopy' => true,
    'prependAtCopy' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'languageField' => 'sys_language_uid',
    'enablecolumns' => [
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ],
    'typeicon_classes' => [
      'default' => 'content-bootstrappackage-carousel-item',
    ]
  ],
  'interface' => [
    'showRecordFieldList' => 'hidden, tt_content, image',
  ],
  'types' => [
    '0' => [
      'showitem' => '
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
        image,
        nav_title,        
        link,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --palette--;;hiddenLanguagePalette,
      '
    ],
  ],
  'palettes' => [
    'access' => [
      'showitem' => '
        starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
        endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
      '
    ],
    'general' => [
      'showitem' => 'tt_content'
    ],
    'visibility' => [
      'showitem' => 'hidden;LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item'
    ],
    // hidden but needs to be included all the time, so sys_language_uid is set correctly
    'hiddenLanguagePalette' => [
      'showitem' => 'sys_language_uid, l10n_parent',
      'isHiddenPalette' => true,
    ],
  ],
  'columns' => [
    'tt_content' => [
      'exclude' => true,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item.tt_content',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tt_content',
        'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.CType IN ("clients")',
        'maxitems' => 1,
        'default' => 0,
      ],
    ],
    'hidden' => [
      'exclude' => true,
      'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
      'config' => [
        'type' => 'check',
        'items' => [
          '1' => [
            '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0'
          ]
        ]
      ]
    ],
    'starttime' => [
      'exclude' => true,
      'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
      'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'eval' => 'datetime',
        'default' => 0
      ],
      'l10n_mode' => 'exclude',
      'l10n_display' => 'defaultAsReadonly'
    ],
    'endtime' => [
      'exclude' => true,
      'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
      'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'eval' => 'datetime',
        'default' => 0,
        'range' => [
          'upper' => mktime(0, 0, 0, 1, 1, 2038)
        ]
      ],
      'l10n_mode' => 'exclude',
      'l10n_display' => 'defaultAsReadonly'
    ],
    'sys_language_uid' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'items' => [
          [
            'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
            -1
          ],
          [
            'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.default_value',
            0
          ]
        ],
        'allowNonIdValues' => true,
      ]
    ],
    'l10n_parent' => [
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          [
            '',
            0
          ]
        ],
        'foreign_table' => 'tx_nano_client_item',
        'foreign_table_where' => 'AND tx_nano_client_item.pid=###CURRENT_PID### AND tx_nano_client_item.sys_language_uid IN (-1,0)',
        'default' => 0
      ]
    ],
    'l10n_diffsource' => [
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    'header' => [
      'exclude' => true,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item.header',
      'config' => [
        'type' => 'input',
        'size' => 50,
        'eval' => 'trim,required'
      ],
    ],
    'link' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item.link',
      'config' => [
        'type' => 'input',
        'renderType' => 'inputLink',
        'size' => 50,
        'max' => 1024,
        'eval' => 'trim',
        'fieldControl' => [
          'linkPopup' => [
            'options' => [
              'title' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item.link',
            ],
          ],
        ],
        'softref' => 'typolink'
      ],
    ],
    'nav_title' => [
      'exclude' => true,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item.nav_title',
      'config' => [
        'type' => 'input',
        'size' => 50,
        'eval' => 'trim'
      ],
    ],
    'image' => [
      'exclude' => true,
      'label' => 'LLL:EXT:nano/Resources/Private/Language/backend.xlf:client_item.image',
      'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'image',
        [
          'appearance' => [
            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
          ],
          'overrideChildTca' => [
            'types' => [
              \TYPO3\CMS\Core\Resource\File::FILETYPE_UNKNOWN => [
                'showitem' => '
                                    --palette--;;filePalette
                                '
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                'showitem' => '
                                    --palette--;;filePalette
                                '
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                'showitem' => '
                                    title,
                                    alternative,
                                    crop,
                                    --palette--;;filePalette
                                '
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                'showitem' => '
                                    --palette--;;filePalette
                                '
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                'showitem' => '
                                    --palette--;;filePalette
                                '
              ],
              \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                'showitem' => '
                                    --palette--;;filePalette
                                '
              ],
            ],
          ],
          'minitems' => 0,
          'maxitems' => 1,
        ],
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
      ),
    ],
  ],
];
