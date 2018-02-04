config {
  baseURL >

  // To be able to support both http and https
  absRefPrefix = /
  cache_clearAtMidnight = 1

  // Cache: 1 week
  cache_period = 604800

  concatenateCss = {$site.concatenateCss}
  concatenateJs = {$site.concatenateJs}
  compressJs = {$site.compressJs}
  compressCss = {$site.compressCss}

  debug = {$site.debug}
  admPanel = {$site.admPanel}
  disableCharsetHeader = 0
  disablePrefixComment = 1
  doctype = html5
  enableContentLengthHeader = 1
  extTarget = _blank
  headerComment = {$site.copyright}
  htmlTag_dir =
  htmlTag_langKey = en
  meaningfulTempFilePrefix = 50
  moveJsFromHeaderToFooter = 0
  linkVars = L
  metaCharset = utf-8
  no_cache = 0
  prefixLocalAnchors = all

  // Suppression of the default JS of TYPO3 (performances)
  removeDefaultJS = 1

  renderCharset = utf-8
  sendCacheHeaders = 1
  sendCacheHeaders_onlyWhenLoginDeniedInBranch = 0
  tx_realurl_enable = {$site.realUrl}

  simulateStaticDocuments = 0
  spamProtectEmailAddresses = -2
  spamProtectEmailAddresses_atSubst = (at)
  spamProtectEmailAddresses_lastDotSubst = (dot)
  sys_language_mode = content_fallback
  sys_language_overlay = 1

  // To make the inter-domains links work (on a multi-sites installation)
  typolinkCheckRootline = 1
  xhtml_cleaning = all
  xhtmlDoctype = xhtml_trans
  xmlprologue = none
}

###################################################
# html tag CSS classes
###################################################

config {
  htmlTag_stdWrap {
    setContentToCurrent = 1
    cObject = COA
    cObject {
      temp = TEXT
      temp {
        addParams.class = no-js

        // Tell the search engines that OpenGraph protocol is used
        addParams.prefix = og: http://ogp.me/ns#
        append = TEXT
        append.char = 10
        current = 1
      }

      # < IE7
      10 < .temp
      10.addParams.class = no-js ie6 oldie
      10.wrap = <!--[if lt IE 7 ]>|<![endif]-->

      # IE7
      20 < .temp
      20.addParams.class = no-js ie7 oldie
      20.wrap = <!--[if IE 7 ]>|<![endif]-->

      # IE8
      30 < .temp
      30.addParams.class = no-js ie8 oldie
      30.wrap = <!--[if IE 8 ]>|<![endif]-->

      # IE9
      40 < .temp
      40.addParams.class = no-js ie9
      40.wrap = <!--[if IE 9 ]>|<![endif]-->

      # IE10
      50 < .temp
      50.addParams.class = no-js ie10
      50.wrap = <!--[if IE 10 ]>|<![endif]-->

      # Pas IE ou > IE9
      60 < .temp
      60.wrap = <!--[if (gt IE 9)|!(IE)]><!--> # <!--<![endif]-->
      60.wrap.splitChar = #
    }
  }
}