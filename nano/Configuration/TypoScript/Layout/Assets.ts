###################################################
# CSS
###################################################

#page.includeCSSLibs {}

page.includeCSS {
	bootstrap = EXT:nano/Resources/Public/Nano/stylesheets/bootstrap.min.css
	main = EXT:nano/Resources/Public/Nano/stylesheets/style.css
	news = EXT:nano/Resources/Public/Nano/stylesheets/news.css
	nano = EXT:nano/Resources/Public/Nano/stylesheets/nano.css
	responsive = EXT:nano/Resources/Public/Nano/stylesheets/responsive.css
}

###################################################
# Javascript
###################################################

#page.includeJSlibs {}

###################################################
# Javascript: footer
###################################################

page.includeJSFooterlibs {
	# core plugins
	jquery = EXT:nano/Resources/Public/Nano/javascript/jquery.min.js
  jquery.forceOnTop = 1
  bootstrap = EXT:bootstrap_package/Resources/Public/JavaScript/Libs/bootstrap.min.js
  
  # additional plugins
  tether = EXT:nano/Resources/Public/Nano/javascript/tether.min.js
}

page.includeJSFooter {
	main = EXT:nano/Resources/Public/Nano/javascript/main.js
}