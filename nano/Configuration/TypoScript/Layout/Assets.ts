###################################################
# CSS
###################################################

#page.includeCSSLibs {}

page.includeCSS {
	bootstrap = EXT:nano/Resources/Public/Nano/stylesheets/bootstrap.min.css
	main = EXT:nano/Resources/Public/Nano/stylesheets/style.css
	nano = EXT:nano/Resources/Public/Nano/stylesheets/nano.css
	responsive = EXT:nano/Resources/Public/Nano/stylesheets/responsive.css
}

###################################################
# Javascript: header
###################################################

#page.includeJSlibs {}

###################################################
# Javascript: footer
###################################################

page.includeJSFooterlibs {
	jquery = EXT:nano/Resources/Public/Nano/javascript/jquery.min.js
  jquery.forceOnTop = 1
  tether = EXT:nano/Resources/Public/Nano/javascript/tether.min.js
  waypoints = EXT:nano/Resources/Public/Nano/javascript/waypoints.min.js
  circlechart = EXT:nano/Resources/Public/Nano/javascript/jquery.circlechart.js
  easing = EXT:nano/Resources/Public/Nano/javascript/easing.js
  zoom = EXT:nano/Resources/Public/Nano/javascript/jquery.zoom.min.js
  jqueryUI = EXT:nano/Resources/Public/Nano/javascript/jquery-ui.js
  mCustomScrollbar = EXT:nano/Resources/Public/Nano/javascript/jquery.mCustomScrollbar.js
  waves = EXT:nano/Resources/Public/Nano/javascript/waves.min.js
  
  flexslider = EXT:nano/Resources/Public/Nano/javascript/jquery.flexslider-min.js
}

page.includeJSFooter {
	main = EXT:nano/Resources/Public/Nano/javascript/main.js
}