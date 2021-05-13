<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class Andar_Account_Field extends GF_Field {

    public $type = 'andaraccount';

    public function get_form_editor_field_title() {
        return esc_attr__( 'Andar Account', 'gftoandar' );
    }

    public function get_form_editor_button() {
        return array(
            'group' => 'advanced_fields',
            'text'  => $this->get_form_editor_field_title(),
        );
    }

    public function get_form_editor_field_settings() {
        return array(
            'conditional_logic_field_setting',
            'prepopulate_field_setting',
            'error_message_setting',
            'label_setting',
            'admin_label_setting',
            'rules_setting',
            'duplicate_setting',
            'description_setting',
            'css_class_setting',
        );
    }

    public function is_conditional_logic_supported() {
        return true;
    }

    public function get_field_input( $form, $value = '', $entry = null ) {

        $is_entry_detail = $this->is_entry_detail();
        $is_form_editor  = $this->is_form_editor();

        $form_id  = $form['id'];
        $field_id = intval( $this->id );
        $first_name = $last_name = $email_address = $email_type = $account_number = $area_code = $phone_number = $phone_type = '';

        if ( is_array( $value ) ) {
			$first_name = esc_attr( rgget( $this->id . '.1', $value ) );
			$last_name = esc_attr( rgget( $this->id . '.2', $value ) );
            $email_address = esc_attr( rgget( $this->id . '.3', $value ) );
            $email_type  = esc_attr( rgget( $this->id . '.4', $value ) );
			$account_number  = esc_attr( rgget( $this->id . '.5', $value ) );
			$area_code  = esc_attr( rgget( $this->id . '.6', $value ) );
			$phone_number  = esc_attr( rgget( $this->id . '.7', $value ) );
			$phone_type  = esc_attr( rgget( $this->id . '.8', $value ) );
        }

        $disabled_text = $is_form_editor ? "disabled='disabled'" : '';
        $class_suffix  = $is_entry_detail ? '_admin' : '';

        $first_name_tabindex = GFCommon::get_tabindex();
        $last_name_tabindex = GFCommon::get_tabindex();
        $email_address_tabindex = GFCommon::get_tabindex();
        $email_type_tabindex  = GFCommon::get_tabindex();
		$account_number_tabindex  = GFCommon::get_tabindex();
		$area_code_tabindex  = GFCommon::get_tabindex();
		$phone_number_tabindex  = GFCommon::get_tabindex();
		$phone_type_tabindex  = GFCommon::get_tabindex();

        $required_attribute = $this->isRequired ? 'aria-required="true"' : '';
        $invalid_attribute  = $this->failed_validation ? 'aria-invalid="true"' : 'aria-invalid="false"';

        $first_name_label = '<label for="input_' . $field_id . '_' . $form_id . '_1">First Name</label>';

        $first_name_markup = '<span id="input_' . $field_id . '_' . $form_id . '.1_container" class="andar_first_name">';
        if($this->reverseLabels){
            $first_name_markup .= $first_name_label;
        }
        $first_name_markup .= '<input type="text" name="input_' . $field_id . '.1" id="input_' . $field_id . '_' . $form_id . '_1" value="' . $first_name . '" aria-label="First Name" ' . $first_name_tabindex . ' ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
        if(!$this->reverseLabels){
            $first_name_markup .= $first_name_label;
        }        
        $first_name_markup .= '</span>';

        $last_name_label = '<label for="input_' . $field_id . '_' . $form_id . '_2">Last Name</label>';
        $last_name_markup = '<span id="input_' . $field_id . '_' . $form_id . '.2_container" class="andar_last_name">';
        if($this->reverseLabels){
            $last_name_markup .= $last_name_label;
        }        
        $last_name_markup .= '<input type="text" name="input_' . $field_id . '.2" id="input_' . $field_id . '_' . $form_id . '_2" value="' . $last_name . '" aria-label="Last Name" ' . $last_name_tabindex . ' ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
        if(!$this->reverseLabels){
            $last_name_markup .= $last_name_label;
        }        
        $last_name_markup .= '</span>';

        $email_address_label = '<label for="input_' . $field_id . '_' . $form_id . '_3">Email Address</label>';
        $email_address_markup = '<span id="input_' . $field_id . '_' . $form_id . '.3_container" class="andar_email_address">';
        if($this->reverseLabels){
            $email_address_markup .= $email_address_label;
        }        
        $email_address_markup .= '<input type="email" name="input_' . $field_id . '.3" id="input_' . $field_id . '_' . $form_id . '_3" value="' . $email_address . '" aria-label="Email Address" ' . $email_address_tabindex . ' ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
        if(!$this->reverseLabels){
            $email_address_markup .= $email_address_label;
        }        
        $email_address_markup .= '</span>';

        $email_type_label = '<label for="input_' . $field_id . '_' . $form_id . '_4">Email Type</label>';
        $email_type_markup = '<span id="input_' . $field_id . '_' . $form_id . '.4_container" class="andar_email_type">';
        if($this->reverseLabels){
            $email_type_markup .= $email_type_label;
        }
        if($this->useRadio){
            $email_type_markup .= '<input checked="checked" type="radio" value="PERSONAL" name="input_' . $field_id . '.4" id="input_' . $field_id . '_' . $form_id . '_4_1" ' . $disabled_text . ' ' . $invalid_attribute . '/>&nbsp;<span class="radio-label">Personal</span>';
            $email_type_markup .= '<input type="radio" value="WORK" name="input_' . $field_id . '.4" id="input_' . $field_id . '_' . $form_id . '_4_2" ' . $disabled_text . ' ' . $invalid_attribute . '/>&nbsp;<span class="radio-label">Work</span>';
        }   
        if(!$this->useRadio){
            $email_type_markup .= '<select name="input_' . $field_id . '.4" id="input_' . $field_id . '_' . $form_id . '_4" ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
            $email_type_markup .= '<option selected value="PERSONAL">Personal</option>';
            $email_type_markup .= '<option value="WORK">Work</option>';
            $email_type_markup .= '</select>';
        }
        if(!$this->reverseLabels){
            $email_type_markup .= $email_type_label;
        }        
		$email_type_markup .= '</span>';

		$account_number_markup = '<span id="input_' . $field_id . '_' . $form_id . '.5_container" class="andar_account_number">';
        $account_number_markup .= '<input type="hidden" name="input_' . $field_id . '.5" id="input_' . $field_id . '_' . $form_id . '_5" value="" ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
		$account_number_markup .= '</span>';

        $area_code_label = '<label for="input_' . $field_id . '_' . $form_id . '_6">Area Code</label>';
        $area_code_markup = '<span id="input_' . $field_id . '_' . $form_id . '.6_container" class="andar_area_code">';
        if($this->reverseLabels){
            $area_code_markup .= $area_code_label;
        }        
        $area_code_markup .= '<input type="text" name="input_' . $field_id . '.6" id="input_' . $field_id . '_' . $form_id . '_6" value="' . $area_code . '" aria-label="Email Address" ' . $area_code_tabindex . ' ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
        if(!$this->reverseLabels){
            $area_code_markup .= $area_code_label;
        }		
        $area_code_markup .= '</span>';

        $phone_number_label = '<label for="input_' . $field_id . '_' . $form_id . '_7">Phone Number</label>';
        $phone_number_markup = '<span id="input_' . $field_id . '_' . $form_id . '.7_container" class="andar_phone_number">';
        if($this->reverseLabels){
            $phone_number_markup .= $phone_number_label;
        }        
        $phone_number_markup .= '<input type="text" name="input_' . $field_id . '.7" id="input_' . $field_id . '_' . $form_id . '_7" value="' . $phone_number . '" aria-label="Email Address" ' . $phone_number_tabindex . ' ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
        if(!$this->reverseLabels){
            $phone_number_markup .= $phone_number_label;
        }
        $phone_number_markup .= '</span>';


        $phone_type_label = '<label for="input_' . $field_id . '_' . $form_id . '_8">Phone Type</label>';
		$phone_type_markup = '<span id="input_' . $field_id . '_' . $form_id . '.8_container" class="andar_phone_type">';
        if($this->reverseLabels){
            $phone_type_markup .= $phone_type_label;
        }
        if($this->useRadio){
            $phone_type_markup .= '<input checked="checked" type="radio" value="CELL" name="input_' . $field_id . '.8" id="input_' . $field_id . '_' . $form_id . '_8_1" ' . $disabled_text . ' ' . $invalid_attribute . '/>&nbsp;<span class="radio-label">Mobile</span>';
            $phone_type_markup .= '<input type="radio" value="HOME" name="input_' . $field_id . '.8" id="input_' . $field_id . '_' . $form_id . '_8_2" ' . $disabled_text . ' ' . $invalid_attribute . '/>&nbsp;<span class="radio-label">Home</span>';
            $phone_type_markup .= '<input type="radio" value="WORK" name="input_' . $field_id . '.8" id="input_' . $field_id . '_' . $form_id . '_8_3" ' . $disabled_text . ' ' . $invalid_attribute . '/>&nbsp;<span class="radio-label">Work</span>';
        }
        if(!$this->useRadio){
            $phone_type_markup .= '<select name="input_' . $field_id . '.8" id="input_' . $field_id . '_' . $form_id . '_8" ' . $disabled_text . ' ' . $required_attribute . ' ' . $invalid_attribute . '>';
            $phone_type_markup .= '<option selected value="CELL">Mobile</option>';
            $phone_type_markup .= '<option value="HOME">Home</option>';
            $phone_type_markup .= '<option value="WORK">Work</option>';
            $phone_type_markup .= '</select>';            
        }
        if(!$this->reverseLabels){
            $phone_type_markup .= $phone_type_label;
        }        
        $phone_type_markup .= '</span>';


        $css_class = $this->get_css_class();

        return "<div class='ginput_complex{$class_suffix} ginput_container {$css_class} gfield_trigger_change' id='{$field_id}'>
					{$email_address_markup}
					{$email_type_markup}
                    {$first_name_markup}
                    {$last_name_markup}
					{$area_code_markup}
					{$phone_number_markup}
                    {$phone_type_markup}
					{$account_number_markup}
                    <div class='gf_clear gf_clear_complex'></div>
                </div>";
    }

    public function get_css_class() {

        $first_name_input = GFFormsModel::get_input( $this, $this->id . '.1' );
        $last_name_input = GFFormsModel::get_input( $this, $this->id . '.2' );
        $email_address_input = GFFormsModel::get_input( $this, $this->id . '.3' );
        $email_type_input  = GFFormsModel::get_input( $this, $this->id . '.4' );
		$account_number_input  = GFFormsModel::get_input( $this, $this->id . '.5' );
		$area_code_input  = GFFormsModel::get_input( $this, $this->id . '.6' );
		$phone_number_input  = GFFormsModel::get_input( $this, $this->id . '.7' );
		$phone_type_input  = GFFormsModel::get_input( $this, $this->id . '.8' );

        $css_class           = '';
        $visible_input_count = 0;

        if ( $first_name_input && ! rgar( $first_name_input, 'isHidden' ) ) {
            $visible_input_count ++;
            $css_class .= 'has_first_name ';
        } else {
            $css_class .= 'no_first_name ';
        }

        if ( $last_name_input && ! rgar( $last_name_input, 'isHidden' ) ) {
            $visible_input_count ++;
            $css_class .= 'has_last_name ';
        } else {
            $css_class .= 'no_last_name ';
        }

        if ( $email_address_input && ! rgar( $email_address_input, 'isHidden' ) ) {
            $visible_input_count ++;
            $css_class .= 'has_email_address ';
        } else {
            $css_class .= 'no_email_address ';
        }

        if ( $email_type_input && ! rgar( $email_type_input, 'isHidden' ) ) {
            $visible_input_count ++;
            $css_class .= 'has_email_type ';
        } else {
            $css_class .= 'no_email_type ';
        }

        if ( $account_number_input && ! rgar( $account_number_input, 'isHidden' ) ) {
            $visible_input_count ++;
            $css_class .= 'has_account_number ';
        } else {
            $css_class .= 'no_account_number ';
        }

        if ( $area_code_input && ! rgar( $area_code_input, 'isHidden' ) && $this->hidePhone != 1 ) {
            $visible_input_count ++;
            $css_class .= 'has_area_code ';
        } else {
            $css_class .= 'no_area_code ';
        }

        if ( $phone_number_input && ! rgar( $phone_number_input, 'isHidden' ) && $this->hidePhone != 1 ) {
            $visible_input_count ++;
            $css_class .= 'has_phone_number ';
        } else {
            $css_class .= 'no_phone_number ';
        }

        if ( $phone_type_input && ! rgar( $phone_type_input, 'isHidden' ) && $this->hidePhone != 1 ) {
            $visible_input_count ++;
            $css_class .= 'has_phone_type ';
        } else {
            $css_class .= 'no_phone_type ';
        }

        $css_class .= "gf_andaraccount_has_{$visible_input_count} ginput_container_andaraccount ";

        return trim( $css_class );

    }

    public function get_form_editor_inline_script_on_page_render() {

        // set the default field label for the field
        $script = sprintf( "function SetDefaultValues_%s(field) {
        field.label = '%s';
        field.inputs = [new Input(field.id + '.1', '%s'), new Input(field.id + '.2', '%s'), new Input(field.id + '.3', '%s'), new Input(field.id + '.4', '%s'), new Input(field.id + '.5', '%s'), new Input(field.id + '.6', '%s'), new Input(field.id + '.7', '%s'), new Input(field.id + '.8', '%s')];
        }", $this->type, $this->get_form_editor_field_title(), 'First Name', 'Last Name', 'Email Address', 'Email Type', 'Account Number', 'Area Code', 'Phone Number', 'Phone Type' ) . PHP_EOL;

        return $script;

    }

    public function get_value_entry_detail( $value, $currency = '', $use_text = false, $format = 'html', $media = 'screen' ) {

        if ( is_array( $value ) ) {
			$first_name = trim( rgget( $this->id . '.1', $value ) );
			$last_name = trim( rgget( $this->id . '.2', $value ) );
			$email_address = trim( rgget( $this->id . '.3', $value ) );
			$email_type  = trim( rgget( $this->id . '.4', $value ) );
			$account_number  = trim( rgget( $this->id . '.5', $value ) );
			$area_code  = trim( rgget( $this->id . '.6', $value ) );
			$phone_number  = trim( rgget( $this->id . '.7', $value ) );
			$phone_type  = trim( rgget( $this->id . '.8', $value ) );
			if ( $format === 'html' ) {
				$first_name     = esc_html($first_name);
				$last_name      = esc_html($last_name);
				$email_address  = esc_html($email_address);
				$email_type     = esc_html($email_type);
				$account_number = esc_html($account_number);
				$area_code      = esc_html($area_code);
				$phone_number   = esc_html($phone_number);
				$phone_type     = esc_html($phone_type);
				$line_break = '<br />';
			} else {
				$line_break = "\n";
			}

            $return = $first_name;
			$return .= ! empty( $return ) && ! empty( $last_name ) ? " $last_name" : $last_name;
			$return .= $line_break;
			$return .= ! empty( $return ) && ! empty( $email_address ) ? " $email_address" : $email_address;
            $return .= ! empty( $return ) && ! empty( $email_type ) ? " $email_type" : $email_type;
			$return .= $line_break;
			$return .= ! empty( $return ) && ! empty( $area_code ) ? " $area_code" : $area_code;
			$return .= ! empty( $return ) && ! empty( $phone_number ) ? " $phone_number" : $phone_number;
			$return .= ! empty( $return ) && ! empty( $phone_type ) ? " $phone_type" : $phone_type;
			$return .= $line_break;
			$return .= ! empty( $return ) && ! empty( $account_number ) ? " $account_number" : $account_number;

        } else {

            $return = '';

        }

        return $return;

    }

}

