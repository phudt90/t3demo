<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars'] = [
  // Battery Details
  'batteryDetailsConfiguration' => [
    [
      'GETvar' => 'tx_nano_pagebatterydetails[controller]',
      'valueMap' => [
        'Battery' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterydetails[action]',
      'valueMap' => [
        'details' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterydetails[battery]',
      'lookUpTable' => [
        'table' => 'tx_nano_domain_model_battery',
        'id_field' => 'uid',
        'alias_field' => 'title',
        'addWhereClause' => ' AND NOT deleted',
        'useUniqueCache' => 1,
        'useUniqueCache_conf' => [
          'strtolower' => 1,
          'spaceCharacter' => '-'
        ],
        'languageGetVar' => 'L',
        'languageExceptionUids' => '',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent'
      ]
    ],
  ],
  'batteryListConfiguration' => [
    [
      'GETvar' => 'tx_nano_pagebatterylist[controller]',
      'valueMap' => [
        'Battery' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterylist[action]',
      'valueMap' => [
        'list' => '',
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterylist[application]',
      'lookUpTable' => [
        'table' => 'tx_nano_domain_model_application',
        'id_field' => 'uid',
        'alias_field' => 'title',
        'addWhereClause' => ' AND NOT deleted',
        'useUniqueCache' => 1,
        'useUniqueCache_conf' => [
          'strtolower' => 1,
          'spaceCharacter' => '-'
        ],
        'languageGetVar' => 'L',
        'languageExceptionUids' => '',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent'
      ],
    ],
    [
      'GETvar' => 'tx_nano_pagebatterylist[brand]',
      'lookUpTable' => [
        'table' => 'tx_nano_domain_model_brand',
        'id_field' => 'uid',
        'alias_field' => 'title',
        'addWhereClause' => ' AND NOT deleted',
        'useUniqueCache' => 1,
        'useUniqueCache_conf' => [
          'strtolower' => 1,
          'spaceCharacter' => '-'
        ],
        'languageGetVar' => 'L',
        'languageExceptionUids' => '',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent'
      ],
    ],
  ],
  'batterySearchConfiguration' => [
    [
      'GETvar' => 'tx_nano_pagebatterysearch[controller]',
      'valueMap' => [
        'Battery' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterysearch[action]',
      'valueMap' => [
        'search' => '',
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterysearch[vbrand]',
      'lookUpTable' => [
        'table' => 'tx_nano_domain_model_vbrand',
        'id_field' => 'uid',
        'alias_field' => 'title',
        'addWhereClause' => ' AND NOT deleted',
        'useUniqueCache' => 1,
        'useUniqueCache_conf' => [
          'strtolower' => 1,
          'spaceCharacter' => '-'
        ],
        'languageGetVar' => 'L',
        'languageExceptionUids' => '',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent'
      ],
    ],
    [
      'GETvar' => 'tx_nano_pagebatterysearch[vmodel]',
      'lookUpTable' => [
        'table' => 'tx_nano_domain_model_vmodel',
        'id_field' => 'uid',
        'alias_field' => 'title',
        'addWhereClause' => ' AND NOT deleted',
        'useUniqueCache' => 1,
        'useUniqueCache_conf' => [
          'strtolower' => 1,
          'spaceCharacter' => '-'
        ],
        'languageGetVar' => 'L',
        'languageExceptionUids' => '',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent'
      ],
    ],
  ],
  
  '3' => 'batteryDetailsConfiguration',
  '14' => 'batteryListConfiguration',
  '4' => 'batterySearchConfiguration',
];