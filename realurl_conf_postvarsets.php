<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['postVarSets'] = [
  '_DEFAULT' => [
    /* 'checkout' => [
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
    ], */
    'controller' => [
      [
        'GETvar' => 'tx_nano_pagebatterylist[action]',
        'noMatch' => 'bypass'
      ],
      [
        'GETvar' => 'tx_nano_pagebatterylist[controller]',
        'noMatch' => 'bypass'
      ]
    ],
    'page' => [
      [
        'GETvar' => 'tx_nano_pagebatterylist[@widget_0][currentPage]',
        //'noMatch' => 'bypass'
      ],
    ]
  ]
];