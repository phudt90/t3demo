<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['fixedPostVars'] = [
  // Battery Details
  'PageBatteryDetailsConfiguration' => [
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
  'PageBatteryListConfiguration' => [
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
  'PageBatterySearchByVehicalConfiguration' => [
    [
      'GETvar' => 'tx_nano_pagebatterysearchbyvehical[controller]',
      'valueMap' => [
        'Battery' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterysearchbyvehical[action]',
      'valueMap' => [
        'search' => '',
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagebatterysearchbyvehical[vbrand]',
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
      'GETvar' => 'tx_nano_pagebatterysearchbyvehical[vmodel]',
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
  'PageCheckoutConfiguration' => [
    [
      'GETvar' => 'tx_nano_pagecheckout[controller]',
      'valueMap' => [
        'Checkout' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_nano_pagecheckout[action]',
      'valueMap' => [
        'index' => '',
        'create' => 'create',
        'success' => 'success'
      ],
    ],
    [
      'GETvar' => 'tx_nano_pagecheckout[hash]',
    ],
  ],
  'PageNews' => [
    [
      'GETvar' => 'tx_news_pi1[controller]',
      'valueMap' => [
        'News' => ''
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_news_pi1[action]',
      'valueMap' => [
        'detail' => '',
      ],
      'noMatch' => 'bypass'
    ],
    [
      'GETvar' => 'tx_news_pi1[news]',
      'lookUpTable' => [
        'table' => 'tx_news_domain_model_news',
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
        'transOrigPointerField' => 'l10n_parent'
      ],
    ],
  ],
  '3' => 'PageBatteryDetailsConfiguration',
  '14' => 'PageBatteryListConfiguration',
  '4' => 'PageBatterySearchByVehicalConfiguration',
  '21' => 'PageCheckoutConfiguration',
  '7' => 'PageNews',
];