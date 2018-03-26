site {
	debug = 0
	admPanel = 0
	realUrl = 1

	compressCss = 1
	concatenateCss = 1
	compressJs = 1
	concatenateJs = 1
	
	info {
		phone = 0903 377 985
	}
}

###################################################
# Production Domains
###################################################

[globalString = IENV:HTTP_HOST = *.com]
  site {
    debug = 0
    admPanel = 0
    compressCss = 1
		concatenateCss = 1
		compressJs = 1
		concatenateJs = 1
  }
[end]

###################################################
# Localhost
###################################################

[globalString = IENV:HTTP_HOST = *.local]
  site {
    debug = 1
    compressCss = 0
		concatenateCss = 0
		compressJs = 0
		concatenateJs = 0
  }
[end]