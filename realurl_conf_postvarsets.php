<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['postVarSets'] = [
  '_DEFAULT' => [
    'checkout' => [
      [
        'GETvar' => 'tx_nano_pagecheckout[controller]',
        'valueMap' => [
          'Checkout' => '',
        ],
        'noMatch' => 'bypass'
      ],
      [
        'GETvar' => 'tx_nano_pagecheckout[action]',
        'valueMap' => [
          'index' => '',
          'success' => 'thanh-cong'
        ],
        'noMatch' => 'bypass'
      ],
      [
        'GETvar' => 'tx_nano_pagecheckout[hash]'
      ]
    ]
  ]
];