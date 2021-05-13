<?php
function andar_field_list(){
	$andar_field_array = array(
		array(
			'label' => esc_html__('EnvelopeMaster.CAMPAIGNACCOUNTNUMBER', 'gftoandar'),
			'value' => 'EnvelopeMaster.CAMPAIGNACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('EnvelopeMaster.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'EnvelopeMaster.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('EnvelopeMaster.REFERENCENUMBER', 'gftoandar'),
			'value' => 'EnvelopeMaster.REFERENCENUMBER'
		),
		array(
			'label' => esc_html__('EnvelopeMaster.ENVELOPEANNOTATION1', 'gftoandar'),
			'value' => 'EnvelopeMaster.ENVELOPEANNOTATION1'
		),
		array(
			'label' => esc_html__('EnvelopeMaster.ENVELOPETYPE', 'gftoandar'),
			'value' => 'EnvelopeMaster.ENVELOPETYPE'
		),
		array(
			'label' => esc_html__('EnvelopeMaster.ORGACCOUNTNUMBER', 'gftoandar'),
			'value' => 'EnvelopeMaster.ORGACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.ACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Individuals.ACCOUNTNUMBER'
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
			'label' => esc_html__('Individuals.RELEASEADDRESS', 'gftoandar'),
			'value' => 'Individuals.RELEASEADDRESS'
		),
		array(
			'label' => esc_html__('Individuals.RELEASEAMOUNT', 'gftoandar'),
			'value' => 'Individuals.RELEASEAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.RELEASEFLAG', 'gftoandar'),
			'value' => 'Individuals.RELEASEFLAG'
		),
		array(
			'label' => esc_html__('Individuals.ACCOUNTSTATUS', 'gftoandar'),
			'value' => 'Individuals.ACCOUNTSTATUS'
		),
		array(
			'label' => esc_html__('Individuals.SUFFIX', 'gftoandar'),
			'value' => 'Individuals.SUFFIX'
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
			'label' => esc_html__('Individuals.Addresses.ADDRESSTYPE', 'gftoandar'),
			'value' => 'Individuals.Addresses.ADDRESSTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.CITY', 'gftoandar'),
			'value' => 'Individuals.Addresses.CITY'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.STATEORPROV', 'gftoandar'),
			'value' => 'Individuals.Addresses.STATEORPROV'
		),
		array(
			'label' => esc_html__('Individuals.Addresses.ZIPPOSTALCODE', 'gftoandar'),
			'value' => 'Individuals.Addresses.ZIPPOSTALCODE'
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
			'label' => esc_html__('Individuals.PhoneNumbers.AREACODE', 'gftoandar'),
			'value' => 'Individuals.PhoneNumbers.AREACODE'
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
			'label' => esc_html__('Individuals.Transactions.APPROVEDDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.APPROVEDDATE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.CYBSACHAUTHMETHOD', 'gftoandar'),
			'value' => 'Individuals.Transactions.CYBSACHAUTHMETHOD'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.AUTHORIZATIONNUMBER', 'gftoandar'),
			'value' => 'Individuals.Transactions.AUTHORIZATIONNUMBER'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BILLINGSCHEDULECODE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BILLINGSCHEDULECODE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BILLINGSTARTDATE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BILLINGSTARTDATE'
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
			'label' => esc_html__('Individuals.Transactions.COMMENTS', 'gftoandar'),
			'value' => 'Individuals.Transactions.COMMENTS'
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
			'label' => esc_html__('Individuals.Transactions.PAYMENTTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.PAYMENTTYPE'
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
			'label' => esc_html__('Individuals.Transactions.RELEASEFLAG', 'gftoandar'),
			'value' => 'Individuals.Transactions.RELEASEFLAG'
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
			'label' => esc_html__('Individuals.Transactions.TOTALPAYMENTAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TOTALPAYMENTAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TOTALPLEDGEAMOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.TOTALPLEDGEAMOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.TRANSACTIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.CYBSACHAUTHMETHOD', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.CYBSACHAUTHMETHOD'
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
			'label' => esc_html__('Individuals.Transactions.BillingSched.CYBSSUBSCRIPTIONID', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.CYBSSUBSCRIPTIONID'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.PAYMENTTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.PAYMENTTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.BillingSched.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.BillingSched.TRANSACTIONTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.DONORNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.DONORNOTE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.EMPLOYERACCOUNT', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.EMPLOYERACCOUNT'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.GIFTRELATIONSHIPTYPE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.GIFTRELATIONSHIPTYPE'
		),
		array(
			'label' => esc_html__('Individuals.Transactions.GiftRelationships.INTERNALNOTE', 'gftoandar'),
			'value' => 'Individuals.Transactions.GiftRelationships.INTERNALNOTE'
		),
		// array(
		// 	'label' => esc_html__('Individuals.Transactions.indRunCC', 'gftoandar'),
		// 	'value' => 'Individuals.Transactions.indRunCC'
		// ),		
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.COMMENTNOTE', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.COMMENTNOTE'
		),		
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.USERDEFINEDFIELD', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.USERDEFINEDFIELD'
		),
		array(
			'label' => esc_html__('Individuals.UserDefinedFields.FIELDVALUE', 'gftoandar'),
			'value' => 'Individuals.UserDefinedFields.FIELDVALUE'
		),
		array(
			'label' => esc_html__('Organizations.ACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Organizations.ACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Organizations.Addresses.ADDRESSLINE1', 'gftoandar'),
			'value' => 'Organizations.Addresses.ADDRESSLINE1'
		),
		array(
			'label' => esc_html__('Organizations.Addresses.ADDRESSLINE2', 'gftoandar'),
			'value' => 'Organizations.Addresses.ADDRESSLINE2'
		),
		array(
			'label' => esc_html__('Organizations.Addresses.CITY', 'gftoandar'),
			'value' => 'Organizations.Addresses.CITY'
		),
		array(
			'label' => esc_html__('Organizations.Addresses.STATEORPROV', 'gftoandar'),
			'value' => 'Organizations.Addresses.STATEORPROV'
		),
		array(
			'label' => esc_html__('Organizations.Addresses.ZIPPOSTALCODE', 'gftoandar'),
			'value' => 'Organizations.Addresses.ZIPPOSTALCODE'
		),
		array(
			'label' => esc_html__('Organizations.EMails.EMAILADDRESS', 'gftoandar'),
			'value' => 'Organizations.EMails.EMAILADDRESS'
		),
		array(
			'label' => esc_html__('Organizations.EMails.EMAILTYPE', 'gftoandar'),
			'value' => 'Organizations.EMails.EMAILTYPE'
		),
		array(
			'label' => esc_html__('Organizations.NAME1', 'gftoandar'),
			'value' => 'Organizations.NAME1'
		),		
		array(
			'label' => esc_html__('Organizations.PhoneNumbers.AREACODE', 'gftoandar'),
			'value' => 'Organizations.PhoneNumbers.AREACODE'
		),
		array(
			'label' => esc_html__('Organizations.PhoneNumbers.PHONENUMBER', 'gftoandar'),
			'value' => 'Organizations.PhoneNumbers.PHONENUMBER'
		),
		array(
			'label' => esc_html__('Organizations.PhoneNumbers.PHONENUMBERTYPE', 'gftoandar'),
			'value' => 'Organizations.PhoneNumbers.PHONENUMBERTYPE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.APPROVEDDATE', 'gftoandar'),
			'value' => 'Organizations.Transactions.APPROVEDDATE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CYBSACHAUTHMETHOD', 'gftoandar'),
			'value' => 'Organizations.Transactions.CYBSACHAUTHMETHOD'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.AUTHORIZATIONNUMBER', 'gftoandar'),
			'value' => 'Organizations.Transactions.AUTHORIZATIONNUMBER'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BILLINGSCHEDULECODE', 'gftoandar'),
			'value' => 'Organizations.Transactions.BILLINGSCHEDULECODE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BILLINGSTARTDATE', 'gftoandar'),
			'value' => 'Organizations.Transactions.BILLINGSTARTDATE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CAMPAIGNACCOUNTNUMBER', 'gftoandar'),
			'value' => 'Organizations.Transactions.CAMPAIGNACCOUNTNUMBER'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CAMPAIGNTYPE', 'gftoandar'),
			'value' => 'Organizations.Transactions.CAMPAIGNTYPE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Organizations.Transactions.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.COMMENTS', 'gftoandar'),
			'value' => 'Organizations.Transactions.COMMENTS'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CYBSDECISION', 'gftoandar'),
			'value' => 'Organizations.Transactions.CYBSDECISION'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CYBSREASONCODE', 'gftoandar'),
			'value' => 'Organizations.Transactions.CYBSREASONCODE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.CYBSREQUESTID', 'gftoandar'),
			'value' => 'Organizations.Transactions.CYBSREQUESTID'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.EVENTACCOUNT', 'gftoandar'),
			'value' => 'Organizations.Transactions.EVENTACCOUNT'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.EVENTOCCURRENCE', 'gftoandar'),
			'value' => 'Organizations.Transactions.EVENTOCCURRENCE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.PAYMENTTYPE', 'gftoandar'),
			'value' => 'Organizations.Transactions.PAYMENTTYPE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.RELEASEAMOUNT', 'gftoandar'),
			'value' => 'Organizations.Transactions.RELEASEAMOUNT'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.RELEASEFLAG', 'gftoandar'),
			'value' => 'Organizations.Transactions.RELEASEFLAG'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.SOURCECODE', 'gftoandar'),
			'value' => 'Organizations.Transactions.SOURCECODE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.SOURCENUMBER', 'gftoandar'),
			'value' => 'Organizations.Transactions.SOURCENUMBER'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.TOTALPAYMENTAMOUNT', 'gftoandar'),
			'value' => 'Organizations.Transactions.TOTALPAYMENTAMOUNT'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.TOTALPLEDGEAMOUNT', 'gftoandar'),
			'value' => 'Organizations.Transactions.TOTALPLEDGEAMOUNT'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Organizations.Transactions.TRANSACTIONTYPE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.CYBSACHAUTHMETHOD', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.CYBSACHAUTHMETHOD'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.BILLINGSCHEDULECODE', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.BILLINGSCHEDULECODE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.BILLINGSTARTDATE', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.BILLINGSTARTDATE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.CAMPAIGNYEAR', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.CAMPAIGNYEAR'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.CYBSSUBSCRIPTIONID', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.CYBSSUBSCRIPTIONID'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.PAYMENTTYPE', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.PAYMENTTYPE'
		),
		array(
			'label' => esc_html__('Organizations.Transactions.BillingSched.TRANSACTIONTYPE', 'gftoandar'),
			'value' => 'Organizations.Transactions.BillingSched.TRANSACTIONTYPE'
		)
	);
	return $andar_field_array;
}

?>