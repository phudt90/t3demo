<?php

/**
 * Configure filenames for different pagetypes
 */
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['fileName'] = array(
    // Put ".html" at the end of the URL
    'defaultToHTMLsuffixOnPrev' => 0,
    'index' => array(
        'rss091.xml' => array(
            'keyValues' => array(
                'type' => 101,
            ),
        ),
        'rdf.xml' => array(
            'keyValues' => array(
                'type' => 102,
            ),
        ),
        'atom.xml' => array(
            'keyValues' => array(
                'type' => 103,
            ),
        ),
        'detail.html' => array(
            'keyValues' => array(
                'type' => 1340371658,
            ),
        ),
        'sitemap.xml' => array(
            'keyValues' => array(
                'type' => 1449874941,
            ),
        ),
    ),
);
