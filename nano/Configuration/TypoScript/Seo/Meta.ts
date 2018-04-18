###################################################
# SEO (page title, metadata, ...)
###################################################

page.headerData {
	# metatag for responsive HTML
	6 = TEXT
	6.value = <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
}

[globalVar = TSFE:id = {$plugin.detailsPid}]

plugin.tx_seobasics.10 >
plugin.tx_seobasics.10 = RECORDS
plugin.tx_seobasics.10 {
	dontCheckPid = 1
  tables = tx_nano_domain_model_battery
  source.data = GP:tx_nano_pagebatterydetails|battery
  source.intval = 1
  conf.tx_nano_domain_model_battery = TEXT
  conf.tx_nano_domain_model_battery {
  	field = title
    htmlSpecialChars = 1
  }
	wrap = <title>|</title>
	stdWrap.append =< plugin.tx_seobasics.5
}

plugin.tx_seobasics.20 >
plugin.tx_seobasics.20 < plugin.tx_seobasics.10
plugin.tx_seobasics.20.wrap = <meta name="title" content="|" />

plugin.tx_seobasics.30 >
plugin.tx_seobasics.30 = RECORDS
plugin.tx_seobasics.30 {
	dontCheckPid = 1
  tables = tx_nano_domain_model_battery
  source.data = GP:tx_nano_pagebatterydetails|battery
  source.intval = 1
  conf.tx_nano_domain_model_battery = TEXT
  conf.tx_nano_domain_model_battery {
  	field = seo_keywords
  	stdWrap.noTrimWrap = {$plugin.tx_seo.keywordsWrap}
    htmlSpecialChars = 1
  }
	wrap = <meta name="keywords" content="|" />
	stdWrap.append =< plugin.tx_seobasics.5
}

plugin.tx_seobasics.40 >
plugin.tx_seobasics.40 = RECORDS
plugin.tx_seobasics.40 {
	dontCheckPid = 1
  tables = tx_nano_domain_model_battery
  source.data = GP:tx_nano_pagebatterydetails|battery
  source.intval = 1
  conf.tx_nano_domain_model_battery = TEXT
  conf.tx_nano_domain_model_battery {
  	field = seo_description
  	stdWrap.noTrimWrap = {$plugin.tx_seo.descriptionWrap}
    htmlSpecialChars = 1
  }
	wrap = <meta name="description" content="|" />
	stdWrap.append =< plugin.tx_seobasics.5
}

plugin.tx_seobasics.50 >
plugin.tx_seobasics.50 = RECORDS
plugin.tx_seobasics.50 {
	dontCheckPid = 1
  tables = tx_nano_domain_model_battery
  source.data = GP:tx_nano_pagebatterydetails|battery
  source.intval = 1
  conf.tx_nano_domain_model_battery = TEXT
  conf.tx_nano_domain_model_battery {
  	field = tstamp
  	date = Y-m-d
    htmlSpecialChars = 1
  }
	wrap = <meta name="date" content="|" />
	stdWrap.append =< plugin.tx_seobasics.5
}

[global]