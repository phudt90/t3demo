<?php

defined('TYPO3_MODE') || die();

/***************
 * Add Content Element
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types']['clients'])) {
  $GLOBALS['TCA']['tt_content']['types']['clients'] = [];
}

/***************
 * Add content element to selector list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
  'tt_content',
  'CType',
  [
    'LLL:EXT:nano/Resources/Private/Language/backend.xlf:content_element.clients.title',
    'clients',
    'content-bootstrappackage-carousel'
  ],
  'audio',
  'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['clients'] = 'content-bootstrappackage-carousel';

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['clients'] = array_replace_recursive(
  $GLOBALS['TCA']['tt_content']['types']['clients'],
  [
    'showitem' => '
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
      --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
      --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
      tx_nano_client_item,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
          --palette--;;language,
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
          --palette--;;hidden,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
          categories,
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
          rowDescription,
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    '
  ]
);