GF_Fields::register( new Andar_Account_Field() );

// Add the account validation hook
add_filter( 'gform_field_validation', 'andar_account_validation', 10, 4 );

function andar_account_validation( $result, $value, $form, $field ) {
    //address field will pass $value as an array with each of the elements as an item within the array, the key is the field id
    if ($field->type == 'andaraccount') {
        //address failed validation because of a required item not being filled out
        //do custom validation
        $fname = rgar( $value, $field->id . '.1' );
        $lname = rgar( $value, $field->id . '.2' );
        $email = rgar( $value, $field->id . '.3' );
        $email_type = rgar( $value, $field->id . '.4' );
        $areacode = rgar( $value, $field->id . '.6' );
		$areacode = preg_replace('/[^0-9]/', '', $areacode);

        $phone = rgar( $value, $field->id . '.7' );
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $phone_type = rgar( $value, $field->id . '.8' );

        //check to see if the values you care about are filled out
        if ( empty( $fname ) || empty( $lname ) || empty( $email ) ) {
            $result['is_valid'] = false;
            $result['message']  = 'Please enter a first name, last name and email address.';
        } elseif(empty( $email_type )){ 
            $result['is_valid'] = false;
            $result['message']  = 'Please select an email type.';            
        } elseif(empty( $phone_type ) && $field->hidePhone != 1){
            $result['is_valid'] = false;
            $result['message']  = 'Please select a phone type.';
        } elseif(strlen($areacode) != 3 && $field->hidePhone != 1 ){
            $result['is_valid'] = false;
            $result['message']  = 'Please enter a valid 3 digit area code.';
		} elseif(strlen($phone) != 7 && $field->hidePhone != 1){
            $result['is_valid'] = false;
            $result['message']  = 'Please enter a valid 7 digit phone number.';
		} else {
            $result['is_valid'] = true;
            $result['message']  = '';
        }
    }

    return $result;
}

