<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array(
  '_DEFAULT' => array(
    'init' => array(
      'appendMissingSlash' => 'ifNotFile,redirect',
      'emptyUrlReturnValue' => '/'
    ),
    'pagePath' => array(
      'rootpage_id' => '1'
    ),
    'fileName' => array(
      'defaultToHTMLsuffixOnPrev' => 0,
      'acceptHTMLsuffix' => 1,
      'index' => array(
        'print' => array(
          'keyValues' => array(
            'type' => 98
          )
        )
      )
    ),
    'postVarSets' => array(
      '_DEFAULT' => array(
        'news' => array(
          0 => array(
            'GETvar' => 'tx_news_pi1[news]',
            'lookUpTable' => array(
              'table' => 'tx_news_domain_model_news',
              'id_field' => 'uid',
              'alias_field' => 'title',
              'useUniqueCache' => 1,
              'useUniqueCache_conf' => array(
                'strtolower' => 1,
                'spaceCharacter' => '-'
              )
            )
          )
        )
      )
    )
  )
);
