<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class Andar_Address_Field extends GF_Field {

	public $type = 'andaraddress';

	function get_form_editor_field_settings() {
		return array(
			'conditional_logic_field_setting',
			'prepopulate_field_setting',
			'error_message_setting',
			'label_setting',
			'admin_label_setting',
			'label_placement_setting',
			'sub_label_placement_setting',
			'default_input_values_setting',
			'input_placeholders_setting',
			'address_setting',
			'rules_setting',
			'copy_values_option',
			'description_setting',
			'visibility_setting',
			'css_class_setting',
		);
	}

	public function is_conditional_logic_supported() {
		return true;
	}

	public function get_form_editor_field_title() {
		return esc_attr__( 'Andar Address', 'gftoandar' );
	}
	
    public function get_form_editor_button() {
        return array(
            'group' => 'advanced_fields',
            'text'  => $this->get_form_editor_field_title(),
        );
    }
    
    public function get_form_editor_inline_script_on_page_render() {

        // set the default field label for the field
        $script = sprintf( "function SetDefaultValues_%s(field) {
        field.label = '%s';
        field.addressType = 'us';
        field.inputs = [new Input(field.id + '.1', '%s'), new Input(field.id + '.2', '%s'), new Input(field.id + '.3', '%s'), new Input(field.id + '.4', '%s'), new Input(field.id + '.5', '%s'), new Input(field.id + '.6', '%s'), new Input(field.id + '.7', '%s')];
        }", $this->type, $this->get_form_editor_field_title(), 'Street Address', 'Address Line 2', 'City', 'State / Province / Region', 'ZIP / Postal Code', 'Country', 'Address Type') . PHP_EOL;

        return $script;
		
    }    

	function validate( $value, $form ) {

		if ( $this->isRequired ) {
			$copy_values_option_activated = $this->enableCopyValuesOption && rgpost( 'input_' . $this->id . '_copy_values_activated' );
			if ( $copy_values_option_activated ) {
				// validation will occur in the source field
				return;
			}

			$street  = rgpost( 'input_' . $this->id . '_1' );
			$city    = rgpost( 'input_' . $this->id . '_3' );
			$state   = rgpost( 'input_' . $this->id . '_4' );
			$zip     = rgpost( 'input_' . $this->id . '_5' );
			$country = rgpost( 'input_' . $this->id . '_6' );

			if ( empty( $street ) && ! $this->get_input_property( $this->id . '.1', 'isHidden' )
			     || empty( $city ) && ! $this->get_input_property( $this->id . '.3', 'isHidden' )
			     || empty( $zip ) && ! $this->get_input_property( $this->id . '.5', 'isHidden' )
			     || ( empty( $state ) && ! ( $this->hideState || $this->get_input_property( $this->id . '.4', 'isHidden' ) ) )
			     || ( empty( $country ) && ! ( $this->hideCountry || $this->get_input_property( $this->id . '.6', 'isHidden' ) ) )
			) {
				$this->failed_validation  = true;
				$this->validation_message = empty( $this->errorMessage ) ? esc_html__( 'This field is required. Please enter a complete address.', 'gftoandar' ) : $this->errorMessage;
			}
		}
	}

	public function get_value_submission( $field_values, $get_from_post_global_var = true ) {

		$value                                         = parent::get_value_submission( $field_values, $get_from_post_global_var );
		$value[ $this->id . '_copy_values_activated' ] = (bool) rgpost( 'input_' . $this->id . '_copy_values_activated' );

		return $value;
	}

	public function get_field_input( $form, $value = '', $entry = null ) {

		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();
		$is_admin        = $is_entry_detail || $is_form_editor;

		$form_id  = absint( $form['id'] );
		$id       = intval( $this->id );
		$field_id = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$id" : 'input_' . $form_id . "_$id";
		$form_id  = ( $is_entry_detail || $is_form_editor ) && empty( $form_id ) ? rgget( 'id' ) : $form_id;

		$disabled_text = $is_form_editor ? "disabled='disabled'" : '';
		$class_suffix  = $is_entry_detail ? '_admin' : '';

		$form_sub_label_placement  = rgar( $form, 'subLabelPlacement' );
		$field_sub_label_placement = $this->subLabelPlacement;
		$is_sub_label_above        = $field_sub_label_placement == 'above' || ( empty( $field_sub_label_placement ) && $form_sub_label_placement == 'above' );
		$sub_label_class_attribute = $field_sub_label_placement == 'hidden_label' ? "class='hidden_sub_label screen-reader-text'" : '';

		$street_value  = '';
		$street2_value = '';
		$city_value    = '';
		$state_value   = '';
		$zip_value     = '';
		$country_value = '';
		$andartype_value = '';

		if ( is_array( $value ) ) {
			$street_value  = esc_attr( rgget( $this->id . '.1', $value ) );
			$street2_value = esc_attr( rgget( $this->id . '.2', $value ) );
			$city_value    = esc_attr( rgget( $this->id . '.3', $value ) );
			$state_value   = esc_attr( rgget( $this->id . '.4', $value ) );
			$zip_value     = esc_attr( rgget( $this->id . '.5', $value ) );
			$country_value = esc_attr( rgget( $this->id . '.6', $value ) );
			$andartype_value    = esc_attr( rgget( $this->id . '.7', $value ) );
		}

		// Inputs.
		$address_street_field_input    = GFFormsModel::get_input( $this, $this->id . '.1' );
		$address_street2_field_input   = GFFormsModel::get_input( $this, $this->id . '.2' );
		$address_city_field_input      = GFFormsModel::get_input( $this, $this->id . '.3' );
		$address_state_field_input     = GFFormsModel::get_input( $this, $this->id . '.4' );
		$address_zip_field_input       = GFFormsModel::get_input( $this, $this->id . '.5' );
		$address_country_field_input   = GFFormsModel::get_input( $this, $this->id . '.6' );
		$address_andartype_field_input = GFFormsModel::get_input( $this, $this->id . '.7' );

		// Placeholders.
		$street_placeholder_attribute  = GFCommon::get_input_placeholder_attribute( $address_street_field_input );
		$street2_placeholder_attribute = GFCommon::get_input_placeholder_attribute( $address_street2_field_input );
		$city_placeholder_attribute    = GFCommon::get_input_placeholder_attribute( $address_city_field_input );
		$zip_placeholder_attribute     = GFCommon::get_input_placeholder_attribute( $address_zip_field_input );

		$address_types = $this->get_address_types( $form_id );
		$addr_type     = empty( $this->addressType ) ? $this->get_default_address_type( $form_id ) : $this->addressType;
		$address_type  = rgar( $address_types, $addr_type );

		$state_label  = empty( $address_type['state_label'] ) ? esc_html__( 'State', 'gftoandar' ) : $address_type['state_label'];
		$zip_label    = empty( $address_type['zip_label'] ) ? esc_html__( 'Zip Code', 'gftoandar' ) : $address_type['zip_label'];
		$hide_country = ! empty( $address_type['country'] ) || $this->hideCountry || rgar( $address_country_field_input, 'isHidden' );

		if ( empty( $country_value ) ) {
			$country_value = $this->defaultCountry;
		}

		if ( empty( $state_value ) ) {
			$state_value = $this->defaultState;
		}

		$country_placeholder = GFCommon::get_input_placeholder_value( $address_country_field_input );
		$country_list        = $this->get_country_dropdown( $country_value, $country_placeholder );

		// Changing css classes based on field format to ensure proper display.
		$address_display_format = apply_filters( 'gform_address_display_format', 'default', $this );
		$city_location          = $address_display_format == 'zip_before_city' ? 'right' : 'left';
		$zip_location           = $address_display_format != 'zip_before_city' && ( $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ) ? 'right' : 'left'; // support for $this->hideState legacy property
		$state_location         = $address_display_format == 'zip_before_city' ? 'left' : 'right';
		$country_location       = $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ? 'left' : 'right'; // support for $this->hideState legacy property

		// Labels.
		$address_street_sub_label    = rgar( $address_street_field_input, 'customLabel' ) != '' ? $address_street_field_input['customLabel'] : esc_html__( 'Street Address', 'gftoandar' );
		$address_street_sub_label    = gf_apply_filters( array( 'gform_address_street', $form_id, $this->id ), $address_street_sub_label, $form_id );
		$address_street_sub_label    = esc_html( $address_street_sub_label );
		$address_street2_sub_label   = rgar( $address_street2_field_input, 'customLabel' ) != '' ? $address_street2_field_input['customLabel'] : esc_html__( 'Address Line 2', 'gftoandar' );
		$address_street2_sub_label   = gf_apply_filters( array( 'gform_address_street2', $form_id, $this->id ), $address_street2_sub_label, $form_id );
		$address_street2_sub_label   = esc_html( $address_street2_sub_label );
		$address_zip_sub_label       = rgar( $address_zip_field_input, 'customLabel' ) != '' ? $address_zip_field_input['customLabel'] : $zip_label;
		$address_zip_sub_label       = gf_apply_filters( array( 'gform_address_zip', $form_id, $this->id ), $address_zip_sub_label, $form_id );
		$address_zip_sub_label       = esc_html( $address_zip_sub_label );
		$address_city_sub_label      = rgar( $address_city_field_input, 'customLabel' ) != '' ? $address_city_field_input['customLabel'] : esc_html__( 'City', 'gftoandar' );
		$address_city_sub_label      = gf_apply_filters( array( 'gform_address_city', $form_id, $this->id ), $address_city_sub_label, $form_id );
		$address_city_sub_label      = esc_html( $address_city_sub_label );
		$address_state_sub_label     = rgar( $address_state_field_input, 'customLabel' ) != '' ? $address_state_field_input['customLabel'] : $state_label;
		$address_state_sub_label     = gf_apply_filters( array( 'gform_address_state', $form_id, $this->id ), $address_state_sub_label, $form_id );
		$address_state_sub_label     = esc_html( $address_state_sub_label );
		$address_country_sub_label   = rgar( $address_country_field_input, 'customLabel' ) != '' ? $address_country_field_input['customLabel'] : esc_html__( 'Country', 'gftoandar' );
		$address_country_sub_label   = gf_apply_filters( array( 'gform_address_country', $form_id, $this->id ), $address_country_sub_label, $form_id );
		$address_country_sub_label   = esc_html( $address_country_sub_label );
        
		$address_andartype_sub_label   = rgar( $address_andartype_field_input, 'customLabel' ) != '' ? $address_andartype_field_input['customLabel'] : esc_html__( 'Address Type', 'gftoandar' );
		$address_andartype_sub_label   = gf_apply_filters( array( 'gform_address_andartype', $form_id, $this->id ), $address_andartype_sub_label, $form_id );
		$address_andartype_sub_label   = esc_html( $address_andartype_sub_label );
        

		// Address field.
		$street_address = '';
		$tabindex       = $this->get_tabindex();
		$style          = ( $is_admin && rgar( $address_street_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
		if ( $is_admin || ! rgar( $address_street_field_input, 'isHidden' ) ) {
			if ( $is_sub_label_above ) {
				$street_address = " <span class='ginput {$class_suffix} address_line_1' id='{$field_id}_1_container' {$style}>
                                        <label for='{$field_id}_1' id='{$field_id}_1_label' {$sub_label_class_attribute}>{$address_street_sub_label}</label>
                                        <input type='text' name='input_{$id}.1' id='{$field_id}_1' value='{$street_value}' {$tabindex} {$disabled_text} {$street_placeholder_attribute}/>
                                    </span>";
			} else {
				$street_address = " <span class='ginput {$class_suffix} address_line_1' id='{$field_id}_1_container' {$style}>
                                        <input type='text' name='input_{$id}.1' id='{$field_id}_1' value='{$street_value}' {$tabindex} {$disabled_text} {$street_placeholder_attribute}/>
                                        <label for='{$field_id}_1' id='{$field_id}_1_label' {$sub_label_class_attribute}>{$address_street_sub_label}</label>
                                    </span>";
			}
		}

		// Address line 2 field.
		$street_address2 = '';
		$style           = ( $is_admin && ( $this->hideAddress2 || rgar( $address_street2_field_input, 'isHidden' ) ) ) ? "style='display:none;'" : ''; // support for $this->hideAddress2 legacy property
		if ( $is_admin || ( ! $this->hideAddress2 && ! rgar( $address_street2_field_input, 'isHidden' ) ) ) {
			$tabindex = $this->get_tabindex();
			if ( $is_sub_label_above ) {
				$street_address2 = "<span class='ginput {$class_suffix} address_line_2' id='{$field_id}_2_container' {$style}>
                                        <label for='{$field_id}_2' id='{$field_id}_2_label' {$sub_label_class_attribute}>{$address_street2_sub_label}</label>
                                        <input type='text' name='input_{$id}.2' id='{$field_id}_2' value='{$street2_value}' {$tabindex} {$disabled_text} {$street2_placeholder_attribute}/>
                                    </span>";
			} else {
				$street_address2 = "<span class='ginput {$class_suffix} address_line_2' id='{$field_id}_2_container' {$style}>
                                        <input type='text' name='input_{$id}.2' id='{$field_id}_2' value='{$street2_value}' {$tabindex} {$disabled_text} {$street2_placeholder_attribute}/>
                                        <label for='{$field_id}_2' id='{$field_id}_2_label' {$sub_label_class_attribute}>{$address_street2_sub_label}</label>
                                    </span>";
			}
		}

		if ( $address_display_format == 'zip_before_city' ) {
			// Zip field.
			$zip      = '';
			$tabindex = $this->get_tabindex();
			$style    = ( $is_admin && rgar( $address_zip_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_zip_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
					$zip = "<span class='ginput {$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                </span>";
				} else {
					$zip = "<span class='ginput {$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                </span>";
				}
			}

			// City field.
			$city     = '';
			$tabindex = $this->get_tabindex();
			$style    = ( $is_admin && rgar( $address_city_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_city_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
					$city = "<span class='ginput {$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                 </span>";
				} else {
					$city = "<span class='ginput {$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                 </span>";
				}
			}

			// State field.
			$style = ( $is_admin && ( $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ) ) ? "style='display:none;'" : ''; // support for $this->hideState legacy property
			if ( $is_admin || ( ! $this->hideState && ! rgar( $address_state_field_input, 'isHidden' ) ) ) {
				$state_field = $this->get_state_field( $id, $field_id, $state_value, $disabled_text, $form_id );
				if ( $is_sub_label_above ) {
					$state = "<span class='ginput {$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
                                           <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>{$address_state_sub_label}</label>
                                           $state_field
                                      </span>";
				} else {
					$state = "<span class='ginput {$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
                                           $state_field
                                           <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>{$address_state_sub_label}</label>
                                      </span>";
				}
			} else {
				$state = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.4' id='%s_4' value='%s'/>", $id, $field_id, $state_value );
			}
		} else {

			// City field.
			$city     = '';
			$tabindex = $this->get_tabindex();
			$style    = ( $is_admin && rgar( $address_city_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_city_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
					$city = "<span class='ginput {$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                 </span>";
				} else {
					$city = "<span class='ginput {$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                 </span>";
				}
			}

			// State field.
			$style = ( $is_admin && ( $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ) ) ? "style='display:none;'" : ''; // support for $this->hideState legacy property
			if ( $is_admin || ( ! $this->hideState && ! rgar( $address_state_field_input, 'isHidden' ) ) ) {
				$state_field = $this->get_state_field( $id, $field_id, $state_value, $disabled_text, $form_id );
				if ( $is_sub_label_above ) {
					$state = "<span class='ginput {$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
                                        <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>$address_state_sub_label</label>
                                        $state_field
                                      </span>";
				} else {
					$state = "<span class='ginput {$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
                                        $state_field
                                        <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>$address_state_sub_label</label>
                                      </span>";
				}
			} else {
				$state = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.4' id='%s_4' value='%s'/>", $id, $field_id, $state_value );
			}

			// Zip field.
			$zip      = '';
			$tabindex = GFCommon::get_tabindex();
			$style    = ( $is_admin && rgar( $address_zip_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_zip_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
					$zip = "<span class='ginput {$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                </span>";
				} else {
					$zip = "<span class='ginput {$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                </span>";
				}
			}
		}

		if ( $is_admin || ! $hide_country ) {
			$style    = $hide_country ? "style='display:none;'" : '';
			$tabindex = $this->get_tabindex();
			if ( $is_sub_label_above ) {
				$country = "<span class='ginput {$class_suffix} address_country' id='{$field_id}_6_container' {$style}>
                                        <label for='{$field_id}_6' id='{$field_id}_6_label' {$sub_label_class_attribute}>{$address_country_sub_label}</label>
                                        <select name='input_{$id}.6' id='{$field_id}_6' {$tabindex} {$disabled_text}>{$country_list}</select>
                                    </span>";
			} else {
				$country = "<span class='ginput {$class_suffix} address_country' id='{$field_id}_6_container' {$style}>
                                        <select name='input_{$id}.6' id='{$field_id}_6' {$tabindex} {$disabled_text}>{$country_list}</select>
                                        <label for='{$field_id}_6' id='{$field_id}_6_label' {$sub_label_class_attribute}>{$address_country_sub_label}</label>
                                    </span>";
			}
		} else {
			//$country = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.6' id='%s_6' value='%s'/>", $id, $field_id, $country_value );
			$country = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.6' id='%s_6' value='USA'/>", $id, $field_id, $country_value );
		}
        
        // Address Type Field
        $tabindex = $this->get_tabindex();
		$andartype = "<input type='hidden' class='gform_hidden' name='input_{$id}.7' id='{$field_id}_7' value='MAIN'/>";
//        if ( $is_sub_label_above ) {
//            $andartype = "<span class='ginput_right{$class_suffix} address_andartype' id='{$field_id}_7_container' {$style}>
//                                    <label for='{$field_id}_7' id='{$field_id}_7_label' {$sub_label_class_attribute}>{$address_andartype_sub_label}</label>
//                                    <select name='input_{$id}.7' id='{$field_id}_7' {$tabindex} {$disabled_text}>
//                                        <option value='HOME'>Home</option>
//                                        <option value='WORK'>Work</option>
//                                    </select>
//                                </span>";
//        } else {
//            $andartype = "<span class='ginput_right{$class_suffix} address_andartype' id='{$field_id}_7_container' {$style}>
//                                    <select name='input_{$id}.7' id='{$field_id}_7' {$tabindex} {$disabled_text}>
//                                        <option value='HOME'>Home</option>
//                                        <option value='WORK'>Work</option>
//                                    </select>
//                                    <label for='{$field_id}_7' id='{$field_id}_7_label' {$sub_label_class_attribute}>{$address_andartype_sub_label}</label>
//                                </span>";
//        }        
        
		$inputs = $address_display_format == 'zip_before_city' ? $street_address . $street_address2 . $zip . $city . $state . $country . $andartype : $street_address . $street_address2 . $city . $state . $zip . $country . $andartype;

		$copy_values_option = '';
		$input_style        = '';
		if ( ( $this->enableCopyValuesOption || $is_form_editor ) && ! $is_entry_detail ) {
			$copy_values_style      = $is_form_editor && ! $this->enableCopyValuesOption ? "style='display:none;'" : '';
			$copy_values_is_checked = isset( $value[$this->id . '_copy_values_activated'] ) ? $value[$this->id . '_copy_values_activated'] == true : $this->copyValuesOptionDefault == true;
			$copy_values_checked    = checked( true, $copy_values_is_checked, false );
			$copy_values_option     = "<div id='{$field_id}_copy_values_option_container' class='copy_values_option_container' {$copy_values_style}>
                                        <input type='checkbox' id='{$field_id}_copy_values_activated' class='copy_values_activated' value='1' name='input_{$id}_copy_values_activated' {$disabled_text} {$copy_values_checked}/>
                                        <label for='{$field_id}_copy_values_activated' id='{$field_id}_copy_values_option_label' class='copy_values_option_label inline'>{$this->copyValuesOptionLabel}</label>
                                    </div>";
			if ( $copy_values_is_checked ) {
				$input_style = "style='display:none;'";
			}
		}

		$css_class = $this->get_css_class();

		return "    {$copy_values_option}
                    <div class='ginput_complex{$class_suffix} ginput_container {$css_class} gfield_trigger_change' id='$field_id' {$input_style}>
                        {$inputs}
                    <div class='gf_clear gf_clear_complex'></div>
                </div>";
	}

	public function get_field_label_class(){
		return 'gfield_label gfield_label_before_complex';
	}

	public function get_css_class() {

		$address_street_field_input  = GFFormsModel::get_input( $this, $this->id . '.1' );
		$address_street2_field_input = GFFormsModel::get_input( $this, $this->id . '.2' );
		$address_city_field_input    = GFFormsModel::get_input( $this, $this->id . '.3' );
		$address_state_field_input   = GFFormsModel::get_input( $this, $this->id . '.4' );
		$address_zip_field_input     = GFFormsModel::get_input( $this, $this->id . '.5' );
		$address_country_field_input = GFFormsModel::get_input( $this, $this->id . '.6' );
		$address_andartype_field_input = GFFormsModel::get_input( $this, $this->id . '.7' );

		$css_class = '';
		if ( ! rgar( $address_street_field_input, 'isHidden' ) ) {
			$css_class .= 'has_street ';
		}
		if ( ! rgar( $address_street2_field_input, 'isHidden' ) ) {
			$css_class .= 'has_street2 ';
		}
		if ( ! rgar( $address_city_field_input, 'isHidden' ) ) {
			$css_class .= 'has_city ';
		}
		if ( ! rgar( $address_state_field_input, 'isHidden' ) ) {
			$css_class .= 'has_state ';
		}
		if ( ! rgar( $address_zip_field_input, 'isHidden' ) ) {
			$css_class .= 'has_zip ';
		}
		if ( ! rgar( $address_country_field_input, 'isHidden' ) ) {
			$css_class .= 'has_country ';
        }
        if ( ! rgar( $address_andartype_field_input, 'isHidden' ) ) {
			$css_class .= 'has_andartype ';
		}

		$css_class .= 'ginput_container_address';

		return trim( $css_class );
	}

	public function get_address_types( $form_id ) {

		$addressTypes = array(
			'international' => array( 'label'       => esc_html__( 'International', 'gftoandar' ),
			                          'zip_label'   => gf_apply_filters( array( 'gform_address_zip', $form_id ), esc_html__( 'ZIP / Postal Code', 'gftoandar' ), $form_id ),
			                          'state_label' => gf_apply_filters( array( 'gform_address_state', $form_id ), esc_html__( 'State / Province / Region', 'gftoandar' ), $form_id )
			),
			'us'            => array(
				'label'       => esc_html__( 'United States', 'gftoandar' ),
				'zip_label'   => gf_apply_filters( array( 'gform_address_zip', $form_id ), esc_html__( 'ZIP Code', 'gftoandar' ), $form_id ),
				'state_label' => gf_apply_filters( array( 'gform_address_state', $form_id ), esc_html__( 'State', 'gftoandar' ), $form_id ),
				'country'     => 'United States',
				'states'      => array_merge( array( '' ), $this->get_us_states() )
			),
			'canadian'      => array(
				'label'       => esc_html__( 'Canadian', 'gftoandar' ),
				'zip_label'   => gf_apply_filters( array( 'gform_address_zip', $form_id ), esc_html__( 'Postal Code', 'gftoandar' ), $form_id ),
				'state_label' => gf_apply_filters( array( 'gform_address_state', $form_id ), esc_html__( 'Province', 'gftoandar' ), $form_id ),
				'country'     => 'Canada',
				'states'      => array_merge( array( '' ), $this->get_canadian_provinces() )
			)
		);

		/**
		 * Filters the address types available.
		 *
		 * @since Unknown
		 *
		 * @param array $addressTypes Contains the details for existing address types.
		 * @param int   $form_id      The form ID.
		 */
		return gf_apply_filters( array( 'gform_address_types', $form_id ), $addressTypes, $form_id );
	}

	/**
	 * Retrieve the default address type for this field.
	 *
	 * @param int $form_id The current form ID.
	 *
	 * @return string
	 */
	public function get_default_address_type( $form_id ) {
		$default_address_type = 'us';

		/**
		 * Allow the default address type to be overridden.
		 *
		 * @param string $default_address_type The default address type of international.
		 */
		$default_address_type = apply_filters( 'gform_default_address_type', $default_address_type, $form_id );

		return apply_filters( 'gform_default_address_type_' . $form_id, $default_address_type, $form_id );
	}

	public function get_state_field( $id, $field_id, $state_value, $disabled_text, $form_id ) {

		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();
		$is_admin        = $is_entry_detail || $is_form_editor;


		$state_dropdown_class = $state_text_class = $state_style = $text_style = $state_field_id = '';

		if ( empty( $state_value ) ) {
			$state_value = $this->defaultState;

			// For backwards compatibility (Canadian address type used to store the default state into the defaultProvince property).
			if ( $this->addressType == 'canadian' && ! empty( $this->defaultProvince ) ) {
				$state_value = $this->defaultProvince;
			}
		}

		$address_type        = empty( $this->addressType ) ? $this->get_default_address_type( $form_id ) : $this->addressType;
		$address_types       = $this->get_address_types( $form_id );
		$has_state_drop_down = isset( $address_types[ $address_type ]['states'] ) && is_array( $address_types[ $address_type ]['states'] );
		//var_dump($this->get_default_address_type( $form_id ));

		if ( $is_admin && rgget('view') != 'entry' ) {
			$state_dropdown_class = "class='state_dropdown'";
			$state_text_class     = "class='state_text'";
			$state_style          = ! $has_state_drop_down ? "style='display:none;'" : '';
			$text_style           = $has_state_drop_down ? "style='display:none;'" : '';
			$state_field_id       = '';
		} else {
			// ID only displayed on front end.
			$state_field_id = "id='" . $field_id . "_4'";
		}

		$tabindex         = $this->get_tabindex();
		$state_input      = GFFormsModel::get_input( $this, $this->id . '.4' );
		$state_placeholder = GFCommon::get_input_placeholder_value( $state_input );
		$states           = empty( $address_types[ $address_type ]['states'] ) ? array() : $address_types[ $address_type ]['states'];
		$state_dropdown   = sprintf( "<select name='input_%d.4' %s $tabindex %s $state_dropdown_class $state_style>%s</select>", $id, $state_field_id, $disabled_text, $this->get_state_dropdown( $states, $state_value, $state_placeholder ) );

		$tabindex                    = $this->get_tabindex();
		$state_placeholder_attribute = GFCommon::get_input_placeholder_attribute( $state_input );
		$state_text                  = sprintf( "<input type='text' name='input_%d.4' %s value='%s' {$tabindex} %s {$state_text_class} {$text_style} {$state_placeholder_attribute}/>", $id, $state_field_id, $state_value, $disabled_text );

		if ( $is_admin && rgget('view') != 'entry' ) {
			return $state_dropdown . $state_text;
		} elseif ( $has_state_drop_down ) {
			return $state_dropdown;
		} else {
			return $state_text;
		}
	}

	public function get_countries() {
		return apply_filters(
			'gform_countries', array(
				esc_html__( 'Afghanistan', 'gftoandar' ),
				esc_html__( 'Albania', 'gftoandar' ),
				esc_html__( 'Algeria', 'gftoandar' ),
				esc_html__( 'American Samoa', 'gftoandar' ),
				esc_html__( 'Andorra', 'gftoandar' ),
				esc_html__( 'Angola', 'gftoandar' ),
				esc_html__( 'Antigua and Barbuda', 'gftoandar' ),
				esc_html__( 'Argentina', 'gftoandar' ),
				esc_html__( 'Armenia', 'gftoandar' ),
				esc_html__( 'Australia', 'gftoandar' ),
				esc_html__( 'Austria', 'gftoandar' ),
				esc_html__( 'Azerbaijan', 'gftoandar' ),
				esc_html__( 'Bahamas', 'gftoandar' ),
				esc_html__( 'Bahrain', 'gftoandar' ),
				esc_html__( 'Bangladesh', 'gftoandar' ),
				esc_html__( 'Barbados', 'gftoandar' ),
				esc_html__( 'Belarus', 'gftoandar' ),
				esc_html__( 'Belgium', 'gftoandar' ),
				esc_html__( 'Belize', 'gftoandar' ),
				esc_html__( 'Benin', 'gftoandar' ),
				esc_html__( 'Bermuda', 'gftoandar' ),
				esc_html__( 'Bhutan', 'gftoandar' ),
				esc_html__( 'Bolivia', 'gftoandar' ),
				esc_html__( 'Bosnia and Herzegovina', 'gftoandar' ),
				esc_html__( 'Botswana', 'gftoandar' ),
				esc_html__( 'Brazil', 'gftoandar' ),
				esc_html__( 'Brunei', 'gftoandar' ),
				esc_html__( 'Bulgaria', 'gftoandar' ),
				esc_html__( 'Burkina Faso', 'gftoandar' ),
				esc_html__( 'Burundi', 'gftoandar' ),
				esc_html__( 'Cambodia', 'gftoandar' ),
				esc_html__( 'Cameroon', 'gftoandar' ),
				esc_html__( 'Canada', 'gftoandar' ),
				esc_html__( 'Cape Verde', 'gftoandar' ),
				esc_html__( 'Cayman Islands', 'gftoandar' ),
				esc_html__( 'Central African Republic', 'gftoandar' ),
				esc_html__( 'Chad', 'gftoandar' ),
				esc_html__( 'Chile', 'gftoandar' ),
				esc_html__( 'China', 'gftoandar' ),
				esc_html__( 'Colombia', 'gftoandar' ),
				esc_html__( 'Comoros', 'gftoandar' ),
				esc_html__( 'Congo, Democratic Republic of the', 'gftoandar' ),
				esc_html__( 'Congo, Republic of the', 'gftoandar' ),
				esc_html__( 'Costa Rica', 'gftoandar' ),
				esc_html__( "Côte d'Ivoire", 'gftoandar' ),
				esc_html__( 'Croatia', 'gftoandar' ),
				esc_html__( 'Cuba', 'gftoandar' ),
				esc_html__( 'Curaçao', 'gftoandar' ),
				esc_html__( 'Cyprus', 'gftoandar' ),
				esc_html__( 'Czech Republic', 'gftoandar' ),
				esc_html__( 'Denmark', 'gftoandar' ),
				esc_html__( 'Djibouti', 'gftoandar' ),
				esc_html__( 'Dominica', 'gftoandar' ),
				esc_html__( 'Dominican Republic', 'gftoandar' ),
				esc_html__( 'East Timor', 'gftoandar' ),
				esc_html__( 'Ecuador', 'gftoandar' ),
				esc_html__( 'Egypt', 'gftoandar' ),
				esc_html__( 'El Salvador', 'gftoandar' ),
				esc_html__( 'Equatorial Guinea', 'gftoandar' ),
				esc_html__( 'Eritrea', 'gftoandar' ),
				esc_html__( 'Estonia', 'gftoandar' ),
				esc_html__( 'Ethiopia', 'gftoandar' ),
				esc_html__( 'Faroe Islands', 'gftoandar' ),
				esc_html__( 'Fiji', 'gftoandar' ),
				esc_html__( 'Finland', 'gftoandar' ),
				esc_html__( 'France', 'gftoandar' ),
				esc_html__( 'French Polynesia', 'gftoandar' ),
				esc_html__( 'Gabon', 'gftoandar' ),
				esc_html__( 'Gambia', 'gftoandar' ),
				esc_html( _x( 'Georgia', 'Country', 'gftoandar' ) ),
				esc_html__( 'Germany', 'gftoandar' ),
				esc_html__( 'Ghana', 'gftoandar' ),
				esc_html__( 'Greece', 'gftoandar' ),
				esc_html__( 'Greenland', 'gftoandar' ),
				esc_html__( 'Grenada', 'gftoandar' ),
				esc_html__( 'Guam', 'gftoandar' ),
				esc_html__( 'Guatemala', 'gftoandar' ),
				esc_html__( 'Guinea', 'gftoandar' ),
				esc_html__( 'Guinea-Bissau', 'gftoandar' ),
				esc_html__( 'Guyana', 'gftoandar' ),
				esc_html__( 'Haiti', 'gftoandar' ),
				esc_html__( 'Honduras', 'gftoandar' ),
				esc_html__( 'Hong Kong', 'gftoandar' ),
				esc_html__( 'Hungary', 'gftoandar' ),
				esc_html__( 'Iceland', 'gftoandar' ),
				esc_html__( 'India', 'gftoandar' ),
				esc_html__( 'Indonesia', 'gftoandar' ),
				esc_html__( 'Iran', 'gftoandar' ),
				esc_html__( 'Iraq', 'gftoandar' ),
				esc_html__( 'Ireland', 'gftoandar' ),
				esc_html__( 'Israel', 'gftoandar' ),
				esc_html__( 'Italy', 'gftoandar' ),
				esc_html__( 'Jamaica', 'gftoandar' ),
				esc_html__( 'Japan', 'gftoandar' ),
				esc_html__( 'Jordan', 'gftoandar' ),
				esc_html__( 'Kazakhstan', 'gftoandar' ),
				esc_html__( 'Kenya', 'gftoandar' ),
				esc_html__( 'Kiribati', 'gftoandar' ),
				esc_html__( 'North Korea', 'gftoandar' ),
				esc_html__( 'South Korea', 'gftoandar' ),
				esc_html__( 'Kosovo', 'gftoandar' ),
				esc_html__( 'Kuwait', 'gftoandar' ),
				esc_html__( 'Kyrgyzstan', 'gftoandar' ),
				esc_html__( 'Laos', 'gftoandar' ),
				esc_html__( 'Latvia', 'gftoandar' ),
				esc_html__( 'Lebanon', 'gftoandar' ),
				esc_html__( 'Lesotho', 'gftoandar' ),
				esc_html__( 'Liberia', 'gftoandar' ),
				esc_html__( 'Libya', 'gftoandar' ),
				esc_html__( 'Liechtenstein', 'gftoandar' ),
				esc_html__( 'Lithuania', 'gftoandar' ),
				esc_html__( 'Luxembourg', 'gftoandar' ),
				esc_html__( 'Macedonia', 'gftoandar' ),
				esc_html__( 'Madagascar', 'gftoandar' ),
				esc_html__( 'Malawi', 'gftoandar' ),
				esc_html__( 'Malaysia', 'gftoandar' ),
				esc_html__( 'Maldives', 'gftoandar' ),
				esc_html__( 'Mali', 'gftoandar' ),
				esc_html__( 'Malta', 'gftoandar' ),
				esc_html__( 'Marshall Islands', 'gftoandar' ),
				esc_html__( 'Mauritania', 'gftoandar' ),
				esc_html__( 'Mauritius', 'gftoandar' ),
				esc_html__( 'Mexico', 'gftoandar' ),
				esc_html__( 'Micronesia', 'gftoandar' ),
				esc_html__( 'Moldova', 'gftoandar' ),
				esc_html__( 'Monaco', 'gftoandar' ),
				esc_html__( 'Mongolia', 'gftoandar' ),
				esc_html__( 'Montenegro', 'gftoandar' ),
				esc_html__( 'Morocco', 'gftoandar' ),
				esc_html__( 'Mozambique', 'gftoandar' ),
				esc_html__( 'Myanmar', 'gftoandar' ),
				esc_html__( 'Namibia', 'gftoandar' ),
				esc_html__( 'Nauru', 'gftoandar' ),
				esc_html__( 'Nepal', 'gftoandar' ),
				esc_html__( 'Netherlands', 'gftoandar' ),
				esc_html__( 'New Zealand', 'gftoandar' ),
				esc_html__( 'Nicaragua', 'gftoandar' ),
				esc_html__( 'Niger', 'gftoandar' ),
				esc_html__( 'Nigeria', 'gftoandar' ),
				esc_html__( 'Northern Mariana Islands', 'gftoandar' ),
				esc_html__( 'Norway', 'gftoandar' ),
				esc_html__( 'Oman', 'gftoandar' ),
				esc_html__( 'Pakistan', 'gftoandar' ),
				esc_html__( 'Palau', 'gftoandar' ),
				esc_html__( 'Palestine, State of', 'gftoandar' ),
				esc_html__( 'Panama', 'gftoandar' ),
				esc_html__( 'Papua New Guinea', 'gftoandar' ),
				esc_html__( 'Paraguay', 'gftoandar' ),
				esc_html__( 'Peru', 'gftoandar' ),
				esc_html__( 'Philippines', 'gftoandar' ),
				esc_html__( 'Poland', 'gftoandar' ),
				esc_html__( 'Portugal', 'gftoandar' ),
				esc_html__( 'Puerto Rico', 'gftoandar' ),
				esc_html__( 'Qatar', 'gftoandar' ),
				esc_html__( 'Romania', 'gftoandar' ),
				esc_html__( 'Russia', 'gftoandar' ),
				esc_html__( 'Rwanda', 'gftoandar' ),
				esc_html__( 'Saint Kitts and Nevis', 'gftoandar' ),
				esc_html__( 'Saint Lucia', 'gftoandar' ),
				esc_html__( 'Saint Vincent and the Grenadines', 'gftoandar' ),
				esc_html__( 'Saint Martin', 'gftoandar' ),
				esc_html__( 'Samoa', 'gftoandar' ),
				esc_html__( 'San Marino', 'gftoandar' ),
				esc_html__( 'Sao Tome and Principe', 'gftoandar' ),
				esc_html__( 'Saudi Arabia', 'gftoandar' ),
				esc_html__( 'Senegal', 'gftoandar' ),
				esc_html__( 'Serbia', 'gftoandar' ),
				esc_html__( 'Seychelles', 'gftoandar' ),
				esc_html__( 'Sierra Leone', 'gftoandar' ),
				esc_html__( 'Singapore', 'gftoandar' ),
				esc_html__( 'Sint Maarten', 'gftoandar' ),
				esc_html__( 'Slovakia', 'gftoandar' ),
				esc_html__( 'Slovenia', 'gftoandar' ),
				esc_html__( 'Solomon Islands', 'gftoandar' ),
				esc_html__( 'Somalia', 'gftoandar' ),
				esc_html__( 'South Africa', 'gftoandar' ),
				esc_html__( 'Spain', 'gftoandar' ),
				esc_html__( 'Sri Lanka', 'gftoandar' ),
				esc_html__( 'Sudan', 'gftoandar' ),
				esc_html__( 'Sudan, South', 'gftoandar' ),
				esc_html__( 'Suriname', 'gftoandar' ),
				esc_html__( 'Swaziland', 'gftoandar' ),
				esc_html__( 'Sweden', 'gftoandar' ),
				esc_html__( 'Switzerland', 'gftoandar' ),
				esc_html__( 'Syria', 'gftoandar' ),
				esc_html__( 'Taiwan', 'gftoandar' ),
				esc_html__( 'Tajikistan', 'gftoandar' ),
				esc_html__( 'Tanzania', 'gftoandar' ),
				esc_html__( 'Thailand', 'gftoandar' ),
				esc_html__( 'Togo', 'gftoandar' ),
				esc_html__( 'Tonga', 'gftoandar' ),
				esc_html__( 'Trinidad and Tobago', 'gftoandar' ),
				esc_html__( 'Tunisia', 'gftoandar' ),
				esc_html__( 'Turkey', 'gftoandar' ),
				esc_html__( 'Turkmenistan', 'gftoandar' ),
				esc_html__( 'Tuvalu', 'gftoandar' ),
				esc_html__( 'Uganda', 'gftoandar' ),
				esc_html__( 'Ukraine', 'gftoandar' ),
				esc_html__( 'United Arab Emirates', 'gftoandar' ),
				esc_html__( 'United Kingdom', 'gftoandar' ),
				esc_html__( 'United States', 'gftoandar' ),
				esc_html__( 'Uruguay', 'gftoandar' ),
				esc_html__( 'Uzbekistan', 'gftoandar' ),
				esc_html__( 'Vanuatu', 'gftoandar' ),
				esc_html__( 'Vatican City', 'gftoandar' ),
				esc_html__( 'Venezuela', 'gftoandar' ),
				esc_html__( 'Vietnam', 'gftoandar' ),
				esc_html__( 'Virgin Islands, British', 'gftoandar' ),
				esc_html__( 'Virgin Islands, U.S.', 'gftoandar' ),
				esc_html__( 'Yemen', 'gftoandar' ),
				esc_html__( 'Zambia', 'gftoandar' ),
				esc_html__( 'Zimbabwe', 'gftoandar' ),
			)
		);
	}

	public function get_country_code( $country_name ) {
		$codes = $this->get_country_codes();

		return rgar( $codes, GFCommon::safe_strtoupper( $country_name ) );
	}

	public function get_country_codes() {
		$codes = array(
			esc_html__( 'AFGHANISTAN', 'gftoandar' )                       => 'AF',
			esc_html__( 'ALBANIA', 'gftoandar' )                           => 'AL',
			esc_html__( 'ALGERIA', 'gftoandar' )                           => 'DZ',
			esc_html__( 'AMERICAN SAMOA', 'gftoandar' )                    => 'AS',
			esc_html__( 'ANDORRA', 'gftoandar' )                           => 'AD',
			esc_html__( 'ANGOLA', 'gftoandar' )                            => 'AO',
			esc_html__( 'ANTIGUA AND BARBUDA', 'gftoandar' )               => 'AG',
			esc_html__( 'ARGENTINA', 'gftoandar' )                         => 'AR',
			esc_html__( 'ARMENIA', 'gftoandar' )                           => 'AM',
			esc_html__( 'AUSTRALIA', 'gftoandar' )                         => 'AU',
			esc_html__( 'AUSTRIA', 'gftoandar' )                           => 'AT',
			esc_html__( 'AZERBAIJAN', 'gftoandar' )                        => 'AZ',
			esc_html__( 'BAHAMAS', 'gftoandar' )                           => 'BS',
			esc_html__( 'BAHRAIN', 'gftoandar' )                           => 'BH',
			esc_html__( 'BANGLADESH', 'gftoandar' )                        => 'BD',
			esc_html__( 'BARBADOS', 'gftoandar' )                          => 'BB',
			esc_html__( 'BELARUS', 'gftoandar' )                           => 'BY',
			esc_html__( 'BELGIUM', 'gftoandar' )                           => 'BE',
			esc_html__( 'BELIZE', 'gftoandar' )                            => 'BZ',
			esc_html__( 'BENIN', 'gftoandar' )                             => 'BJ',
			esc_html__( 'BERMUDA', 'gftoandar' )                           => 'BM',
			esc_html__( 'BHUTAN', 'gftoandar' )                            => 'BT',
			esc_html__( 'BOLIVIA', 'gftoandar' )                           => 'BO',
			esc_html__( 'BOSNIA AND HERZEGOVINA', 'gftoandar' )            => 'BA',
			esc_html__( 'BOTSWANA', 'gftoandar' )                          => 'BW',
			esc_html__( 'BRAZIL', 'gftoandar' )                            => 'BR',
			esc_html__( 'BRUNEI', 'gftoandar' )                            => 'BN',
			esc_html__( 'BULGARIA', 'gftoandar' )                          => 'BG',
			esc_html__( 'BURKINA FASO', 'gftoandar' )                      => 'BF',
			esc_html__( 'BURUNDI', 'gftoandar' )                           => 'BI',
			esc_html__( 'CAMBODIA', 'gftoandar' )                          => 'KH',
			esc_html__( 'CAMEROON', 'gftoandar' )                          => 'CM',
			esc_html__( 'CANADA', 'gftoandar' )                            => 'CA',
			esc_html__( 'CAPE VERDE', 'gftoandar' )                        => 'CV',
			esc_html__( 'CAYMAN ISLANDS', 'gftoandar' )                    => 'KY',
			esc_html__( 'CENTRAL AFRICAN REPUBLIC', 'gftoandar' )          => 'CF',
			esc_html__( 'CHAD', 'gftoandar' )                              => 'TD',
			esc_html__( 'CHILE', 'gftoandar' )                             => 'CL',
			esc_html__( 'CHINA', 'gftoandar' )                             => 'CN',
			esc_html__( 'COLOMBIA', 'gftoandar' )                          => 'CO',
			esc_html__( 'COMOROS', 'gftoandar' )                           => 'KM',
			esc_html__( 'CONGO, DEMOCRATIC REPUBLIC OF THE', 'gftoandar' ) => 'CD',
			esc_html__( 'CONGO, REPUBLIC OF THE', 'gftoandar' )            => 'CG',
			esc_html__( 'COSTA RICA', 'gftoandar' )                        => 'CR',
			esc_html__( "CÔTE D'IVOIRE", 'gftoandar' )                     => 'CI',
			esc_html__( 'CROATIA', 'gftoandar' )                           => 'HR',
			esc_html__( 'CUBA', 'gftoandar' )                              => 'CU',
			esc_html__( 'CURAÇAO', 'gftoandar' )                           => 'CW',
			esc_html__( 'CYPRUS', 'gftoandar' )                            => 'CY',
			esc_html__( 'CZECH REPUBLIC', 'gftoandar' )                    => 'CZ',
			esc_html__( 'DENMARK', 'gftoandar' )                           => 'DK',
			esc_html__( 'DJIBOUTI', 'gftoandar' )                          => 'DJ',
			esc_html__( 'DOMINICA', 'gftoandar' )                          => 'DM',
			esc_html__( 'DOMINICAN REPUBLIC', 'gftoandar' )                => 'DO',
			esc_html__( 'EAST TIMOR', 'gftoandar' )                        => 'TL',
			esc_html__( 'ECUADOR', 'gftoandar' )                           => 'EC',
			esc_html__( 'EGYPT', 'gftoandar' )                             => 'EG',
			esc_html__( 'EL SALVADOR', 'gftoandar' )                       => 'SV',
			esc_html__( 'EQUATORIAL GUINEA', 'gftoandar' )                 => 'GQ',
			esc_html__( 'ERITREA', 'gftoandar' )                           => 'ER',
			esc_html__( 'ESTONIA', 'gftoandar' )                           => 'EE',
			esc_html__( 'ETHIOPIA', 'gftoandar' )                          => 'ET',
			esc_html__( 'FAROE ISLANDS', 'gftoandar' )                     => 'FO',
			esc_html__( 'FIJI', 'gftoandar' )                              => 'FJ',
			esc_html__( 'FINLAND', 'gftoandar' )                           => 'FI',
			esc_html__( 'FRANCE', 'gftoandar' )                            => 'FR',
			esc_html__( 'FRENCH POLYNESIA', 'gftoandar' )                  => 'PF',
			esc_html__( 'GABON', 'gftoandar' )                             => 'GA',
			esc_html__( 'GAMBIA', 'gftoandar' )                            => 'GM',
			esc_html( _x( 'GEORGIA', 'Country', 'gftoandar' ) )            => 'GE',
			esc_html__( 'GERMANY', 'gftoandar' )                           => 'DE',
			esc_html__( 'GHANA', 'gftoandar' )                             => 'GH',
			esc_html__( 'GREECE', 'gftoandar' )                            => 'GR',
			esc_html__( 'GREENLAND', 'gftoandar' )                         => 'GL',
			esc_html__( 'GRENADA', 'gftoandar' )                           => 'GD',
			esc_html__( 'GUAM', 'gftoandar' )                              => 'GU',
			esc_html__( 'GUATEMALA', 'gftoandar' )                         => 'GT',
			esc_html__( 'GUINEA', 'gftoandar' )                            => 'GN',
			esc_html__( 'GUINEA-BISSAU', 'gftoandar' )                     => 'GW',
			esc_html__( 'GUYANA', 'gftoandar' )                            => 'GY',
			esc_html__( 'HAITI', 'gftoandar' )                             => 'HT',
			esc_html__( 'HONDURAS', 'gftoandar' )                          => 'HN',
			esc_html__( 'HONG KONG', 'gftoandar' )                         => 'HK',
			esc_html__( 'HUNGARY', 'gftoandar' )                           => 'HU',
			esc_html__( 'ICELAND', 'gftoandar' )                           => 'IS',
			esc_html__( 'INDIA', 'gftoandar' )                             => 'IN',
			esc_html__( 'INDONESIA', 'gftoandar' )                         => 'ID',
			esc_html__( 'IRAN', 'gftoandar' )                              => 'IR',
			esc_html__( 'IRAQ', 'gftoandar' )                              => 'IQ',
			esc_html__( 'IRELAND', 'gftoandar' )                           => 'IE',
			esc_html__( 'ISRAEL', 'gftoandar' )                            => 'IL',
			esc_html__( 'ITALY', 'gftoandar' )                             => 'IT',
			esc_html__( 'JAMAICA', 'gftoandar' )                           => 'JM',
			esc_html__( 'JAPAN', 'gftoandar' )                             => 'JP',
			esc_html__( 'JORDAN', 'gftoandar' )                            => 'JO',
			esc_html__( 'KAZAKHSTAN', 'gftoandar' )                        => 'KZ',
			esc_html__( 'KENYA', 'gftoandar' )                             => 'KE',
			esc_html__( 'KIRIBATI', 'gftoandar' )                          => 'KI',
			esc_html__( 'NORTH KOREA', 'gftoandar' )                       => 'KP',
			esc_html__( 'SOUTH KOREA', 'gftoandar' )                       => 'KR',
			esc_html__( 'KOSOVO', 'gftoandar' )                            => 'KV',
			esc_html__( 'KUWAIT', 'gftoandar' )                            => 'KW',
			esc_html__( 'KYRGYZSTAN', 'gftoandar' )                        => 'KG',
			esc_html__( 'LAOS', 'gftoandar' )                              => 'LA',
			esc_html__( 'LATVIA', 'gftoandar' )                            => 'LV',
			esc_html__( 'LEBANON', 'gftoandar' )                           => 'LB',
			esc_html__( 'LESOTHO', 'gftoandar' )                           => 'LS',
			esc_html__( 'LIBERIA', 'gftoandar' )                           => 'LR',
			esc_html__( 'LIBYA', 'gftoandar' )                             => 'LY',
			esc_html__( 'LIECHTENSTEIN', 'gftoandar' )                     => 'LI',
			esc_html__( 'LITHUANIA', 'gftoandar' )                         => 'LT',
			esc_html__( 'LUXEMBOURG', 'gftoandar' )                        => 'LU',
			esc_html__( 'MACEDONIA', 'gftoandar' )                         => 'MK',
			esc_html__( 'MADAGASCAR', 'gftoandar' )                        => 'MG',
			esc_html__( 'MALAWI', 'gftoandar' )                            => 'MW',
			esc_html__( 'MALAYSIA', 'gftoandar' )                          => 'MY',
			esc_html__( 'MALDIVES', 'gftoandar' )                          => 'MV',
			esc_html__( 'MALI', 'gftoandar' )                              => 'ML',
			esc_html__( 'MALTA', 'gftoandar' )                             => 'MT',
			esc_html__( 'MARSHALL ISLANDS', 'gftoandar' )                  => 'MH',
			esc_html__( 'MAURITANIA', 'gftoandar' )                        => 'MR',
			esc_html__( 'MAURITIUS', 'gftoandar' )                         => 'MU',
			esc_html__( 'MEXICO', 'gftoandar' )                            => 'MX',
			esc_html__( 'MICRONESIA', 'gftoandar' )                        => 'FM',
			esc_html__( 'MOLDOVA', 'gftoandar' )                           => 'MD',
			esc_html__( 'MONACO', 'gftoandar' )                            => 'MC',
			esc_html__( 'MONGOLIA', 'gftoandar' )                          => 'MN',
			esc_html__( 'MONTENEGRO', 'gftoandar' )                        => 'ME',
			esc_html__( 'MOROCCO', 'gftoandar' )                           => 'MA',
			esc_html__( 'MOZAMBIQUE', 'gftoandar' )                        => 'MZ',
			esc_html__( 'MYANMAR', 'gftoandar' )                           => 'MM',
			esc_html__( 'NAMIBIA', 'gftoandar' )                           => 'NA',
			esc_html__( 'NAURU', 'gftoandar' )                             => 'NR',
			esc_html__( 'NEPAL', 'gftoandar' )                             => 'NP',
			esc_html__( 'NETHERLANDS', 'gftoandar' )                       => 'NL',
			esc_html__( 'NEW ZEALAND', 'gftoandar' )                       => 'NZ',
			esc_html__( 'NICARAGUA', 'gftoandar' )                         => 'NI',
			esc_html__( 'NIGER', 'gftoandar' )                             => 'NE',
			esc_html__( 'NIGERIA', 'gftoandar' )                           => 'NG',
			esc_html__( 'NORTHERN MARIANA ISLANDS', 'gftoandar' )          => 'MP',
			esc_html__( 'NORWAY', 'gftoandar' )                            => 'NO',
			esc_html__( 'OMAN', 'gftoandar' )                              => 'OM',
			esc_html__( 'PAKISTAN', 'gftoandar' )                          => 'PK',
			esc_html__( 'PALAU', 'gftoandar' )                             => 'PW',
			esc_html__( 'PALESTINE, STATE OF', 'gftoandar' )               => 'PS',
			esc_html__( 'PANAMA', 'gftoandar' )                            => 'PA',
			esc_html__( 'PAPUA NEW GUINEA', 'gftoandar' )                  => 'PG',
			esc_html__( 'PARAGUAY', 'gftoandar' )                          => 'PY',
			esc_html__( 'PERU', 'gftoandar' )                              => 'PE',
			esc_html__( 'PHILIPPINES', 'gftoandar' )                       => 'PH',
			esc_html__( 'POLAND', 'gftoandar' )                            => 'PL',
			esc_html__( 'PORTUGAL', 'gftoandar' )                          => 'PT',
			esc_html__( 'PUERTO RICO', 'gftoandar' )                       => 'PR',
			esc_html__( 'QATAR', 'gftoandar' )                             => 'QA',
			esc_html__( 'ROMANIA', 'gftoandar' )                           => 'RO',
			esc_html__( 'RUSSIA', 'gftoandar' )                            => 'RU',
			esc_html__( 'RWANDA', 'gftoandar' )                            => 'RW',
			esc_html__( 'SAINT KITTS AND NEVIS', 'gftoandar' )             => 'KN',
			esc_html__( 'SAINT LUCIA', 'gftoandar' )                       => 'LC',
			esc_html__( 'SAINT MARTIN', 'gftoandar' )					   => 'MF',
			esc_html__( 'SAINT VINCENT AND THE GRENADINES', 'gftoandar' )  => 'VC',
			esc_html__( 'SAMOA', 'gftoandar' )                             => 'WS',
			esc_html__( 'SAN MARINO', 'gftoandar' )                        => 'SM',
			esc_html__( 'SAO TOME AND PRINCIPE', 'gftoandar' )             => 'ST',
			esc_html__( 'SAUDI ARABIA', 'gftoandar' )                      => 'SA',
			esc_html__( 'SENEGAL', 'gftoandar' )                           => 'SN',
			esc_html__( 'SERBIA', 'gftoandar' )                            => 'RS',
			esc_html__( 'SEYCHELLES', 'gftoandar' )                        => 'SC',
			esc_html__( 'SIERRA LEONE', 'gftoandar' )                      => 'SL',
			esc_html__( 'SINGAPORE', 'gftoandar' )                         => 'SG',
			esc_html__( 'SINT MAARTEN', 'gftoandar' )                      => 'SX',
			esc_html__( 'SLOVAKIA', 'gftoandar' )                          => 'SK',
			esc_html__( 'SLOVENIA', 'gftoandar' )                          => 'SI',
			esc_html__( 'SOLOMON ISLANDS', 'gftoandar' )                   => 'SB',
			esc_html__( 'SOMALIA', 'gftoandar' )                           => 'SO',
			esc_html__( 'SOUTH AFRICA', 'gftoandar' )                      => 'ZA',
			esc_html__( 'SPAIN', 'gftoandar' )                             => 'ES',
			esc_html__( 'SRI LANKA', 'gftoandar' )                         => 'LK',
			esc_html__( 'SUDAN', 'gftoandar' )                             => 'SD',
			esc_html__( 'SUDAN, SOUTH', 'gftoandar' )                      => 'SS',
			esc_html__( 'SURINAME', 'gftoandar' )                          => 'SR',
			esc_html__( 'SWAZILAND', 'gftoandar' )                         => 'SZ',
			esc_html__( 'SWEDEN', 'gftoandar' )                            => 'SE',
			esc_html__( 'SWITZERLAND', 'gftoandar' )                       => 'CH',
			esc_html__( 'SYRIA', 'gftoandar' )                             => 'SY',
			esc_html__( 'TAIWAN', 'gftoandar' )                            => 'TW',
			esc_html__( 'TAJIKISTAN', 'gftoandar' )                        => 'TJ',
			esc_html__( 'TANZANIA', 'gftoandar' )                          => 'TZ',
			esc_html__( 'THAILAND', 'gftoandar' )                          => 'TH',
			esc_html__( 'TOGO', 'gftoandar' )                              => 'TG',
			esc_html__( 'TONGA', 'gftoandar' )                             => 'TO',
			esc_html__( 'TRINIDAD AND TOBAGO', 'gftoandar' )               => 'TT',
			esc_html__( 'TUNISIA', 'gftoandar' )                           => 'TN',
			esc_html__( 'TURKEY', 'gftoandar' )                            => 'TR',
			esc_html__( 'TURKMENISTAN', 'gftoandar' )                      => 'TM',
			esc_html__( 'TUVALU', 'gftoandar' )                            => 'TV',
			esc_html__( 'UGANDA', 'gftoandar' )                            => 'UG',
			esc_html__( 'UKRAINE', 'gftoandar' )                           => 'UA',
			esc_html__( 'UNITED ARAB EMIRATES', 'gftoandar' )              => 'AE',
			esc_html__( 'UNITED KINGDOM', 'gftoandar' )                    => 'GB',
			esc_html__( 'UNITED STATES', 'gftoandar' )                     => 'US',
			esc_html__( 'URUGUAY', 'gftoandar' )                           => 'UY',
			esc_html__( 'UZBEKISTAN', 'gftoandar' )                        => 'UZ',
			esc_html__( 'VANUATU', 'gftoandar' )                           => 'VU',
			esc_html__( 'VATICAN CITY', 'gftoandar' )                      => 'VA',
			esc_html__( 'VENEZUELA', 'gftoandar' )                         => 'VE',
			esc_html__( 'VIRGIN ISLANDS, BRITISH', 'gftoandar' )           => 'VG',
			esc_html__( 'VIRGIN ISLANDS, U.S.', 'gftoandar' )              => 'VI',
			esc_html__( 'VIETNAM', 'gftoandar' )                           => 'VN',
			esc_html__( 'YEMEN', 'gftoandar' )                             => 'YE',
			esc_html__( 'ZAMBIA', 'gftoandar' )                            => 'ZM',
			esc_html__( 'ZIMBABWE', 'gftoandar' )                          => 'ZW',
		);

		return $codes;
	}

	public function get_us_states() {
		if($this->useStateAbbr){
			return apply_filters(
				'gform_us_states', array(
					"AL" => "AL",
					"AK" => "AK",
					"AZ" => "AZ",
					"AR" => "AR",
					"CA" => "CA",
					"CO" => "CO",
					"CT" => "CT",
					"DE" => "DE",
					"DC" => "DC",
					"FL" => "FL",
					"GA" => "GA",
					"GU" => "GU",
					"HI" => "HI",
					"ID" => "ID",
					"IL" => "IL",
					"IN" => "IN",
					"IA" => "IA",
					"KS" => "KS",
					"KY" => "KY",
					"LA" => "LA",
					"ME" => "ME",
					"MD" => "MD",
					"MA" => "MA",
					"MI" => "MI",
					"MN" => "MN",
					"MS" => "MS",
					"MO" => "MO",
					"MT" => "MT",
					"NE" => "NE",
					"NV" => "NV",
					"NH" => "NH",
					"NJ" => "NJ",
					"NM" => "NM",
					"NY" => "NY",
					"NC" => "NC",
					"ND" => "ND",
					"OH" => "OH",
					"OK" => "OK",
					"OR" => "OR",
					"PA" => "PA",
					"PR" => "PR",
					"RI" => "RI",
					"SC" => "SC",
					"SD" => "SD",
					"TN" => "TN",
					"TX" => "TX",
					"UT" => "UT",
					"VT" => "VT",
					"VA" => "VA",
					"WA" => "WA",
					"WV" => "WV",
					"WI" => "WI",
					"WY" => "WY"
				)
			);
		} else {
			return apply_filters(
				'gform_us_states', array(
					"AL" => "Alabama",
					"AK" => "Alaska",
					"AZ" => "Arizona",
					"AR" => "Arkansas",
					"CA" => "California",
					"CO" => "Colorado",
					"CT" => "Connecticut",
					"DE" => "Delaware",
					"DC" => "District of Columbia",
					"FL" => "Florida",
					"GA" => "Georgia",
					"GU" => "Guam",
					"HI" => "Hawaii",
					"ID" => "Idaho",
					"IL" => "Illinois",
					"IN" => "Indiana",
					"IA" => "Iowa",
					"KS" => "Kansas",
					"KY" => "Kentucky",
					"LA" => "Louisiana",
					"ME" => "Maine",
					"MD" => "Maryland",
					"MA" => "Massachusetts",
					"MI" => "Michigan",
					"MN" => "Minnesota",
					"MS" => "Mississippi",
					"MO" => "Missouri",
					"MT" => "Montana",
					"NE" => "Nebraska",
					"NV" => "Nevada",
					"NH" => "New Hampshire",
					"NJ" => "New Jersey",
					"NM" => "New Mexico",
					"NY" => "New York",
					"NC" => "North Carolina",
					"ND" => "North Dakota",
					"OH" => "Ohio",
					"OK" => "Oklahoma",
					"OR" => "Oregon",
					"PA" => "Pennsylvania",
					"PR" => "Puerto Rico",
					"RI" => "Rhode Island",
					"SC" => "South Carolina",
					"SD" => "South Dakota",
					"TN" => "Tennessee",
					"TX" => "Texas",
					"UT" => "Utah",
					"VT" => "Vermont",
					"VA" => "Virginia",
					"WA" => "Washington",
					"WV" => "West Virginia",
					"WI" => "Wisconsin",
					"WY" => "Wyoming"
				)
			);
		}
	}

	public function get_us_state_code( $state_name ) {
		$states = array(
			GFCommon::safe_strtoupper( esc_html__( 'Alabama', 'gftoandar' ) )                 => 'AL',
			GFCommon::safe_strtoupper( esc_html__( 'Alaska', 'gftoandar' ) )                  => 'AK',
			GFCommon::safe_strtoupper( esc_html__( 'Arizona', 'gftoandar' ) )                 => 'AZ',
			GFCommon::safe_strtoupper( esc_html__( 'Arkansas', 'gftoandar' ) )                => 'AR',
			GFCommon::safe_strtoupper( esc_html__( 'California', 'gftoandar' ) )              => 'CA',
			GFCommon::safe_strtoupper( esc_html__( 'Colorado', 'gftoandar' ) )                => 'CO',
			GFCommon::safe_strtoupper( esc_html__( 'Connecticut', 'gftoandar' ) )             => 'CT',
			GFCommon::safe_strtoupper( esc_html__( 'Delaware', 'gftoandar' ) )                => 'DE',
			GFCommon::safe_strtoupper( esc_html__( 'District of Columbia', 'gftoandar' ) )    => 'DC',
			GFCommon::safe_strtoupper( esc_html__( 'Florida', 'gftoandar' ) )                 => 'FL',
			GFCommon::safe_strtoupper( esc_html( _x( 'Georgia', 'US State', 'gftoandar' ) ) ) => 'GA',
			GFCommon::safe_strtoupper( esc_html__( 'Hawaii', 'gftoandar' ) )                  => 'HI',
			GFCommon::safe_strtoupper( esc_html__( 'Idaho', 'gftoandar' ) )                   => 'ID',
			GFCommon::safe_strtoupper( esc_html__( 'Illinois', 'gftoandar' ) )                => 'IL',
			GFCommon::safe_strtoupper( esc_html__( 'Indiana', 'gftoandar' ) )                 => 'IN',
			GFCommon::safe_strtoupper( esc_html__( 'Iowa', 'gftoandar' ) )                    => 'IA',
			GFCommon::safe_strtoupper( esc_html__( 'Kansas', 'gftoandar' ) )                  => 'KS',
			GFCommon::safe_strtoupper( esc_html__( 'Kentucky', 'gftoandar' ) )                => 'KY',
			GFCommon::safe_strtoupper( esc_html__( 'Louisiana', 'gftoandar' ) )               => 'LA',
			GFCommon::safe_strtoupper( esc_html__( 'Maine', 'gftoandar' ) )                   => 'ME',
			GFCommon::safe_strtoupper( esc_html__( 'Maryland', 'gftoandar' ) )                => 'MD',
			GFCommon::safe_strtoupper( esc_html__( 'Massachusetts', 'gftoandar' ) )           => 'MA',
			GFCommon::safe_strtoupper( esc_html__( 'Michigan', 'gftoandar' ) )                => 'MI',
			GFCommon::safe_strtoupper( esc_html__( 'Minnesota', 'gftoandar' ) )               => 'MN',
			GFCommon::safe_strtoupper( esc_html__( 'Mississippi', 'gftoandar' ) )             => 'MS',
			GFCommon::safe_strtoupper( esc_html__( 'Missouri', 'gftoandar' ) )                => 'MO',
			GFCommon::safe_strtoupper( esc_html__( 'Montana', 'gftoandar' ) )                 => 'MT',
			GFCommon::safe_strtoupper( esc_html__( 'Nebraska', 'gftoandar' ) )                => 'NE',
			GFCommon::safe_strtoupper( esc_html__( 'Nevada', 'gftoandar' ) )                  => 'NV',
			GFCommon::safe_strtoupper( esc_html__( 'New Hampshire', 'gftoandar' ) )           => 'NH',
			GFCommon::safe_strtoupper( esc_html__( 'New Jersey', 'gftoandar' ) )              => 'NJ',
			GFCommon::safe_strtoupper( esc_html__( 'New Mexico', 'gftoandar' ) )              => 'NM',
			GFCommon::safe_strtoupper( esc_html__( 'New York', 'gftoandar' ) )                => 'NY',
			GFCommon::safe_strtoupper( esc_html__( 'North Carolina', 'gftoandar' ) )          => 'NC',
			GFCommon::safe_strtoupper( esc_html__( 'North Dakota', 'gftoandar' ) )            => 'ND',
			GFCommon::safe_strtoupper( esc_html__( 'Ohio', 'gftoandar' ) )                    => 'OH',
			GFCommon::safe_strtoupper( esc_html__( 'Oklahoma', 'gftoandar' ) )                => 'OK',
			GFCommon::safe_strtoupper( esc_html__( 'Oregon', 'gftoandar' ) )                  => 'OR',
			GFCommon::safe_strtoupper( esc_html__( 'Pennsylvania', 'gftoandar' ) )            => 'PA',
			GFCommon::safe_strtoupper( esc_html__( 'Rhode Island', 'gftoandar' ) )            => 'RI',
			GFCommon::safe_strtoupper( esc_html__( 'South Carolina', 'gftoandar' ) )          => 'SC',
			GFCommon::safe_strtoupper( esc_html__( 'South Dakota', 'gftoandar' ) )            => 'SD',
			GFCommon::safe_strtoupper( esc_html__( 'Tennessee', 'gftoandar' ) )               => 'TN',
			GFCommon::safe_strtoupper( esc_html__( 'Texas', 'gftoandar' ) )                   => 'TX',
			GFCommon::safe_strtoupper( esc_html__( 'Utah', 'gftoandar' ) )                    => 'UT',
			GFCommon::safe_strtoupper( esc_html__( 'Vermont', 'gftoandar' ) )                 => 'VT',
			GFCommon::safe_strtoupper( esc_html__( 'Virginia', 'gftoandar' ) )                => 'VA',
			GFCommon::safe_strtoupper( esc_html__( 'Washington', 'gftoandar' ) )              => 'WA',
			GFCommon::safe_strtoupper( esc_html__( 'West Virginia', 'gftoandar' ) )           => 'WV',
			GFCommon::safe_strtoupper( esc_html__( 'Wisconsin', 'gftoandar' ) )               => 'WI',
			GFCommon::safe_strtoupper( esc_html__( 'Wyoming', 'gftoandar' ) )                 => 'WY',
			GFCommon::safe_strtoupper( esc_html__( 'Armed Forces Americas', 'gftoandar' ) )   => 'AA',
			GFCommon::safe_strtoupper( esc_html__( 'Armed Forces Europe', 'gftoandar' ) )     => 'AE',
			GFCommon::safe_strtoupper( esc_html__( 'Armed Forces Pacific', 'gftoandar' ) )    => 'AP',
		);

		$state_name = GFCommon::safe_strtoupper( $state_name );
		$code       = isset( $states[ $state_name ] ) ? $states[ $state_name ] : $state_name;

		return $code;
	}

	public function get_canadian_provinces() {
		return array( esc_html__( 'Alberta', 'gftoandar' ), esc_html__( 'British Columbia', 'gftoandar' ), esc_html__( 'Manitoba', 'gftoandar' ), esc_html__( 'New Brunswick', 'gftoandar' ), esc_html__( 'Newfoundland & Labrador', 'gftoandar' ), esc_html__( 'Northwest Territories', 'gftoandar' ), esc_html__( 'Nova Scotia', 'gftoandar' ), esc_html__( 'Nunavut', 'gftoandar' ), esc_html__( 'Ontario', 'gftoandar' ), esc_html__( 'Prince Edward Island', 'gftoandar' ), esc_html__( 'Quebec', 'gftoandar' ), esc_html__( 'Saskatchewan', 'gftoandar' ), esc_html__( 'Yukon', 'gftoandar' ) );

	}

	public function get_state_dropdown( $states, $selected_state = '', $placeholder = '' ) {
		$str = '';
		foreach ( $states as $code => $state ) {
			if ( is_array( $state ) ) {
				$str .= sprintf( '<optgroup label="%1$s">%2$s</optgroup>', esc_attr( $code ), $this->get_state_dropdown( $state, $selected_state, $placeholder ) );
			} else {
				if ( is_numeric( $code ) ) {
					$code = $state;
				}
				if ( empty( $state ) ) {
					$state = $placeholder;
				}

				$str .= $this->get_select_option( $code, $state, $selected_state );
			}
		}

		return $str;
	}

	/**
	 * Returns the option tag for the current choice.
	 *
	 * @param string $value The choice value.
	 * @param string $label The choice label.
	 * @param string $selected_value The value for the selected choice.
	 *
	 * @return string
	 */
	public function get_select_option( $value, $label, $selected_value ) {
		$selected = $value == $selected_value ? "selected='selected'" : '';

		return sprintf( "<option value='%s' %s>%s</option>", esc_attr( $value ), $selected, esc_html( $label ) );
	}

	public function get_us_state_dropdown( $selected_state = '' ) {
		$states = array_merge( array( '' ), $this->get_us_states() );
		$str    = '';
		foreach ( $states as $code => $state ) {
			if ( is_numeric( $code ) ) {
				$code = $state;
			}
			$code = get_us_state_code(GFCommon::safe_strtoupper($state));
			
			$selected = $code == $selected_state ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $code ) . "' $selected>" . esc_html( $state ) . '</option>';
		}
		
		return $str;
	}

	public function get_canadian_provinces_dropdown( $selected_province = '' ) {
		$states = array_merge( array( '' ), $this->get_canadian_provinces() );
		$str    = '';
		foreach ( $states as $state ) {
			$selected = $state == $selected_province ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $state ) . "' $selected>" . esc_html( $state ) . '</option>';
		}

		return $str;
	}

	public function get_country_dropdown( $selected_country = '', $placeholder = '' ) {
		$str       = '';
		$selected_country = strtolower( $selected_country );
		$countries = array_merge( array( '' ), $this->get_countries() );
		foreach ( $countries as $code => $country ) {
			
			if ( empty( $country ) ) {
				$country = $placeholder;
			}
            $code = $this->get_country_code($country);
			$selected = strtolower( $code ) == $selected_country ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $code ) . "' $selected>" . esc_html( $country ) . '</option>';
		}

		return $str;
	}

	public function get_value_entry_detail( $value, $currency = '', $use_text = false, $format = 'html', $media = 'screen' ) {

		if ( is_array( $value ) ) {
			$street_value  = trim( rgget( $this->id . '.1', $value ) );
			$street2_value = trim( rgget( $this->id . '.2', $value ) );
			$city_value    = trim( rgget( $this->id . '.3', $value ) );
			$state_value   = trim( rgget( $this->id . '.4', $value ) );
			$zip_value     = trim( rgget( $this->id . '.5', $value ) );
			$country_value = trim( rgget( $this->id . '.6', $value ) );
			$andartype_value = trim( rgget( $this->id . '.7', $value ) );

			if ( $format === 'html' ) {
				$street_value  = esc_html( $street_value );
				$street2_value = esc_html( $street2_value );
				$city_value    = esc_html( $city_value );
				$state_value   = esc_html( $state_value );
				$zip_value     = esc_html( $zip_value );
				$country_value = esc_html( $country_value );
				$andartype_value = esc_html( $andartype_value );

				$line_break = '<br />';
			} else {
				$line_break = "\n";
			}

			/**
			 * Filters the format that the address is displayed in.
			 *
			 * @since Unknown
			 *
			 * @param string           'default' The format to use. Defaults to 'default'.
			 * @param GF_Field_Address $this     An instance of the GF_Field_Address object.
			 */
			$address_display_format = apply_filters( 'gform_address_display_format', 'default', $this );
			if ( $address_display_format == 'zip_before_city' ) {
				/*
                Sample:
                3333 Some Street
                suite 16
                2344 City, State
                Country
                */

				$addr_ary   = array();
				$addr_ary[] = $street_value;

				if ( ! empty( $street2_value ) ) {
					$addr_ary[] = $street2_value;
				}

				$zip_line = trim( $zip_value . ' ' . $city_value );
				$zip_line .= ! empty( $zip_line ) && ! empty( $state_value ) ? ", {$state_value}" : $state_value;
				$zip_line = trim( $zip_line );
				if ( ! empty( $zip_line ) ) {
					$addr_ary[] = $zip_line;
				}

				if ( ! empty( $country_value ) ) {
					$addr_ary[] = $country_value;
				}
                
				if ( ! empty( $andartype_value ) ) {
					$addr_ary[] = $andartype_value;
				}                

				$address = implode( '<br />', $addr_ary );

			} else {
				$address = $street_value;
				$address .= ! empty( $address ) && ! empty( $street2_value ) ? $line_break . $street2_value : $street2_value;
				$address .= ! empty( $address ) && ( ! empty( $city_value ) || ! empty( $state_value ) ) ? $line_break . $city_value : $city_value;
				$address .= ! empty( $address ) && ! empty( $city_value ) && ! empty( $state_value ) ? ", $state_value" : $state_value;
				$address .= ! empty( $address ) && ! empty( $zip_value ) ? " $zip_value" : $zip_value;
				$address .= ! empty( $address ) && ! empty( $country_value ) ? $line_break . $country_value : $country_value;
				$address .= ! empty( $address ) && ! empty( $andartype_value ) ? $line_break . $andartype_value : $andartype_value;
			}

			// Adding map link.
			/**
			 * Disables the Google Maps link from displaying in the address field.
			 *
			 * @since 1.9
			 *
			 * @param bool false Determines if the map link should be disabled. Set to true to disable. Defaults to false.
			 */
			$map_link_disabled = apply_filters( 'gform_disable_address_map_link', false );
			if ( ! empty( $address ) && $format == 'html' && ! $map_link_disabled ) {
				$address_qs = str_replace( $line_break, ' ', $address ); //replacing <br/> and \n with spaces
				$address_qs = urlencode( $address_qs );
				$address .= "<br/><a href='http://maps.google.com/maps?q={$address_qs}' target='_blank' class='map-it-link'>Map It</a>";
			}

			return $address;
		} else {
			return '';
		}
	}

	public function get_input_property( $input_id, $property_name ) {
		$input = GFFormsModel::get_input( $this, $input_id );

		return rgar( $input, $property_name );
	}

	public function sanitize_settings() {
		parent::sanitize_settings();
		if ( $this->addressType ) {
			$this->addressType = wp_strip_all_tags( $this->addressType );
		}

		if ( $this->defaultCountry ) {
			$this->defaultCountry = wp_strip_all_tags( $this->defaultCountry );
		}

		if ( $this->defaultProvince ) {
			$this->defaultProvince = wp_strip_all_tags( $this->defaultProvince );
		}

	}

	public function get_value_export( $entry, $input_id = '', $use_text = false, $is_csv = false ) {
		if ( empty( $input_id ) ) {
			$input_id = $this->id;
		}

		if ( absint( $input_id ) == $input_id ) {
			$street_value  = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.1' ) ) );
			$street2_value = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.2' ) ) );
			$city_value    = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.3' ) ) );
			$state_value   = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.4' ) ) );
			$zip_value     = trim( rgar( $entry, $input_id . '.5' ) );
			$country_value = $this->get_country_code( trim( rgar( $entry, $input_id . '.6' ) ) );
            $andartype_value   = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.7' ) ) );

			$address = $street_value;
			$address .= ! empty( $address ) && ! empty( $street2_value ) ? "  $street2_value" : $street2_value;
			$address .= ! empty( $address ) && ( ! empty( $city_value ) || ! empty( $state_value ) ) ? ", $city_value," : $city_value;
			$address .= ! empty( $address ) && ! empty( $city_value ) && ! empty( $state_value ) ? "  $state_value" : $state_value;
			$address .= ! empty( $address ) && ! empty( $zip_value ) ? "  $zip_value," : $zip_value;
			$address .= ! empty( $address ) && ! empty( $country_value ) ? "  $country_value" : $country_value;
			$address .= ! empty( $address ) && ! empty( $andartype_value ) ? "  $andartype_value" : $andartype_value;

			return $address;
		} else {

			return rgar( $entry, $input_id );
		}
	}
}

GF_Fields::register( new Andar_Address_Field() );