// Adding additional setting in advanced settings tab to hide phone fields
add_action( 'gform_field_advanced_settings', 'gftoandar_advanced_settings', 10, 2 );
function gftoandar_advanced_settings( $position, $form_id ) {
    //create settings on position 50 (right after Admin Label)
    if ( $position == 50 ) {
        ?>
		<li class="hide_phone_setting field_setting">
			<input type="checkbox" id="hide_phone_setting" onclick="SetFieldProperty('hidePhone', this.checked);"/>
			<label for="hide_phone_setting" class="inline">
				<?php esc_html_e( 'Hide Phone Number Fields', 'gftoandaraccount' ); ?>
				<?php gform_tooltip( 'hide_phone_setting' ) ?>
			</label>
		</li>
		<li class="reverse_labels_setting field_setting">
			<input type="checkbox" id="reverse_labels_setting" onclick="SetFieldProperty('reverseLabels', this.checked);"/>
			<label for="reverse_labels_setting" class="inline">
				<?php esc_html_e( 'Place Labels Before Fields', 'gftoandaraccount' ); ?>
				<?php gform_tooltip( 'reverse_labels_setting' ) ?>
			</label>
		</li>
		<li class="use_radio_setting field_setting">
			<input type="checkbox" id="use_radio_setting" onclick="SetFieldProperty('useRadio', this.checked);"/>
			<label for="use_radio_setting" class="inline">
				<?php esc_html_e( 'Replace Dropdowns With Radio Buttons', 'gftoandaraccount' ); ?>
				<?php gform_tooltip( 'use_radio_setting' ) ?>
			</label>
		</li>
		<li class="use_state_abbr_setting field_setting">
			<input type="checkbox" id="use_state_abbr_setting" onclick="SetFieldProperty('useStateAbbr', this.checked);"/>
			<label for="use_state_abbr_setting" class="inline">
				<?php esc_html_e( 'Use State Abbreviations', 'gftoandaraccount' ); ?>
				<?php gform_tooltip( 'use_state_abbr_setting' ) ?>
			</label>
		</li>
		<li class="use_org_headers_setting field_setting">
			<input type="checkbox" onclick="SetFieldProperty('useOrgHeaders', this.checked);"/>
			<label for="use_org_headers_setting" class="inline">
				<?php esc_html_e( 'Use Organizations Headers', 'gftoandaraccount' ); ?>
				<?php // gform_tooltip( 'use_state_abbr_setting' ) ?>
			</label>
		</li>                             
        <?php
    }
}

