<?php

function andar_field_list(){
	$andar_field_array = array(
        array(
			'label' => esc_html__('EnvelopeMaster.ENVELOPETYPE', 'gftoandar'),
			'value' => 'EnvelopeMaster.ENVELOPETYPE'
		),
        array(
			'label' => esc_html__('EnvelopeMaster.FUNDRAISINGACCOUNT', 'gftoandar'),
			'value' => 'EnvelopeMaster.FUNDRAISINGACCOUNT'
		),
        array(
			'label' => esc_html__('EnvelopeMaster.MASTERACCOUNTNUMBER', 'gftoandar'),
			'value' => 'EnvelopeMaster.MASTERACCOUNTNUMBER'
		),
        array(
			'label' => esc_html__('EnvelopeMaster.PROCESSINGACCOUNT', 'gftoandar'),
			'value' => 'EnvelopeMaster.PROCESSINGACCOUNT'
		),        
		array(
			'label' => esc_html__('Individuals.ACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.ACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.ACCOUNTSTATUS', 'gftoandar'),
			'value' => 'Individuals.ACCOUNTSTATUS'
		),
		array(
			'label' => esc_html__('Individuals.ACKNOWLEDGEMENTFLAG', 'gftoandar'),
			'value' => 'Individuals.ACKNOWLEDGEMENTFLAG'
		),
		array(
			'label' => esc_html__('Individuals.ANONYMOUSFLAG', 'gftoandar'),
			'value' => 'Individuals.ANONYMOUSFLAG'
		),
		array(
			'label' => esc_html__('Individuals.DONOTMERGE', 'gftoandar'),
			'value' => 'Individuals.DONOTMERGE'
		),
		array(
			'label' => esc_html__('Individuals.EXTACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.EXTACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.FIRSTNAME', 'gftoandar'),
			'value' => 'Individuals.FIRSTNAME'
		),
		array(
			'label' => esc_html__('Individuals.LASTNAME', 'gftoandar'),
			'value' => 'Individuals.LASTNAME'
		),
		array(
			'label' => esc_html__('Individuals.MIDDLENAME', 'gftoandar'),
			'value' => 'Individuals.MIDDLENAME'
		),
		array(
			'label' => esc_html__('Individuals.PREFIX', 'gftoandar'),
			'value' => 'Individuals.PREFIX'
		),
		array(
			'label' => esc_html__('Individuals.PUBLISHFLAG', 'gftoandar'),
			'value' => 'Individuals.PUBLISHFLAG'
		),
		array(
			'label' => esc_html__('Individuals.RELEASEADDRESS', 'gftoandar'),
			'value' => 'Individuals.RELEASEADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.RELEASEAMOUNT', 'gftoandar'),
			'value' => 'Individuals.RELEASEAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.RELEASEEMAIL', 'gftoandar'),
			'value' => 'Individuals.RELEASEEMAIL'
		),
		array(
			'label' => esc_html__('Individuals.RELEASEFLAG', 'gftoandar'),
			'value' => 'Individuals.RELEASEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.SEX', 'gftoandar'),
			'value' => 'Individuals.SEX'
		),
		array(
			'label' => esc_html__('Individuals.SFSYNC', 'gftoandar'),
			'value' => 'Individuals.SFSYNC'
		),
		array(
			'label' => esc_html__('Individuals.SSN', 'gftoandar'),
			'value' => 'Individuals.SSN'
		),
		array(
			'label' => esc_html__('Individuals.SUFFIX', 'gftoandar'),
			'value' => 'Individuals.SUFFIX'
		),
		array(
			'label' => esc_html__('Individuals.WEBLANGUAGE', 'gftoandar'),
			'value' => 'Individuals.WEBLANGUAGE'
		),
		array(
			'label' => esc_html__('Individuals.WEBLANGUAGESOURCE', 'gftoandar'),
			'value' => 'Individuals.WEBLANGUAGESOURCE'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.COMMENTTEXT', 'gftoandar'),
			'value' => 'Individuals.AccountDates.COMMENTTEXT'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATECATEGORY', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATECATEGORY'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEDAY', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEDAY'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEFRI', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEFRI'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEMON', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEMON'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEMONTH', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEMONTH'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATESAT', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATESAT'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATESUN', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATESUN'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATETHR', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATETHR'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATETUE', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATETUE'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATETYPE', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATETYPE'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEWED', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEWED'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEWEEKNUMBER', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEWEEKNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.DATEYEAR', 'gftoandar'),
			'value' => 'Individuals.AccountDates.DATEYEAR'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.AccountDates.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.AccountDates.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.INFOSOURCE', 'gftoandar'),
			'value' => 'Individuals.AccountDates.INFOSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.AccountDates.SPECIFICTIME', 'gftoandar'),
			'value' => 'Individuals.AccountDates.SPECIFICTIME'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ADDRESSLINE1', 'gftoandar'),
			'value' => 'Individuals.Addresses.ADDRESSLINE1'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ADDRESSLINE2', 'gftoandar'),
			'value' => 'Individuals.Addresses.ADDRESSLINE2'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ADDRESSLINE3', 'gftoandar'),
			'value' => 'Individuals.Addresses.ADDRESSLINE3'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ADDRESSLINE4', 'gftoandar'),
			'value' => 'Individuals.Addresses.ADDRESSLINE4'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ADDRESSTYPE', 'gftoandar'),
			'value' => 'Individuals.Addresses.ADDRESSTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ATBUSLINE', 'gftoandar'),
			'value' => 'Individuals.Addresses.ATBUSLINE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ATSUBWAYLINE', 'gftoandar'),
			'value' => 'Individuals.Addresses.ATSUBWAYLINE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.CITY', 'gftoandar'),
			'value' => 'Individuals.Addresses.CITY'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.COUNTRYCODE', 'gftoandar'),
			'value' => 'Individuals.Addresses.COUNTRYCODE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.COUNTY', 'gftoandar'),
			'value' => 'Individuals.Addresses.COUNTY'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.FROMDATE', 'gftoandar'),
			'value' => 'Individuals.Addresses.FROMDATE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.NEIGHBORHOOD', 'gftoandar'),
			'value' => 'Individuals.Addresses.NEIGHBORHOOD'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.STATEORPROV', 'gftoandar'),
			'value' => 'Individuals.Addresses.STATEORPROV'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.TODATE', 'gftoandar'),
			'value' => 'Individuals.Addresses.TODATE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ZIPPOSTALCODE', 'gftoandar'),
			'value' => 'Individuals.Addresses.ZIPPOSTALCODE'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.ACCOUNTNUMBERA', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.ACCOUNTNUMBERA'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.AFFILIATIONTYPE', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.AFFILIATIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.COMMENTTEXT', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.COMMENTTEXT'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.STATUS', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.STATUS'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.TITLE1', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.TITLE1'
		),
		array(
			'label' => esc_html__('Individuals.AffiliationRelationships.TITLECODE', 'gftoandar'),
			'value' => 'Individuals.AffiliationRelationships.TITLECODE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.ACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Analytics.ACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.AIRPLANEOWNER', 'gftoandar'),
			'value' => 'Individuals.Analytics.AIRPLANEOWNER'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.ANNUALFUNDRTG', 'gftoandar'),
			'value' => 'Individuals.Analytics.ANNUALFUNDRTG'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.ASATDATE', 'gftoandar'),
			'value' => 'Individuals.Analytics.ASATDATE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.ASATTIME', 'gftoandar'),
			'value' => 'Individuals.Analytics.ASATTIME'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.ASSESSED', 'gftoandar'),
			'value' => 'Individuals.Analytics.ASSESSED'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.BOATOWNER', 'gftoandar'),
			'value' => 'Individuals.Analytics.BOATOWNER'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.CAPACITYRANGE', 'gftoandar'),
			'value' => 'Individuals.Analytics.CAPACITYRANGE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.CORPTCH', 'gftoandar'),
			'value' => 'Individuals.Analytics.CORPTCH'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.DBAFFILIATION', 'gftoandar'),
			'value' => 'Individuals.Analytics.DBAFFILIATION'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.DBREVENUE', 'gftoandar'),
			'value' => 'Individuals.Analytics.DBREVENUE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.DSRATING', 'gftoandar'),
			'value' => 'Individuals.Analytics.DSRATING'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.FAAPILOT', 'gftoandar'),
			'value' => 'Individuals.Analytics.FAAPILOT'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.FECCOUNT', 'gftoandar'),
			'value' => 'Individuals.Analytics.FECCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.FECTOTAL', 'gftoandar'),
			'value' => 'Individuals.Analytics.FECTOTAL'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.FNDBOARD', 'gftoandar'),
			'value' => 'Individuals.Analytics.FNDBOARD'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.GSBOARD', 'gftoandar'),
			'value' => 'Individuals.Analytics.GSBOARD'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.HOUSEHOLDINCOME', 'gftoandar'),
			'value' => 'Individuals.Analytics.HOUSEHOLDINCOME'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.INDHOLDING', 'gftoandar'),
			'value' => 'Individuals.Analytics.INDHOLDING'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.IRS990PF', 'gftoandar'),
			'value' => 'Individuals.Analytics.IRS990PF'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.LGGIFTHIGH', 'gftoandar'),
			'value' => 'Individuals.Analytics.LGGIFTHIGH'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.LGGIFTLOW', 'gftoandar'),
			'value' => 'Individuals.Analytics.LGGIFTLOW'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.MAJORGIFTRTG', 'gftoandar'),
			'value' => 'Individuals.Analytics.MAJORGIFTRTG'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.MATCHQUALITY', 'gftoandar'),
			'value' => 'Individuals.Analytics.MATCHQUALITY'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.MGCOMP', 'gftoandar'),
			'value' => 'Individuals.Analytics.MGCOMP'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.MGOPTION', 'gftoandar'),
			'value' => 'Individuals.Analytics.MGOPTION'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.MGPROFILE', 'gftoandar'),
			'value' => 'Individuals.Analytics.MGPROFILE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.NBRGIFTMATCHES', 'gftoandar'),
			'value' => 'Individuals.Analytics.NBRGIFTMATCHES'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.NBROFPROP', 'gftoandar'),
			'value' => 'Individuals.Analytics.NBROFPROP'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.PENSIONADMIN', 'gftoandar'),
			'value' => 'Individuals.Analytics.PENSIONADMIN'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.PENSIONASST', 'gftoandar'),
			'value' => 'Individuals.Analytics.PENSIONASST'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.PGID', 'gftoandar'),
			'value' => 'Individuals.Analytics.PGID'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.PROFILE', 'gftoandar'),
			'value' => 'Individuals.Analytics.PROFILE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.REALESTATEEST', 'gftoandar'),
			'value' => 'Individuals.Analytics.REALESTATEEST'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.REALESTATETRST', 'gftoandar'),
			'value' => 'Individuals.Analytics.REALESTATETRST'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.RMFTOTAL', 'gftoandar'),
			'value' => 'Individuals.Analytics.RMFTOTAL'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.SECHOLDINGS', 'gftoandar'),
			'value' => 'Individuals.Analytics.SECHOLDINGS'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.SECINSIDER', 'gftoandar'),
			'value' => 'Individuals.Analytics.SECINSIDER'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.SUBMITDATE', 'gftoandar'),
			'value' => 'Individuals.Analytics.SUBMITDATE'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.SUBMITTIME', 'gftoandar'),
			'value' => 'Individuals.Analytics.SUBMITTIME'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.TOTALLIKELYMATCHES', 'gftoandar'),
			'value' => 'Individuals.Analytics.TOTALLIKELYMATCHES'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.VENDOR', 'gftoandar'),
			'value' => 'Individuals.Analytics.VENDOR'
		),
		array(
			'label' => esc_html__('Individuals.Analytics.VENDORID', 'gftoandar'),
			'value' => 'Individuals.Analytics.VENDORID'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.CONTACTTYPE', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.CONTACTTYPE'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.INFLUENCERATING', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.INFLUENCERATING'
		),
		array(
			'label' => esc_html__('Individuals.ContactRelationships.ROLE', 'gftoandar'),
			'value' => 'Individuals.ContactRelationships.ROLE'
		),
		array(
			'label' => esc_html__('Individuals.CorrespondencePref.CORRESPONDENCETYPE', 'gftoandar'),
			'value' => 'Individuals.CorrespondencePref.CORRESPONDENCETYPE'
		),
		array(
			'label' => esc_html__('Individuals.CorrespondencePref.EMPLOYERFLAG', 'gftoandar'),
			'value' => 'Individuals.CorrespondencePref.EMPLOYERFLAG'
		),
		array(
			'label' => esc_html__('Individuals.CorrespondencePref.PREFEREMPLOYER', 'gftoandar'),
			'value' => 'Individuals.CorrespondencePref.PREFEREMPLOYER'
		),
		array(
			'label' => esc_html__('Individuals.CorrespondencePref.PREFERENCEAREA', 'gftoandar'),
			'value' => 'Individuals.CorrespondencePref.PREFERENCEAREA'
		),
		array(
			'label' => esc_html__('Individuals.CorrespondencePref.PREFERTYPE', 'gftoandar'),
			'value' => 'Individuals.CorrespondencePref.PREFERTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Demographics.DEMOGRAPHICTYPE', 'gftoandar'),
			'value' => 'Individuals.Demographics.DEMOGRAPHICTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Demographics.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.Demographics.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.Demographics.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Demographics.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.CATEGORY', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.CATEGORY'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.COMMENTTEXT', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.COMMENTTEXT'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.DNCTYPE', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.DNCTYPE'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.EMPLOYEEFLAG', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.EMPLOYEEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.INFOSOURCE', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.INFOSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN0', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN0'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN1', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN1'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN10', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN10'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN11', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN11'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN2', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN2'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN3', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN3'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN4', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN4'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN5', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN5'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN6', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN6'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN7', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN7'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN8', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN8'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTIN9', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTIN9'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT0', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT0'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT1', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT1'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT10', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT10'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT11', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT11'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT2', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT2'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT3', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT3'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT4', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT4'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT5', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT5'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT6', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT6'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT7', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT7'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT8', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT8'
		),
		array(
			'label' => esc_html__('Individuals.DNCCategories.OPTOUT9', 'gftoandar'),
			'value' => 'Individuals.DNCCategories.OPTOUT9'
		),
		array(
			'label' => esc_html__('Individuals.EMails.EMAILADDRESS', 'gftoandar'),
			'value' => 'Individuals.EMails.EMAILADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.EMails.EMAILTYPE', 'gftoandar'),
			'value' => 'Individuals.EMails.EMAILTYPE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.CARDVALUE', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.CARDVALUE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.EXTERNALGOAL', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.EXTERNALGOAL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.GOAL', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.GOAL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.MASTERACCOUNT', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.MASTERACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.PROJECTEDADDITIONAL', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.PROJECTEDADDITIONAL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.PROJECTEDFINAL', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.PROJECTEDFINAL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.STRETCHGOAL', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.STRETCHGOAL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeGoals.VERBAL', 'gftoandar'),
			'value' => 'Individuals.EmployeeGoals.VERBAL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.DEPARTMENT', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.DEPARTMENT'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPCLASSA1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPCLASSA1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPCLASSA2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPCLASSA2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPCLASSB1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPCLASSB1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPCLASSB2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPCLASSB2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPDISTCOUNTRY', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPDISTCOUNTRY'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPDISTZIP', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPDISTZIP'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPFUNDCOUNTRY', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPFUNDCOUNTRY'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPFUNDRAISINGZIP', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPFUNDRAISINGZIP'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPLOYEEID', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPLOYEEID'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPLOYEETYPE', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPLOYEETYPE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPLYGIFT', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPLYGIFT'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPOTHERINCOME', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPOTHERINCOME'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPPERHOUR', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPPERHOUR'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPSALARY', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPSALARY'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPSUGGIFT', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPSUGGIFT'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPSUGGIFT2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPSUGGIFT2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPSUGGIFT3', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPSUGGIFT3'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPSUGGIFT4', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPSUGGIFT4'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EMPSUGGIFT5', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EMPSUGGIFT5'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.INCOMELEVEL', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.INCOMELEVEL'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.JOBTITLE1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.JOBTITLE1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.JOBTITLE2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.JOBTITLE2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.LBNUMBER', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.LBNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.MAILDROP', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.MAILDROP'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.MINBILLSTARTDATE', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.MINBILLSTARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.MINPAYROLLSTARTDATE', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.MINPAYROLLSTARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.NBRPAYPERIODS', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.NBRPAYPERIODS'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.PREFEMPLOYER', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.PREFEMPLOYER'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD3', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD3'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD4', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD4'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD5', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD5'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD6', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD6'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD7', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD7'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD8', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD8'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.RPTSORTFIELD9', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.RPTSORTFIELD9'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.SORTFIELD1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.SORTFIELD1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.SORTFIELD2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.SORTFIELD2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.SORTFIELD3', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.SORTFIELD3'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.SORTFIELD4', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.SORTFIELD4'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.SORTFIELD5', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.SORTFIELD5'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED10', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED10'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED3', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED3'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED4', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED4'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED5', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED5'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED6', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED6'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED7', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED7'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED8', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED8'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINED9', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINED9'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT1', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT1'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT10', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT10'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT2', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT2'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT3', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT3'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT4', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT4'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT5', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT5'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT6', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT6'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT7', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT7'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT8', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT8'
		),
		array(
			'label' => esc_html__('Individuals.EmployeeRelationships.USERDEFINEDAMOUNT9', 'gftoandar'),
			'value' => 'Individuals.EmployeeRelationships.USERDEFINEDAMOUNT9'
		),
        array(
			'label' => esc_html__('Individuals.EnvelopeMaster.ENVELOPETYPE', 'gftoandar'),
			'value' => 'Individuals.EnvelopeMaster.ENVELOPETYPE'
		),
