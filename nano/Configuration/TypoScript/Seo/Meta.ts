###################################################
# SEO (page title, metadata, ...)
###################################################

// Disable default page title for specific pages
[globalVar = TSFE:id = {$plugin.listPid}|{$plugin.searchPid}]
config.noPageTitle = 2
[global]

// metatag for responsive HTML
page.headerData.5 = TEXT
page.headerData.5 {
	value = <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
}

page.headerData.20 = TEXT
page.headerData.20 {
	field = title
	noTrimWrap = |<title>|</title>|
}