// Action to inject supporting script to the form editor page
add_action( 'gform_editor_js', 'gftoandar_editor_js' );
function gftoandar_editor_js(){
    ?>
    <script type='text/javascript'>
        //adding setting to fields of type "andaraccount"
        fieldSettings.andaraccount += ", .hide_phone_setting";
        fieldSettings.andaraccount += ", .reverse_labels_setting";
        fieldSettings.andaraccount += ", .use_radio_setting";
        fieldSettings.andaraccount += ", .use_org_headers_setting";     

        fieldSettings.andaraddress += ", .use_state_abbr_setting";
        fieldSettings.andaraddress += ", .use_org_headers_setting";

        fieldSettings.total += ", .use_org_headers_setting";

        fieldSettings.radio += ", .use_org_headers_setting";

        //binding to the load field settings event to initialize the checkbox
        jQuery(document).on("gform_load_field_settings", function(event, field, form){
            jQuery("#hide_phone_setting").attr("checked", field["hidePhone"] == true);
        });

        //binding to the load field settings event to initialize the checkbox
        jQuery(document).on("gform_load_field_settings", function(event, field, form){
            jQuery("#reverse_labels_setting").attr("checked", field["reverseLabels"] == true);
        });
        
        //binding to the load field settings event to initialize the checkbox
        jQuery(document).on("gform_load_field_settings", function(event, field, form){
            jQuery("#use_radio_setting").attr("checked", field["useRadio"] == true);
        });

        jQuery(document).on("gform_load_field_settings", function(event, field, form){
            jQuery("#use_state_abbr_setting").attr("checked", field["useStateAbbr"] == true);
        });
        
        jQuery(document).on("gform_load_field_settings", function(event, field, form){
            //console.log(field);
            //console.log(jQuery("#field_" + field.id + " li.use_org_headers_setting input"));
            //jQuery("#field_" + field.id + " li.use_org_headers_setting input").click();
            setTimeout(function(){
                //alert('setting');
                jQuery("#field_" + field.id + " li.use_org_headers_setting input").attr("checked", field["useOrgHeaders"] == true);
            }, 500);
            
        });        
    </script>
    <?php
}

