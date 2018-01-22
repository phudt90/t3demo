site {
	debug = 0
	admPanel = 0
  	realUrl = 1

	compressCss = 1
	concatenateCss = 1
	compressJs = 1
	concatenateJs = 1
}

###################################################
# Production Domains
###################################################

[globalString = IENV:HTTP_HOST = *.acquynano.com]
  site {
    debug = 0
  }
[end]

###################################################
# Localhost
###################################################

[globalString = IENV:HTTP_HOST = *nano.com*]
  site {
    realUrl = 1
    debug = 1
  }
[end]

###################################################
# Do not compress CSS and JS if not connected on the BE
###################################################

[globalVar = TSFE : beUserLogin > 0]
  site {
    compressCss = 0
    concatenateCss = 0
    compressJs = 0
    concatenateJs = 0
  }
[end]

###################################################
# Do not compress CSS and JS if the domain ends up with .prox
# Goal: be able to call the website in reponsive mode on Chrome
# and benefit of LiveReload
###################################################

[globalString = IENV:HTTP_HOST = *local.infosan*.proxy]
  site {
    compressCss = 0
    concatenateCss = 0
    compressJs = 0
    concatenateJs = 0
  }
[end]