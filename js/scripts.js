jQuery(function($) {

    console.log('Andar Email Ready');

    // Init vars
	var andar_account_field = jQuery('.ginput_container_andaraccount').parent(),
		//andar_account_field = [],
        andar_email_previous_field_value = '',
        call_andar = false,
        contact_info = {},
		all_input_fields = jQuery('.gform_wrapper input');
		//console.log(andar_account_field);
		// andar_account_fields_all.each(function(index){
		// 	if(this.style.display && this.style.display == 'none'){
		// 		//andar_account_field.splice(index, 1);
		// 	} else {
		// 		andar_account_field.push(this);
		// 	}
		// });
		// console.log(andar_account_field);		

	function set_vars(){
		andar_account_field = jQuery('.ginput_container_andaraccount').parent();
		//andar_account_field = [];
        //andar_email_previous_field_value = '';
        call_andar = false;
        contact_info = {};
		all_input_fields = jQuery('.gform_wrapper input');
		// If andar account field is set to display: none, then it should be removed from array
		// console.log(andar_account_field);
		// andar_account_fields_all.each(function(index){
		// 	if(this.style.display && this.style.display == 'none'){
		// 		//andar_account_field.splice(index, 1);
		// 	} else {
		// 		andar_account_field.push(this);
		// 	}
		// });
		// console.log(andar_account_field);	
	}

    // Function defs
	function get_obj_key_from_value(contact_object, contact_value){
		var email_type = 'PERSONAL1';
		jQuery.each(contact_object, function( key, value ) {
			if(value == contact_value){
				email_type = key;
				return false;
			}
		});
		// Rename the keys because they are not correct for adding data to Andar
		if(email_type == 'PERSONALEMAIL_1'){
			email_type = 'PERSONAL1';
		}
		if(email_type == 'PERSONALEMAIL_2'){
			email_type = 'PERSONAL2';
		}
		if(email_type == 'WORKEMAIL'){
			email_type = 'WORK';
		}
		return email_type;
	}

    function get_contact_info(blurred_field, email_value, andar_account_field_id){
        if(email_value.length > 0){
            console.log('Requesting data from Andar');
			// Fade out form elements while this is processing
			// blurred_field.parents('form').find('input, select').not(blurred_field).fadeTo("fast", 0.25);
            jQuery.ajax({
                url: gftoandarurls.siteurl + '/wp-json/gftoandar/v1/account?andaremail='+email_value,
                success: function(result){
					console.log('Received data from Andar');
                    // Convert the json string to a json object
                    contact_info = JSON.parse(result);

					// Clean up some of the data from Andar
					if(contact_info.MAINCOUNTRY == 'United States of America'){
					   contact_info.MAINCOUNTRY = 'USA';
					}

					// Update the account number value in the Andar account field
					jQuery('#' + andar_account_field_id + '_5').val(contact_info.INDNUM);

					// Update the first name value in the Andar account field
					// jQuery('#' + andar_account_field_id + '_1').val(contact_info.FIRSTNAME);

					// Update the last name value in the Andar account field
					// jQuery('#' + andar_account_field_id + '_2').val(contact_info.LASTNAME);

					// Update the email type value in the Andar account field
					 jQuery('#' + andar_account_field_id + '_4').val(get_obj_key_from_value(contact_info, email_value));

					// Update the area code value in the Andar account field
					// jQuery('#' + andar_account_field_id + '_6').val(contact_info.HOMEAREACODE);

					// Update the phone number value in the Andar account field
					// jQuery('#' + andar_account_field_id + '_7').val(contact_info.HOMEPHONENUMBER);

                    // If there is an andar address field
//					if(jQuery('.autofill-andar-address').length > 0){
//						var address_id = jQuery('.autofill-andar-address .ginput_container_address').attr('id');
//						console.log('Autofill address id ' + address_id);
//						console.log('Repopulating address fields');
//						jQuery('#' + address_id + '_1').val(contact_info.MAINADDR1);
//						jQuery('#' + address_id + '_2').val(contact_info.MAINADDR2);
//						jQuery('#' + address_id + '_3').val(contact_info.MAINCITY);
//						jQuery('#' + address_id + '_4').val(contact_info.MAINSTATE);
//						jQuery('#' + address_id + '_5').val(contact_info.MAINZIPPOSTALCODE);
//						jQuery('#' + address_id + '_6').val(contact_info.MAINCOUNTRY);
//					}

					// If there is a regular address field
//					if(jQuery('.autofill-address').length > 0){
//						var address_id = jQuery('.autofill-address .ginput_container_address').attr('id');
//						console.log('Autofill address id ' + address_id);
//						console.log('Repopulating address fields');
//						jQuery('#' + address_id + '_1').val(contact_info.MAINADDR1);
//						jQuery('#' + address_id + '_2').val(contact_info.MAINADDR2);
//						jQuery('#' + address_id + '_3').val(contact_info.MAINCITY);
//						jQuery('#' + address_id + '_4').val(contact_info.MAINSTATE);
//						jQuery('#' + address_id + '_5').val(contact_info.MAINZIPPOSTALCODE);
//						jQuery('#' + address_id + '_6').val(contact_info.MAINCOUNTRY);
//					}

					// Fade in form elements
					// blurred_field.parents('form').find('input, select').not(blurred_field).fadeTo("fast", 1);

                }
            });
        }
    }
	function add_event_handlers(){
		andar_account_field.each(function(){
			if(this.style.display != 'none'){
				var notification_email_field = jQuery(this).parents('.gform_wrapper').find('.autofill-notification-email-address input');
				var notification_fname_field = jQuery(this).parents('.gform_wrapper').find('.autofill-notification-first-name input');
				var notification_lname_field = jQuery(this).parents('.gform_wrapper').find('.autofill-notification-last-name input');
				var andar_account_field_id = jQuery(this).attr('id');
				var andar_account_field_parts = andar_account_field_id.split('_');
					andar_account_field_id = 'input_' + andar_account_field_parts[2] + '_' + andar_account_field_parts[1];
				// Set the blur event handler for email address field
				jQuery('#' + andar_account_field_id + '_3').off().on('blur', function(evt){
					var email_value = jQuery(this).val();
					// Only reach out to andar if the email value is different
					if(email_value != andar_email_previous_field_value && email_value.length > 0 && email_value != ''){
						andar_email_previous_field_value = email_value;
						get_contact_info(jQuery(this), email_value, andar_account_field_id);	
					}
					// Populate the notification email address hidden field with this email address
					// notification_email_address_input.val(email_value);
					// console.log(jQuery(this).parents('.gform_wrapper').find('.autofill-notification-email-address input'));
					if(notification_email_field.length > 0){
						notification_email_field.val(email_value);
						notification_email_field.attr('value', email_value);
					}
				});
				// Set the blur event handler for first name field
				jQuery('#' + andar_account_field_id + '_1').off().on('blur', function(evt){
					var fname_value = jQuery(this).val();
					// Populate the notification first name hidden field with this first name value
					if(notification_fname_field.length > 0){
						notification_fname_field.val(fname_value);
						notification_fname_field.attr('value', fname_value);
					}
				});
				// Set the blur event handler for last name field
				jQuery('#' + andar_account_field_id + '_2').off().on('blur', function(evt){
					var lname_value = jQuery(this).val();
					// Populate the notification first name hidden field with this first name value
					if(notification_lname_field.length > 0){
						notification_lname_field.val(lname_value);
						notification_lname_field.attr('value', lname_value);
					}
				});
			}
		});
	}

	function run_on_init(){
		andar_account_field.each(function(){
			if(this.style.display != 'none'){
				var andar_account_field_id = jQuery(this).attr('id');
				var andar_account_field_parts = andar_account_field_id.split('_');
					andar_account_field_id = 'input_' + andar_account_field_parts[2] + '_' + andar_account_field_parts[1],
					andar_account_email_value = jQuery('#' + andar_account_field_id + '_3').val();

				// If this email field has a value
				if(andar_account_email_value.length > 0 && andar_account_email_value != '' && andar_account_email_value != andar_email_previous_field_value){
					andar_email_previous_field_value = andar_account_email_value;
					console.log('getting email again');
					get_contact_info(jQuery('#' + andar_account_field_id + '_3'), jQuery('#' + andar_account_field_id + '_3').val(), andar_account_field_id);
				}
			}
		});
	}

	function replace_date_placeholders(){

		all_input_fields.each(function(){
			if(jQuery(this).val() == '{ymd}'){
				var MyDate = new Date();
				var MyDateString;
				MyDateString = MyDate.getFullYear() + ('0' + (MyDate.getMonth()+1)).slice(-2) + ('0' + MyDate.getDate()).slice(-2);
				jQuery(this).val(MyDateString);
			}
		});

	}

	// Initialize
	function init_all(){
		set_vars();
		if(andar_account_field.length > 0){
			call_andar = true;
			add_event_handlers();
			run_on_init();
			replace_date_placeholders();
		}
	}

	// Run on page ready
	init_all();

	// Run when page changes in gravity forms
	jQuery(document).on('gform_page_loaded', function(event, form_id, current_page){
        init_all();
	});
	
	gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {
		init_all();
	});
	
	if(jQuery('div.gform_validation_errors').length > 0){
		jQuery('div.gform_validation_errors').parents('.tab').each(function(){
			var thisTab = jQuery(this);
			setTimeout(function(){
				thisTab.show();
				jQuery('[data-tab-trigger="#'+thisTab.attr('id')+'"]').addClass('active');
				//console.log(jQuery('[data-tab-trigger=#'+thisTab.attr('id')+']').offset().top);
				window.scrollTo(0, jQuery('div.gform_validation_errors').offset().top - 165);
			}, 1000);
		});
	}	

});

