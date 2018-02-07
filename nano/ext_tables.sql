#
# Table structure for table 'tx_nano_domain_model_battery'
#
CREATE TABLE tx_nano_domain_model_battery (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	editlock tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,	
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob,
	l10n_source int(11) DEFAULT '0' NOT NULL,
	rowDescription text,

	title varchar(255) NOT NULL DEFAULT '',
	teaser text,
	bodytext mediumtext,
	created int(11) DEFAULT '0' NOT NULL,
	updated int(11) DEFAULT '0' NOT NULL,
	seo_title varchar(255) NOT NULL DEFAULT '',
	seo_keywords text,
	seo_description text,
	
	applications int(11) DEFAULT '0' NOT NULL,
	brand int(11) DEFAULT '0' NOT NULL,
	code varchar(32) DEFAULT '' NOT NULL,
	terminal_type tinyint(1) DEFAULT '0' NOT NULL,
	terminal_layout tinyint(1) DEFAULT '0' NOT NULL,
	voltage int(4) DEFAULT '0' NOT NULL,
	technology varchar(32) DEFAULT '' NOT NULL,
	capacity_20 int(4) DEFAULT '0' NOT NULL,
	capacity_100 int(4) DEFAULT '0' NOT NULL,
	cca_en int(4) DEFAULT '0' NOT NULL,
	cca_sae int(4) DEFAULT '0' NOT NULL,
	length int(4) DEFAULT '0' NOT NULL,
	width int(4) DEFAULT '0' NOT NULL,
	height int(4) DEFAULT '0' NOT NULL,
	guarantee tinyint(1) DEFAULT '0' NOT NULL,
	media text,
	fal_media int(11) unsigned DEFAULT '0',
	
	PRIMARY KEY (uid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY parent (pid,sorting),
	KEY language (l18n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_nano_domain_model_application'
#
CREATE TABLE tx_nano_domain_model_application (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	editlock tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,	
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob,
	l10n_source int(11) DEFAULT '0' NOT NULL,
	
	title varchar(255) NOT NULL DEFAULT '',
	bodytext mediumtext,
	created int(11) DEFAULT '0' NOT NULL,
	updated int(11) DEFAULT '0' NOT NULL,
	seo_title varchar(255) NOT NULL DEFAULT '',
	seo_description text,

	PRIMARY KEY (uid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY parent (pid,sorting),
	KEY language (l18n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_nano_domain_model_brand'
#
CREATE TABLE tx_nano_domain_model_brand (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	editlock tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,	
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob,
	l10n_source int(11) DEFAULT '0' NOT NULL,
	
	title varchar(255) NOT NULL DEFAULT '',
	bodytext mediumtext,
	created int(11) DEFAULT '0' NOT NULL,
	updated int(11) DEFAULT '0' NOT NULL,	
	seo_title varchar(255) NOT NULL DEFAULT '',
	seo_description text,

	PRIMARY KEY (uid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY parent (pid,sorting),
	KEY language (l18n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_nano_domain_model_vbrand'
#
CREATE TABLE tx_nano_domain_model_vbrand (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	editlock tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,	
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob,
	l10n_source int(11) DEFAULT '0' NOT NULL,
	
	title varchar(255) NOT NULL DEFAULT '',
	bodytext mediumtext,
	created int(11) DEFAULT '0' NOT NULL,
	updated int(11) DEFAULT '0' NOT NULL,	
	seo_title varchar(255) NOT NULL DEFAULT '',
	seo_description text,
	vmodels int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY parent (pid,sorting),
	KEY language (l18n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_nano_domain_model_vmodel'
#
CREATE TABLE tx_nano_domain_model_vmodel (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	editlock tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,	
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob,
	l10n_source int(11) DEFAULT '0' NOT NULL,
	
	title varchar(255) NOT NULL DEFAULT '',
	bodytext mediumtext,
	vbrand int(11) DEFAULT '0' NOT NULL,
	created int(11) DEFAULT '0' NOT NULL,
	updated int(11) DEFAULT '0' NOT NULL,	
	seo_title varchar(255) NOT NULL DEFAULT '',
	seo_description text,

	PRIMARY KEY (uid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY parent (pid,sorting),
	KEY language (l18n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_nano_domain_model_battery_application_mm'
#
CREATE TABLE tx_nano_domain_model_battery_application_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);