// Filter to add a new tooltip
add_filter( 'gform_tooltips', 'hide_phone_tooltip' );
function hide_phone_tooltip( $tooltips ) {
   $tooltips['hide_phone_setting'] = "<h6>Hide Phone Fields</h6>Check this box to hide the phone fields";
   return $tooltips;
}

add_filter( 'gform_tooltips', 'reverse_labels_tooltip' );
function reverse_labels_tooltip( $tooltips ) {
   $tooltips['reverse_labels_setting'] = "<h6>Reverse Field Labels</h6>Check this box to display field labels before the fields.";
   return $tooltips;
}

add_filter( 'gform_tooltips', 'use_radio_tooltip' );
function use_radio_tooltip( $tooltips ) {
   $tooltips['use_radio_setting'] = "<h6>Use Radio Buttons</h6>Check this box to use radio buttons in place of dropdown select menus.";
   return $tooltips;
}

add_filter( 'gform_tooltips', 'use_state_abbr_tooltip' );
function use_state_abbr_tooltip( $tooltips ) {
   $tooltips['use_state_abbr_setting'] = "<h6>Use State Abbreviations</h6>Check this box to use state abbreviations in dropdown select instead of full state name.";
   return $tooltips;
}

// Filter to add a andar account email field to admin email list
add_filter( 'gform_email_fields_notification_admin', 'add_andar_email_field_to_admin_list', 10, 2 );
function add_andar_email_field_to_admin_list($fields, $form) {
   foreach($form['fields'] as $field){
	   //var_dump($field);
	   if($field->type == 'andaraccount'){
		   // Get input of email address
		   foreach($field->inputs as $input){
			   if($input['label'] == 'Email Address'){
				   // Set a temp field object to pass as ordinary field object
				   $temp_field = new GF_Field_Email();
				   $temp_field->id = $input['id'];
				   $temp_field->label = $input['label'];

				   // $temp_field['type'] = 'email';
				   // $temp_field['id'] = $input['id'];
				   // $temp_field['label'] = $input['label'];
				   $fields[] = $temp_field;
			   }
		   }
		   //var_dump($field);
	   }
   }
   return $fields;
}

add_filter( 'gform_pre_replace_merge_tags', 'add_andar_merge_tags', 10, 7 );
function add_andar_merge_tags($text, $form, $lead, $url_encode, $esc_html, $nl2br, $format ){
	if(is_array($text)){
		// Get the ID if the field so we can check its type
		$field_id = explode('.', array_key_first($text));
		$field_id = $field_id[0];
		// Loop through the fields until we land on the field we want to get the value from. This is to make sure we are only effecting an andaraccount field.
		foreach($form['fields'] as $form_field){
			if($form_field->type == 'andaraccount' && $form_field->id == $field_id){
				foreach($form_field->inputs as $andar_account_input){
					if($andar_account_input['label'] == 'Email Address'){
						$andar_account_target_id = $andar_account_input['id'];
						$text = $text[$andar_account_target_id];
					}
				}
			}
		}
	}
	return $text;
}
