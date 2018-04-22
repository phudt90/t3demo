mod.web_list.tableDisplayOrder {
	tx_nano_domain_model_battery {
		before = sys_category
	}
	tx_powermail_domain_model_mail {
    before = tt_content, tx_powermail_domain_answer 
	}
}