//		array(
//			'label' => esc_html__('Individuals.Envelopes.EnvelopeType', 'gftoandar'),
//			'value' => 'Individuals.Envelopes.EnvelopeType'
//		),        
		array(
			'label' => esc_html__('Individuals.InterestRating.INTEREST', 'gftoandar'),
			'value' => 'Individuals.InterestRating.INTEREST'
		),
		array(
			'label' => esc_html__('Individuals.InterestRating.RATING', 'gftoandar'),
			'value' => 'Individuals.InterestRating.RATING'
		),
		array(
			'label' => esc_html__('Individuals.InterestRating.SOURCE', 'gftoandar'),
			'value' => 'Individuals.InterestRating.SOURCE'
		),
		array(
			'label' => esc_html__('Individuals.InterestRating.YEAR', 'gftoandar'),
			'value' => 'Individuals.InterestRating.YEAR'
		),
		array(
			'label' => esc_html__('Individuals.LSIndiv.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.LSIndiv.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.LSIndiv.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.LSIndiv.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.LSIndiv.OVERRIDELEVEL', 'gftoandar'),
			'value' => 'Individuals.LSIndiv.OVERRIDELEVEL'
		),
		array(
			'label' => esc_html__('Individuals.Names.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.Names.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.Names.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Names.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Names.NAME1', 'gftoandar'),
			'value' => 'Individuals.Names.NAME1'
		),
		array(
			'label' => esc_html__('Individuals.Names.NAME2', 'gftoandar'),
			'value' => 'Individuals.Names.NAME2'
		),
		array(
			'label' => esc_html__('Individuals.Names.NAMETYPE', 'gftoandar'),
			'value' => 'Individuals.Names.NAMETYPE'
		),
		array(
			'label' => esc_html__('Individuals.NumericalInformation.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.NumericalInformation.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.NumericalInformation.COMMENTTEXT', 'gftoandar'),
			'value' => 'Individuals.NumericalInformation.COMMENTTEXT'
		),
		array(
			'label' => esc_html__('Individuals.NumericalInformation.INFOSOURCE', 'gftoandar'),
			'value' => 'Individuals.NumericalInformation.INFOSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.NumericalInformation.NUMERICALDATA', 'gftoandar'),
			'value' => 'Individuals.NumericalInformation.NUMERICALDATA'
		),
		array(
			'label' => esc_html__('Individuals.NumericalInformation.NUMERICALDATATYPE', 'gftoandar'),
			'value' => 'Individuals.NumericalInformation.NUMERICALDATATYPE'
		),
		array(
			'label' => esc_html__('Individuals.PhoneNumbers.AREACODE', 'gftoandar'),
			'value' => 'Individuals.PhoneNumbers.AREACODE'
		),
		array(
			'label' => esc_html__('Individuals.PhoneNumbers.EXTENSION', 'gftoandar'),
			'value' => 'Individuals.PhoneNumbers.EXTENSION'
		),
		array(
			'label' => esc_html__('Individuals.PhoneNumbers.PHONENUMBER', 'gftoandar'),
			'value' => 'Individuals.PhoneNumbers.PHONENUMBER'
		),
		array(
			'label' => esc_html__('Individuals.PhoneNumbers.PHONENUMBERTYPE', 'gftoandar'),
			'value' => 'Individuals.PhoneNumbers.PHONENUMBERTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.ABILITYRATING', 'gftoandar'),
			'value' => 'Individuals.Prospect.ABILITYRATING'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.CAMPAIGNACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Prospect.CAMPAIGNACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Prospect.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.COMMENTTEXT', 'gftoandar'),
			'value' => 'Individuals.Prospect.COMMENTTEXT'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.Prospect.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Prospect.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.INFOSOURCE', 'gftoandar'),
			'value' => 'Individuals.Prospect.INFOSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.INTERESTRATING', 'gftoandar'),
			'value' => 'Individuals.Prospect.INTERESTRATING'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.KEYNUMBER', 'gftoandar'),
			'value' => 'Individuals.Prospect.KEYNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.LINKAGERATING', 'gftoandar'),
			'value' => 'Individuals.Prospect.LINKAGERATING'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.PRIORITY', 'gftoandar'),
			'value' => 'Individuals.Prospect.PRIORITY'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.PROBABILITY', 'gftoandar'),
			'value' => 'Individuals.Prospect.PROBABILITY'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.PROSPECTCODE', 'gftoandar'),
			'value' => 'Individuals.Prospect.PROSPECTCODE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.PROSPECTRATING', 'gftoandar'),
			'value' => 'Individuals.Prospect.PROSPECTRATING'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.PROSPECTSUBCODE', 'gftoandar'),
			'value' => 'Individuals.Prospect.PROSPECTSUBCODE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.SOURCEACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Prospect.SOURCEACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.TARGETACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Prospect.TARGETACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.TARGETADDITIONALAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Prospect.TARGETADDITIONALAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.TARGETGIFTAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Prospect.TARGETGIFTAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.TARGETGIFTDATE', 'gftoandar'),
			'value' => 'Individuals.Prospect.TARGETGIFTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Prospect.TARGETOCCURRENCE', 'gftoandar'),
			'value' => 'Individuals.Prospect.TARGETOCCURRENCE'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Recognition.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.COMMENTTEXT', 'gftoandar'),
			'value' => 'Individuals.Recognition.COMMENTTEXT'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.DELIVEREDBY', 'gftoandar'),
			'value' => 'Individuals.Recognition.DELIVEREDBY'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.DELIVEREDBYACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Recognition.DELIVEREDBYACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.DELIVERYDATE', 'gftoandar'),
			'value' => 'Individuals.Recognition.DELIVERYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.DELIVERYMETHOD', 'gftoandar'),
			'value' => 'Individuals.Recognition.DELIVERYMETHOD'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.EVENTACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Recognition.EVENTACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.EVENTOCCURRENCE', 'gftoandar'),
			'value' => 'Individuals.Recognition.EVENTOCCURRENCE'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.ORGACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Recognition.ORGACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.RECOGNITIONLEVEL', 'gftoandar'),
			'value' => 'Individuals.Recognition.RECOGNITIONLEVEL'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.RECOGNITIONNUMBER', 'gftoandar'),
			'value' => 'Individuals.Recognition.RECOGNITIONNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.RECOGNITIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Recognition.RECOGNITIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Recognition.YEAR', 'gftoandar'),
			'value' => 'Individuals.Recognition.YEAR'
		),
		array(
			'label' => esc_html__('Individuals.Salutations.SALUTATION', 'gftoandar'),
			'value' => 'Individuals.Salutations.SALUTATION'
		),
		array(
			'label' => esc_html__('Individuals.Salutations.SALUTATIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Salutations.SALUTATIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Techniques.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Techniques.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Techniques.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Techniques.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Techniques.EFFECTIVENESS', 'gftoandar'),
			'value' => 'Individuals.Techniques.EFFECTIVENESS'
		),
		array(
			'label' => esc_html__('Individuals.Techniques.ENDDATE', 'gftoandar'),
			'value' => 'Individuals.Techniques.ENDDATE'
		),
		array(
			'label' => esc_html__('Individuals.Techniques.STARTDATE', 'gftoandar'),
			'value' => 'Individuals.Techniques.STARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Techniques.TECHNIQUETYPE', 'gftoandar'),
			'value' => 'Individuals.Techniques.TECHNIQUETYPE'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.TrackParm.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.CAMPAIGNSTATUS', 'gftoandar'),
			'value' => 'Individuals.TrackParm.CAMPAIGNSTATUS'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.CAMPAIGNTYPE', 'gftoandar'),
			'value' => 'Individuals.TrackParm.CAMPAIGNTYPE'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.TrackParm.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.CARDVALUE', 'gftoandar'),
			'value' => 'Individuals.TrackParm.CARDVALUE'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.EXTERNALGOAL', 'gftoandar'),
			'value' => 'Individuals.TrackParm.EXTERNALGOAL'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.GOAL', 'gftoandar'),
			'value' => 'Individuals.TrackParm.GOAL'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.NBROFDONORSPROTECTED', 'gftoandar'),
			'value' => 'Individuals.TrackParm.NBROFDONORSPROTECTED'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.NUMBEROFDONORS', 'gftoandar'),
			'value' => 'Individuals.TrackParm.NUMBEROFDONORS'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.PROJECTEDADDITIONAL', 'gftoandar'),
			'value' => 'Individuals.TrackParm.PROJECTEDADDITIONAL'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.PROJECTEDFINAL', 'gftoandar'),
			'value' => 'Individuals.TrackParm.PROJECTEDFINAL'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.STRETCHGOAL', 'gftoandar'),
			'value' => 'Individuals.TrackParm.STRETCHGOAL'
		),
		array(
			'label' => esc_html__('Individuals.TrackParm.VERBAL', 'gftoandar'),
			'value' => 'Individuals.TrackParm.VERBAL'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ABA', 'gftoandar'),
			'value' => 'Individuals.Transactions.ABA'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ACCOUNTINGDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ACCOUNTINGDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ACCOUNTINGTIME', 'gftoandar'),
			'value' => 'Individuals.Transactions.ACCOUNTINGTIME'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ACH', 'gftoandar'),
			'value' => 'Individuals.Transactions.ACH'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ACKNOWLEDGEMENTFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.ACKNOWLEDGEMENTFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTGLCREDITACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTGLCREDITACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTGLCREDITSOURCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTGLCREDITSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTGLCREDITSUMMARYTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTGLCREDITSUMMARYTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTGLDEBITACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTGLDEBITACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTGLDEBITSOURCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTGLDEBITSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTGLDEBITSUMMARYTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTGLDEBITSUMMARYTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ADJUSTMENTREASONTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ADJUSTMENTREASONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.APPROVEDDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.APPROVEDDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.AUTHORIZATIONNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.AUTHORIZATIONNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BANKABLE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BANKABLE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BATCHTRANNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.BATCHTRANNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BATCHTRANSACTIONFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.BATCHTRANSACTIONFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BILLABLEFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.BILLABLEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BILLINGSCHEDULECODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BILLINGSCHEDULECODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BILLINGSCHEDULEKEY', 'gftoandar'),
			'value' => 'Individuals.Transactions.BILLINGSCHEDULEKEY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BILLINGSTARTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BILLINGSTARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BREAKDOWNPROTECTED', 'gftoandar'),
			'value' => 'Individuals.Transactions.BREAKDOWNPROTECTED'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CAMPAIGNACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.CAMPAIGNACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CAMPAIGNTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.CAMPAIGNTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Transactions.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CHECKDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.CHECKDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CHECKNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.CHECKNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CHECKOFFACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.CHECKOFFACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.COMMENTS', 'gftoandar'),
			'value' => 'Individuals.Transactions.COMMENTS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CONFIRMATIONEMAILDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.CONFIRMATIONEMAILDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CONFIRMATIONEMAILTIME', 'gftoandar'),
			'value' => 'Individuals.Transactions.CONFIRMATIONEMAILTIME'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CONTINUOUSGIVERFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.CONTINUOUSGIVERFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CYBSACHAUTHMETHOD', 'gftoandar'),
			'value' => 'Individuals.Transactions.CYBSACHAUTHMETHOD'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CYBSDECISION', 'gftoandar'),
			'value' => 'Individuals.Transactions.CYBSDECISION'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CYBSREASONCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.CYBSREASONCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CYBSREQUESTID', 'gftoandar'),
			'value' => 'Individuals.Transactions.CYBSREQUESTID'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DESIGNATEDFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.DESIGNATEDFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DESIGNATIONSALLOWED', 'gftoandar'),
			'value' => 'Individuals.Transactions.DESIGNATIONSALLOWED'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DISTRIBUTIONCOUNTRY', 'gftoandar'),
			'value' => 'Individuals.Transactions.DISTRIBUTIONCOUNTRY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DISTRIBUTIONZIP', 'gftoandar'),
			'value' => 'Individuals.Transactions.DISTRIBUTIONZIP'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EMAILTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.EMAILTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ENVELOPENUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.ENVELOPENUMBER'
		),
        array(
			'label' => esc_html__('Individuals.Transactions.ENVELOPETYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.ENVELOPETYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG1', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG2', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG3', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG4', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG4'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG5', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG5'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG6', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG6'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG7', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG7'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG8', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG8'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EPLEDGEFLAG9', 'gftoandar'),
			'value' => 'Individuals.Transactions.EPLEDGEFLAG9'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EVENTACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.EVENTACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EVENTATTENDANCEKEY', 'gftoandar'),
			'value' => 'Individuals.Transactions.EVENTATTENDANCEKEY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EVENTOCCURRENCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.EVENTOCCURRENCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EXPECTANCYNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.EXPECTANCYNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.EXTERNALRECEIPTNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.EXTERNALRECEIPTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.FUNDRAISINGACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.FUNDRAISINGACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.FUNDRAISINGCOUNTRY', 'gftoandar'),
			'value' => 'Individuals.Transactions.FUNDRAISINGCOUNTRY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.FUNDRAISINGZIP', 'gftoandar'),
			'value' => 'Individuals.Transactions.FUNDRAISINGZIP'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GENRECEIPTFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.GENRECEIPTFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GLACCOUNTOVERRIDEFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.GLACCOUNTOVERRIDEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GLGENERATIONREQUIRED', 'gftoandar'),
			'value' => 'Individuals.Transactions.GLGENERATIONREQUIRED'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.INFORMATIONREQUESTFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.INFORMATIONREQUESTFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.ISEPLEDGETRANSACTION', 'gftoandar'),
			'value' => 'Individuals.Transactions.ISEPLEDGETRANSACTION'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.LETTERCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.LETTERCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.MAILINGNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.MAILINGNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.MATCHGIFTGROUP', 'gftoandar'),
			'value' => 'Individuals.Transactions.MATCHGIFTGROUP'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.MSTRCVCASH', 'gftoandar'),
			'value' => 'Individuals.Transactions.MSTRCVCASH'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.NEWDONOR', 'gftoandar'),
			'value' => 'Individuals.Transactions.NEWDONOR'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.NUMBEROFDEDUCTIONS', 'gftoandar'),
			'value' => 'Individuals.Transactions.NUMBEROFDEDUCTIONS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.NUMBEROFDONORS', 'gftoandar'),
			'value' => 'Individuals.Transactions.NUMBEROFDONORS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.OUTOFAREA', 'gftoandar'),
			'value' => 'Individuals.Transactions.OUTOFAREA'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.OrgRcvCash', 'gftoandar'),
			'value' => 'Individuals.Transactions.OrgRcvCash'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PACKAGENUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.PACKAGENUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYDIRECT', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYDIRECT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGLCREDITACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGLCREDITACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGLCREDITSOURCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGLCREDITSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGLCREDITSUMMARYTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGLCREDITSUMMARYTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGLDEBITACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGLDEBITACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGLDEBITSOURCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGLDEBITSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGLDEBITSUMMARYTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGLDEBITSUMMARYTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTGROUP', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTGROUP'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYMENTTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PAYROLLSTARTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYROLLSTARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PERCENTOFBONUS', 'gftoandar'),
			'value' => 'Individuals.Transactions.PERCENTOFBONUS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PERCENTOFSALARY', 'gftoandar'),
			'value' => 'Individuals.Transactions.PERCENTOFSALARY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PERPETUALPLEDGE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PERPETUALPLEDGE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PLEDGEGLCREDITACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.PLEDGEGLCREDITACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PLEDGEGLCREDITSOURCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PLEDGEGLCREDITSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PLEDGEGLCREDITSUMMARYTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PLEDGEGLCREDITSUMMARYTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PLEDGEGLDEBITACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.PLEDGEGLDEBITACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PLEDGEGLDEBITSOURCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PLEDGEGLDEBITSOURCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PLEDGEGLDEBITSUMMARYTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PLEDGEGLDEBITSUMMARYTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PROCESSEDDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PROCESSEDDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PROCESSEDTIME', 'gftoandar'),
			'value' => 'Individuals.Transactions.PROCESSEDTIME'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PROCESSINGACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.PROCESSINGACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.PUBLISHFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.PUBLISHFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTABLEFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTABLEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTADDRESS', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTNAME', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTNAME'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTNOTE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RECEIPTSELECTIONDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.RECEIPTSELECTIONDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.REDUCEREPORTED', 'gftoandar'),
			'value' => 'Individuals.Transactions.REDUCEREPORTED'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RELEASEADDRESS', 'gftoandar'),
			'value' => 'Individuals.Transactions.RELEASEADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RELEASEAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.RELEASEAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RELEASEEMAIL', 'gftoandar'),
			'value' => 'Individuals.Transactions.RELEASEEMAIL'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RELEASEFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.RELEASEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.RULENUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.RULENUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SENDEMAIL', 'gftoandar'),
			'value' => 'Individuals.Transactions.SENDEMAIL'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SOLICITORACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.SOLICITORACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SOURCECODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.SOURCECODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SOURCENUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.SOURCENUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREAMOUNT1', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREAMOUNT1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREAMOUNT2', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREAMOUNT2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREAMOUNT3', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREAMOUNT3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREDATE1', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREDATE1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREDATE2', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREDATE2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREDATE3', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREDATE3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREFLAG1', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREFLAG1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREFLAG2', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREFLAG2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREFLAG3', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREFLAG3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREFLAG4', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREFLAG4'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREFLAG5', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREFLAG5'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPAREFLAG6', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPAREFLAG6'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPARETIME1', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPARETIME1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPARETIME2', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPARETIME2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPARETIME3', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPARETIME3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPARETYPE1', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPARETYPE1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPARETYPE2', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPARETYPE2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SPARETYPE3', 'gftoandar'),
			'value' => 'Individuals.Transactions.SPARETYPE3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.STEPUPMATCHGIFTGROUP', 'gftoandar'),
			'value' => 'Individuals.Transactions.STEPUPMATCHGIFTGROUP'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.SUPPRESSSTATEMENT', 'gftoandar'),
			'value' => 'Individuals.Transactions.SUPPRESSSTATEMENT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TIMEOFFHOURS', 'gftoandar'),
			'value' => 'Individuals.Transactions.TIMEOFFHOURS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TOTALADJUSTMENTAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TOTALADJUSTMENTAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TOTALPAYMENTAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TOTALPAYMENTAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TOTALPLEDGEAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TOTALPLEDGEAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TRANSACTIONNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.TRANSACTIONNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.TRANSACTIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF01', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF01'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF02', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF02'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF03', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF03'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF04', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF04'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF05', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF05'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF06', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF06'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF07', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF07'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF08', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF08'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF09', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF09'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.UDF10', 'gftoandar'),
			'value' => 'Individuals.Transactions.UDF10'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.VOLUNTEERFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.VOLUNTEERFLAG'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.CATEGORY', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.CATEGORY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.EXCLUSIVE', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.EXCLUSIVE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.PROTECTED', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.PROTECTED'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.REFERENCE', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.REFERENCE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.RESTRICTED', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.RESTRICTED'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.SUBCATEGORY', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.SUBCATEGORY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.SUBJECT', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.SUBJECT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.Annotations.SUBJECTCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.Annotations.SUBJECTCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BILLINGLASTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BILLINGLASTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BILLINGSCHEDULECODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BILLINGSCHEDULECODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BILLINGSTARTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BILLINGSTARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.CARDEXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.CARDEXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.CYBSACHAUTHMETHOD', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.CYBSACHAUTHMETHOD'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.CYBSSUBSCRIPTIONID', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.CYBSSUBSCRIPTIONID'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.MONTHSPAN', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.MONTHSPAN'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.NOOVERRIDE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.NOOVERRIDE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.NUMBEROFBILLINGS', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.NUMBEROFBILLINGS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.PAYMENTTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.PAYMENTTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.SUPPRESSSTATEMENT', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.SUPPRESSSTATEMENT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.TRANSACTIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BillSchedDtl.BILLINGAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BillSchedDtl.BILLINGAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BillSchedDtl.BILLINGDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BillSchedDtl.BILLINGDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BillSchedDtl.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BillSchedDtl.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BillSchedDtl.COMMENTS', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BillSchedDtl.COMMENTS'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.BillSchedDtl.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.BillSchedDtl.TRANSACTIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.AGENCYACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.AGENCYACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.BOOKNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.BOOKNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCFLAG1', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCFLAG1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCFLAG2', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCFLAG2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCFLAG3', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCFLAG3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCFLAG4', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCFLAG4'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DESIGNATEDACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DESIGNATEDACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DESPERCENTAGE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DESPERCENTAGE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.FEDERATIONACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.FEDERATIONACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GIFTTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GIFTTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.PROGRAMACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.PROGRAMACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.TOTALDONATION', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.TOTALDONATION'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.WRITEINAGENCY', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.WRITEINAGENCY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE1', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE2', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE3', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE4', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.ADDRESSLINE4'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.CITY', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.CITY'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.COUNTRYCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.COUNTRYCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.NAME1', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.NAME1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.NAME2', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.NAME2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.NOTES', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.NOTES'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.STATEORPROV', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.STATEORPROV'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.TRANSACTIONDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.TRANSACTIONDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.DCWriteIn.ZIPPOSTALCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.DCWriteIn.ZIPPOSTALCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.ADDASEMPLOYEE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.ADDASEMPLOYEE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.DONORNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.DONORNOTE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.EMPLOYERACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.EMPLOYERACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.GIFTRELATIONSHIPTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.GIFTRELATIONSHIPTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.INTERNALNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.INTERNALNOTE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.LETTERCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.LETTERCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.RELATEDACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.RELATEDACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCDetails.GiftRelationships.THANKYOUSENTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCDetails.GiftRelationships.THANKYOUSENTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.AGENCYACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.AGENCYACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.DIRECTEDAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.DIRECTEDAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.FEDERATIONACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.FEDERATIONACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.FUNDRAISINGACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.FUNDRAISINGACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.MASTERACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.MASTERACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.PROCESSINGACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.PROCESSINGACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.DCPaymentDir.PROGRAMACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.DCPaymentDir.PROGRAMACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.ADDASEMPLOYEE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.ADDASEMPLOYEE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.DONORNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.DONORNOTE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.EMPLOYERACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.EMPLOYERACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.GIFTRELATIONSHIPTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.GIFTRELATIONSHIPTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.INTERNALNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.INTERNALNOTE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.LETTERCODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.LETTERCODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.RELATEDACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.RELATEDACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.THANKYOUSENTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.THANKYOUSENTDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.PAYERACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.PAYERACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.SORTFIELD1', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.SORTFIELD1'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.SORTFIELD2', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.SORTFIELD2'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.SORTFIELD3', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.SORTFIELD3'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.SORTFIELD4', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.SORTFIELD4'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.SORTFIELD5', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.SORTFIELD5'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.TAXRECEIPTACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.TAXRECEIPTACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TranLink.TRANSACTIONNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.TranLink.TRANSACTIONNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.COMMENTNOTE', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.COMMENTNOTE'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.FIELDVALUE', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.FIELDVALUE'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.USERDEFINEDFIELD', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.USERDEFINEDFIELD'
		),
		array(
			'label' => esc_html__('Individuals.VolMaster.APPROVEDSPEAKER', 'gftoandar'),
			'value' => 'Individuals.VolMaster.APPROVEDSPEAKER'
		),
		array(
			'label' => esc_html__('Individuals.VolMaster.EXTERNALLEADERSHIP', 'gftoandar'),
			'value' => 'Individuals.VolMaster.EXTERNALLEADERSHIP'
		),
		array(
			'label' => esc_html__('Individuals.VolMaster.INTERESTASSPEAKER', 'gftoandar'),
			'value' => 'Individuals.VolMaster.INTERESTASSPEAKER'
		),
		array(
			'label' => esc_html__('Individuals.VolMaster.SPECIFICDATEFROM', 'gftoandar'),
			'value' => 'Individuals.VolMaster.SPECIFICDATEFROM'
		),
		array(
			'label' => esc_html__('Individuals.VolMaster.SPECIFICDATETO', 'gftoandar'),
			'value' => 'Individuals.VolMaster.SPECIFICDATETO'
		),
		array(
			'label' => esc_html__('Individuals.VolMaster.VOLSTATUS', 'gftoandar'),
			'value' => 'Individuals.VolMaster.VOLSTATUS'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.ARRIVALDATE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.ARRIVALDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.ARRIVALTIME', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.ARRIVALTIME'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.ASSIGNEDDATE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.ASSIGNEDDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.ASSIGNEDFROM', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.ASSIGNEDFROM'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.COMMUNICDATE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.COMMUNICDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.COMMUNICSTATUS', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.COMMUNICSTATUS'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.EMAILAGENCY', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.EMAILAGENCY'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.EMAILVOLUNTEER', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.EMAILVOLUNTEER'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.ENDDATE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.ENDDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.NBRGROUPMBRASSIGN', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.NBRGROUPMBRASSIGN'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.NBRGROUPMBRSHOW', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.NBRGROUPMBRSHOW'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.NOTE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.NOTE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.OCCKEYNUMBER', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.OCCKEYNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.OPSNUMBER', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.OPSNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.RELEASEADDRESS', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.RELEASEADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.RELEASEEMAIL', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.RELEASEEMAIL'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.RELEASENAME', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.RELEASENAME'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.RELEASEPHONE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.RELEASEPHONE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.SENDINFO', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.SENDINFO'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.STARTDATE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.STARTDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.STATUS', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.STATUS'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.TEAMID', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.TEAMID'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.TITLE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.TITLE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.TITLECODE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.TITLECODE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.VOLTOCONTACT', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.VOLTOCONTACT'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.VolOpsHours.DESCRIPTION', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.VolOpsHours.DESCRIPTION'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.VolOpsHours.KEYNUMBER', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.VolOpsHours.KEYNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.VolOpsHours.VOLDATE', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.VolOpsHours.VOLDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolOpsAssigned.VolOpsHours.VOLHOURS', 'gftoandar'),
			'value' => 'Individuals.VolOpsAssigned.VolOpsHours.VOLHOURS'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.CAMPAIGNACCOUNT', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.CAMPAIGNACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.CAMPAIGNTYPE', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.CAMPAIGNTYPE'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.COMMENTS', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.COMMENTS'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.EFFECTIVEDATE', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.EFFECTIVEDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.EXPIRYDATE', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.EXPIRYDATE'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.MANAGEDACCOUNT', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.MANAGEDACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.MANAGERSTATUS', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.MANAGERSTATUS'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.PREFERMANAGER', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.PREFERMANAGER'
		),
		array(
			'label' => esc_html__('Individuals.VolunteerRelationships.VOLUNTEERTYPE', 'gftoandar'),
			'value' => 'Individuals.VolunteerRelationships.VOLUNTEERTYPE'
		),
		array(
			'label' => esc_html__('Individuals.WebAddresses.WEBADDRESS', 'gftoandar'),
			'value' => 'Individuals.WebAddresses.WEBADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.WebAddresses.WEBADDRESSTYPE', 'gftoandar'),
			'value' => 'Individuals.WebAddresses.WEBADDRESSTYPE'
		)
	);
	return $andar_field_array;
}

?>