// Set min and max dates to the date picker if classes are set
gform.addFilter( 'gform_datepicker_options_pre_init', function(optionsObj, formId, fieldId){
	if(jQuery('#field_'+formId+'_'+fieldId).length > 0){
		var currentField = jQuery('#field_' + formId + '_' + fieldId);
		if(currentField.hasClass('date-min-max')){
			var classes = currentField.attr('class');
			var minClass = classes.match(/min\-\d+/gi);
			var maxClass = classes.match(/max\-\d+/gi);
			
			if(minClass.length > 0 && maxClass.length > 0){
				minClass = minClass[0].split('-')[1];
				maxClass = maxClass[0].split('-')[1];
				var minDay = minClass;
				var maxDay = maxClass;
				var twodigitmonth = maxDay.substring(0, 2);
				var twodigitday = maxDay.substring(2, 4);
				var fourdigityear = maxDay.substring(4, 8);
				maxDay = fourdigityear + '-' + twodigitmonth + '-' + twodigitday;
				// Calculate differences in days for max day
				var date1 = new Date();
				var date2 = new Date(maxDay);
				var maxTimeDiff = date2.getTime() - date1.getTime();
				var maxDayDiff = Math.ceil(maxTimeDiff / (1000 * 3600 * 24));                     
				optionsObj.minDate = minDay;
				optionsObj.maxDate = '+' + maxDayDiff + ' D';
			}
		}
	}
	return optionsObj;
});
// INDNUM: 5922307
// PERSONALEMAIL_1: lance@mightily.com
// PERSONALEMAIL_2:
// WORKEMAIL: lance@mightily.com
// PREFIX:
// FIRSTNAME: Lance4
// MIDDLENAME:
// LASTNAME: Swan
// SUFFIX:
// MAINADDR1: 11702 English Meadow Drive
// MAINADDR2:
// MAINCITY: Louisville
// MAINSTATE: KY
// MAINZIPPOSTALCODE: 40229
// MAINCOUNTY: Jefferson
// MAINCOUNTRY: United States of America
// HOMEAREACODE: 502
// HOMEPHONENUMBER: 5938359
// EMAIL: lance@mightily.com
