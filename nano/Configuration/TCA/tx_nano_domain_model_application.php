<?php
defined('TYPO3_MODE') or die();

return [
  'ctrl' => [
    'title' => 'Loại ắc quy',
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
    'showRecordFieldList' => 'title,bodytext,created'
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
    'bodytext' => [
      'exclude' => false,
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
  ],
  'types' => [
    '0' => [
      'columnsOverrides' => [
        'bodytext' => [
          'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
      ],
      'showitem' => 'title,bodytext'
    ]
    
  ],
  'palettes' => []
];