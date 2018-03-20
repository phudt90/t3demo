<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = [];
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT'] = [
  'init' => [
    'enableCHashCache' => 1,
    /**
     * disable enableUrlDecodeCache for multiple domains
     * as no root pid is caught and the system check to
     * see if correct page path is grabbed
     */
    'enableUrlDecodeCache' => 0,
    'enableUrlEncodeCache' => 0,
    'appendMissingSlash' => 'ifNotFile',
    'respectSimulateStaticURLs' => 0,
    'postVarSet_failureMode' => ''  
  ],
  'redirects' => [],
  'preVars' => [
    // Languages
    [
      'GETvar' => 'L',
      'valueMap' => [
        'vi' => '0',
      ],
      'noMatch' => 'bypass'
    ],
    // No cache
    [
      'GETvar' => 'no_cache',
      'valueMap' => [
        'no_cache' => 1
      ],
      'noMatch' => 'bypass'
    ]
  ],
  'pagePath' => [
    'type' => 'user',
    'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
    'spaceCharacter' => '-',
    'languageGetVar' => 'L',
    'rootpage_id' => 1,
    'disablePathCache' => 0,
    'expireDays' => 7,
    'segTitleFieldList' => 'tx_realurl_pathsegment,alias,nav_title,title',
    'excludePageIds' => null
  ]
];

include(__DIR__ . '/realurl_conf_fixedpostvars.php');
#include(__DIR__ . '/realurl_conf_postvarsets.php');
#include(__DIR__ . '/realurl_conf_filename.php');
