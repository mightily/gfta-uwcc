<?php

GFForms::include_addon_framework();

class GFtoAndar extends GFAddOn {

	protected $_version = GF_SIMPLE_ADDON_VERSION;
	protected $_min_gravityforms_version = '1.9';
	protected $_slug = 'gravityforms-to-andar';
	protected $_path = 'gravityforms-to-andar/gftoandar.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Gravity Forms to Andar';
	protected $_short_title = 'GF to Andar';

	protected $andar_alt_selector = null;
	protected $andar_honoree = [];
	protected $andar_headers = [];
	protected $andar_data = [];
	protected $andar_parameters = [];
	protected $andar_headers_string = '';
	protected $andar_data_string = '';
	protected $andar_parameters_string = '';
	protected $andar_data_new = [];
	protected $andar_response = '';

    protected $form_instance = null;
    protected $cybersource_response = null;
    protected $payment_type = null;
	protected $payment_type_code = null;
	protected $payment_frequency = 'Y';
	protected $payment_start_date = null;
	protected $payment_total = 0;
	protected $payment_total_use_org_headers = false;

	private static $_instance = null;

	/**
	 * Get an instance of this class.
	 *
	 * @return GFtoAndar
	 */
	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new GFtoAndar();
		}
		return self::$_instance;
	}

	/**
	 * Handles hooks and loading of language files.
	 */
	public function init() {
		parent::init();
		add_filter( 'gform_submit_button', array( $this, 'form_submit_button' ), 10, 2 );
		add_action( 'gform_after_submission', array( $this, 'after_submission' ), 10, 2 );
		add_action( 'gform_pre_submission', array( $this, 'pre_submission' ), 10, 2 );
		add_filter( 'gform_validation', array( $this, 'after_validation' ) );
        add_action( 'gform_enqueue_scripts', array( $this, 'enqueue_custom_script' ), 20, 2 );
        add_filter( 'gform_field_css_class', array( $this, 'modify_classes' ), 10, 3);
	}

    function modify_classes($classes, $field, $form){
        $new_class = strtolower($field['label']);
        $new_class = str_replace(' ', '-', $new_class);
        $classes = $classes . ' autofill-'.$new_class;
        return $classes;
    }
	// # SCRIPTS & STYLES -----------------------------------------------------------------------------------------------

	/**
	 * Return the scripts which should be enqueued.
	 *
	 * @return array
	 */
    function enqueue_custom_script( $form, $is_ajax ) {
        wp_enqueue_script('jquery');
		wp_enqueue_script('gf-to-andar-js', $this->get_base_url() . '/js/scripts.js', 'jquery', true);
		wp_localize_script('gf-to-andar-js', 'gftoandarurls', array( 'siteurl' => get_home_url() ));		
		wp_enqueue_style('gf-to-andar-css', $this->get_base_url() . '/css/styles.css');
    }


	// # FRONTEND FUNCTIONS --------------------------------------------------------------------------------------------

	/**
	 * Add the text in the plugin settings to the bottom of the form if enabled for this form.
	 *
	 * @param string $button The string containing the input tag to be filtered.
	 * @param array $form The form currently being displayed.
	 *
	 * @return string
	 */
	function form_submit_button( $button, $form ) {
		$settings = $this->get_form_settings( $form );
		if ( isset( $settings['enabled'] ) && true == $settings['enabled'] ) {
			$text   = $this->get_plugin_setting( 'andarApiUrl' );
			$button = "<div>{$text}</div>" . $button;
		}

		return $button;
	}


	// # ADMIN FUNCTIONS -----------------------------------------------------------------------------------------------


	/**
	 * Configures the settings which should be rendered on the add-on settings tab.
	 *
	 * @return array
	 */
	public function plugin_settings_fields() {
		return array(
			array(
				'title'  => esc_html__( 'Gravity Forms to Andar Settings', 'gftoandar' ),
				'fields' => array(
					array(
						'name'              => 'andarApiUrl',
						'tooltip'           => esc_html__( 'Endpoint for the Andar API. Should follow the pattern https://domain.com/rest/cie.', 'gftoandar' ),
						'label'             => esc_html__( 'Andar API URL', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'andarApiRetrieveUrl',
						'tooltip'           => esc_html__( 'Endpoint for the Andar Retrieve API. Should follow the pattern https://domain.com/rest/retrieve.', 'gftoandar' ),
						'label'             => esc_html__( 'Andar API Retrieve URL', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'andarApiKey',
						'tooltip'           => esc_html__( 'Key for accessing Andar API.', 'gftoandar' ),
						'label'             => esc_html__( 'Andar API Key', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'testandarApiUrl',
						'tooltip'           => esc_html__( 'Test Endpoint for the Andar API. Should follow the pattern https://domain.com/rest/cie.', 'gftoandar' ),
						'label'             => esc_html__( 'Test Andar API URL', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'testandarApiRetrieveUrl',
						'tooltip'           => esc_html__( 'Test Endpoint for the Andar Retrieve API. Should follow the pattern https://domain.com/rest/retrieve.', 'gftoandar' ),
						'label'             => esc_html__( 'Test Andar API Retrieve URL', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'testandarApiKey',
						'label'             => esc_html__( 'Test Andar API Key', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'cybersourceMerchantId',
						'label'             => esc_html__( 'Cybersource Merchant ID', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'cybersourceTransactionKeyProd',
						'label'             => esc_html__( 'Production Cybersource Transaction Key', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'cybersourceWSDLURLProd',
						'label'             => esc_html__( 'Production Cybersource WSDL URL', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'cybersourceTransactionKeyTest',
						'label'             => esc_html__( 'Test Cybersource Transaction Key', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
					array(
						'name'              => 'cybersourceWSDLURLTest',
						'label'             => esc_html__( 'Test Cybersource WSDL URL', 'gftoandar' ),
						'type'              => 'text',
						'class'             => 'small',
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					)
				)
			)
		);
	}

	/**
	 * Configures the settings which should be rendered on the Form Settings > GF to Andar tab.
	 *
	 * @return array
	 */
	public function form_settings_fields($form) {
		// print_r('Fields Here');
		$form_fields = array();
		$setting_fields = array();
		$form   = $this->get_current_form();
		$fields = $form['fields'];
		$current_settings = $this->get_form_settings($form);
		$andar_account_field_present = false;
        $address_field_present = false;
        $credit_card_field_present = false;
		// Make sure some fields are present in the form before we give the options to configure them.
        foreach($fields as $field){
            if($field['type'] == 'andaraccount'){
                $andar_account_field_present = true;
            }
            if($field['type'] == 'andaraddress'){
                $address_field_present = true;
            }
            if($field['type'] == 'creditcard'){
                $credit_card_field_present = true;
            }
        }

		array_push($setting_fields,
			array(
				'label' => '',
				'type'  => 'description',
				'name'  => 'description'
			)
		);

		array_push($setting_fields,
			array(
				'label'   => esc_html__('Debug Mode', 'gftoandar' ),
				'type'    => 'select',
				'name'    => 'debug_mode',
				'tooltip' => esc_html__('Enabling this will display responses from Andar and Cybersource after form submission.' , 'gftoandar' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'No', 'gftoandar' ),
						'value'  => 'No',
					),
					array(
						'label' => esc_html__( 'Yes', 'gftoandar' ),
						'value'  => 'Yes',
					)
				),
			)
		);

		if($andar_account_field_present){
			$alt_selector_field_id = false;
			$alt_header_selector_options = array(
				array(
					'label' => 'Please Select',
					'value' => 0				
				)
			);
			$alt_header_selector_values = array(
				array(
					'label' => 'Please Select',
					'value' => 0				
				)
			);			
			if(isset($current_settings['alt_header_selector']) && $current_settings['alt_header_selector'] != '' && $current_settings['alt_header_selector'] != 0){
				$alt_selector_field_id = $current_settings['alt_header_selector'];
			}
			foreach($form['fields'] as $alt_field){
				if($alt_field['type'] == 'radio' || $alt_field['type'] == 'select'){
					$alt_header_selector_options[] = array(
						'label' => $alt_field['label'],
						'value' => $alt_field['id']
					);
				}
				// Create the options for the alternate selector values to choose from based on the id of the alternate
				if($alt_selector_field_id){
					if($alt_field['id'] == $alt_selector_field_id){
						if(isset($alt_field['choices'])){
							foreach($alt_field['choices'] as $alt_choice){
								$alt_header_selector_values[] = array(
									'label' => $alt_choice['text'],
									'value' => $alt_choice['value']								
								);
							}
						}
					}
				}
			}			
			array_push($setting_fields,
				array(
					'label'   => esc_html__('Sync with Andar', 'gftoandar' ),
					'type'    => 'select',
					'name'    => 'andar_sync',
					'tooltip' => esc_html__('Integrate this form with Andar.' , 'gftoandar' ),
					'choices' => array(
						array(
							'label' => esc_html__( 'No', 'gftoandar' ),
							'value'  => 'No',
						),
						array(
							'label' => esc_html__( 'Yes', 'gftoandar' ),
							'value'  => 'Yes',
						)
					),
				),
				array(
					'label'   => esc_html__('Andar Environment', 'gftoandar' ),
					'type'    => 'select',
					'name'    => 'andar_environment',
					'tooltip' => esc_html__('Sync data with the production or test environment.' , 'gftoandar' ),
					'choices' => array(
						array(
							'label' => esc_html__( 'Test', 'gftoandar' ),
							'value'  => 'Test',
						),
						array(
							'label' => esc_html__( 'Production', 'gftoandar' ),
							'value'  => 'Production',
						)
					),
				),
				array(
					'label'   => esc_html__('Alternate Header Selector Field (Optional)', 'gftoandar' ),
					'type'    => 'select',
					'name'    => 'alt_header_selector',
					'tooltip' => esc_html__('Choose a field that will determine if the main Andar Header or Alternate Andar Header Should be used to sync data. Save your choice after making a selection in order to select a value.' , 'gftoandar' ),
					'choices' => $alt_header_selector_options
				)				
			);
			if($alt_selector_field_id){
				array_push($setting_fields,
					array(
						'label'   => esc_html__('Alternate Header Selector Value', 'gftoandar' ),
						'type'    => 'select',
						'name'    => 'alt_header_selector_value',
						'tooltip' => esc_html__('If the user selects the following value, the alternate header will be used.' , 'gftoandar' ),
						'choices' => $alt_header_selector_values
					),
				);
			}
			// Build the initial array of fields from the form that the user has created
			foreach($form['fields'] as $field){
				if($field['type'] != 'page' && $field['type'] != 'andaraccount' && $field['type'] != 'andaraddress' && $field['type'] != 'creditcard'){
					// If type is address
					if($field['type'] == 'address'){
						foreach($field->inputs as $sub_field){
							$form_fields[$sub_field['id']] = array(
								'id' => $sub_field['id'],
								'label' => $field->label.' '.$sub_field['label'],
							);
						}
					} elseif($field['type'] == 'somethingelse'){

					} else {
						$form_fields[$field->id] = array(
							'id' => $field->id,
							'label' => $field->label
						);
					}
				}
				if($field['type'] == 'andaraddress' && isset($current_settings['override_address']) && $current_settings['override_address'] == 1){
					foreach($field->inputs as $sub_field){
						$form_fields[$sub_field['id']] = array(
							'id' => $sub_field['id'],
							'label' => $field->label.' '.$sub_field['label'],
						);
					}
				}
				if($field['type'] == 'andaraccount' && isset($current_settings['override_account']) && $current_settings['override_account'] == 1){
					foreach($field->inputs as $sub_field){
						$form_fields[$sub_field['id']] = array(
							'id' => $sub_field['id'],
							'label' => $field->label.' '.$sub_field['label'],
						);
					}
				}				
			}
		}
		// Add the field to check if we should call the cybersource api
        if($address_field_present && $credit_card_field_present){
            array_push($setting_fields,
                array(
                    'label'   => esc_html__('Cybersource', 'gftoandar' ),
                    'type'    => 'checkbox',
                    'name'    => 'send_to_cybersource',
                    'tooltip' => esc_html__('Pass payment data to Cybersource to charge credit card.' , 'gftoandar' ),
                    'choices' => array(
                        array(
                            'label' => esc_html__( 'Pass payment fields to Cybersource?', 'gftoandar' ),
                            'name'  => 'send_to_cybersource',
                        ),
                    ),
                )
            );
            array_push($setting_fields,
                array(
                    'label'   => esc_html__('Transaction Mode', 'gftoandar' ),
                    'type'    => 'select',
                    'name'    => 'cybersource_transaction_mode',
//                    'choices' => array(
//                        array(
//                            'label' => esc_html__( 'Process payments in production mode?', 'gftoandar' ),
//                            'name'  => 'cybersource_transaction_mode',
//                        ),
//                    ),
					'choices' => array(
						array(
							'label' => esc_html__( 'Test', 'gftoandar' ),
							'value'  => 'Test',
						),
						array(
							'label' => esc_html__( 'Production', 'gftoandar' ),
							'value'  => 'Production',
						)
					)
                )
            );
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Campaign Year', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'campaign_year',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Campaign Account', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'campaign_account',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Master Account', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'master_account',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Processing Account', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'processing_account',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Fundraising Account', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'fundraising_account',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Book Number', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'book_number',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);
			array_push($setting_fields,
				array(
					'label'             => esc_html__( 'Source Code', 'gftoandar' ),
					'type'              => 'text',
					'name'              => 'source_code',
					'class'             => 'medium',
					// 'feedback_callback' => array( $this, 'is_valid_setting' ),
				)
			);						
		}
		array_push($setting_fields,
			array(
				'label'   => esc_html__('Payment Only', 'gftoandar' ),
				'type'    => 'checkbox',
				'name'    => 'payment_only',
				'tooltip' => esc_html__('Pass this transaction as a payment only, preventing the pledge amount header from being used.' , 'gftoandar' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Pass transaction as payment instead of pledge?', 'gftoandar' ),
						'name'  => 'payment_only',
					),
				),
			)
		);
		array_push($setting_fields,
			array(
				'label'   => esc_html__('Override Account Headers', 'gftoandar' ),
				'type'    => 'checkbox',
				'name'    => 'override_account',
				'tooltip' => esc_html__('This setting allows for overriding the default andar account headers so that different headers may be used for the account values.' , 'gftoandar' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Override Account Headers?', 'gftoandar' ),
						'name'  => 'override_account',
					),
				),
			)
		);		
		array_push($setting_fields,
			array(
				'label'   => esc_html__('Override Address Headers', 'gftoandar' ),
				'type'    => 'checkbox',
				'name'    => 'override_address',
				'tooltip' => esc_html__('This setting allows for overriding the default andar address headers so that different headers may be used for the address values.' , 'gftoandar' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Override Address Headers?', 'gftoandar' ),
						'name'  => 'override_address',
					),
				),
			)
		);				
		array_push($setting_fields,
			array(
				'label' => '',
				'type'  => 'hrule',
				'name'  => 'hrule'
			)
		);
		// End cybersource api fields
		foreach($form_fields as $setting_field){
            // If id has '.' we need to replace it with '--'
            $setting_id = (string)$setting_field['id'];
            $setting_id = str_replace('.', '--', $setting_id);
			// Field for checkbox
			array_push($setting_fields,
				array(
					'label'   => esc_html__( $setting_field['label'] , 'gftoandar' ),
					'type'    => 'checkbox',
					'name'    => 'sync_' . $setting_id,
					'tooltip' => esc_html__( $setting_field['label'] . ' field was added to the form. Configure how it syncs with Andar using these settings.' , 'gftoandar' ),
					'choices' => array(
						array(
							'label' => esc_html__( 'Sync '. $setting_field['label'] . ' Field?', 'gftoandar' ),
							'name'  => 'sync_' . $setting_id,
						),
					),
				)
			);
			// Field for andar dropdown
			array_push($setting_fields,
				array(
					'label'   => esc_html__( 'Sync to Andar Field', 'gftoandar' ),
					'type'    => 'select',
					'name'    => 'andar_choice_' . $setting_id,
					'choices' => andar_field_list()
				)
			);
			// Field for organization andar dropdown
			array_push($setting_fields,
				array(
					'label'   => esc_html__( 'Sync to Alternate Andar Field', 'gftoandar' ),
					'type'    => 'select',
					'name'    => 'alt_andar_choice_' . $setting_id,
					'choices' => andar_field_list()
				)
			);			
			// Field for <hr> break
			array_push($setting_fields,
				array(
					'label' => '',
					'type'  => 'hrule',
					'name'  => 'hrule'
				)
			);
		}
		// Loop through our array of fields and add the needed data for our config fields. Need a checkbox to enable andar sync, and dropdown to choose which andar field to sync to.
		return array(
			array(
				'title' => esc_html__( 'Andar Sync Settings', 'gftoandar' ),
				'fields' => $setting_fields
			)
		);

	}

	/**
	 * Define the markup for the my_custom_field_type type field.
	 *
	 * @param array $field The field properties.
	 * @param bool|true $echo Should the setting markup be echoed.
	 */
	public function settings_hrule( $field, $echo = true ) {
		echo '<div><hr /></div>';
	}

	public function settings_description( $field, $echo = true ) {
		echo '<div style="max-width: 600px;">Use the options below to configure how form data is sent to Andar. There must be one Andar Account field in the form in order to use this feature. If you do not see any configuration options available on this screen, check your form to be certain there is an Andar Account field and re-save your form.</div>';
	}


	// # SIMPLE CONDITION EXAMPLE --------------------------------------------------------------------------------------

	/**
	 * Define the markup for the custom_logic_type type field.
	 *
	 * @param array $field The field properties.
	 * @param bool|true $echo Should the setting markup be echoed.
	 */
	public function settings_custom_logic_type( $field, $echo = true ) {

		// Get the setting name.
		$name = $field['name'];

		// Define the properties for the checkbox to be used to enable/disable access to the simple condition settings.
		$checkbox_field = array(
			'name'    => $name,
			'type'    => 'checkbox',
			'choices' => array(
				array(
					'label' => esc_html__( 'Enabled', 'gftoandar' ),
					'name'  => $name . '_enabled',
				),
			),
			'onclick' => "if(this.checked){jQuery('#{$name}_condition_container').show();} else{jQuery('#{$name}_condition_container').hide();}",
		);

		// Determine if the checkbox is checked, if not the simple condition settings should be hidden.
		$is_enabled      = $this->get_setting( $name . '_enabled' ) == '1';
		$container_style = ! $is_enabled ? "style='display:none;'" : '';

		// Put together the field markup.
		$str = sprintf( "%s<div id='%s_condition_container' %s>%s</div>",
			$this->settings_checkbox( $checkbox_field, false ),
			$name,
			$container_style,
			$this->simple_condition( $name )
		);

		echo $str;
	}

	/**
	 * Build an array of choices containing fields which are compatible with conditional logic.
	 *
	 * @return array
	 */
	public function get_conditional_logic_fields() {
		$form   = $this->get_current_form();
		$fields = array();
		foreach ( $form['fields'] as $field ) {
			if ( $field->is_conditional_logic_supported() ) {
				$inputs = $field->get_entry_inputs();

				if ( $inputs ) {
					$choices = array();

					foreach ( $inputs as $input ) {
						if ( rgar( $input, 'isHidden' ) ) {
							continue;
						}
						$choices[] = array(
							'value' => $input['id'],
							'label' => GFCommon::get_label( $field, $input['id'], true )
						);
					}

					if ( ! empty( $choices ) ) {
						$fields[] = array( 'choices' => $choices, 'label' => GFCommon::get_label( $field ) );
					}

				} else {
					$fields[] = array( 'value' => $field->id, 'label' => GFCommon::get_label( $field ) );
				}

			}
		}

		return $fields;
	}

	/**
	 * Evaluate the conditional logic.
	 *
	 * @param array $form The form currently being processed.
	 * @param array $entry The entry currently being processed.
	 *
	 * @return bool
	 */
	public function is_custom_logic_met( $form, $entry ) {
		if ( $this->is_gravityforms_supported( '2.0.7.4' ) ) {
			// Use the helper added in Gravity Forms 2.0.7.4.

			return $this->is_simple_condition_met( 'custom_logic', $form, $entry );
		}

		// Older version of Gravity Forms, use our own method of validating the simple condition.
		$settings = $this->get_form_settings( $form );

		$name       = 'custom_logic';
		$is_enabled = rgar( $settings, $name . '_enabled' );

		if ( ! $is_enabled ) {
			// The setting is not enabled so we handle it as if the rules are met.

			return true;
		}

		// Build the logic array to be used by Gravity Forms when evaluating the rules.
		$logic = array(
			'logicType' => 'all',
			'rules'     => array(
				array(
					'fieldId'  => rgar( $settings, $name . '_field_id' ),
					'operator' => rgar( $settings, $name . '_operator' ),
					'value'    => rgar( $settings, $name . '_value' ),
				),
			)
		);

		return GFCommon::evaluate_conditional_logic( $logic, $form, $entry );
	}

	/**
	 * Performing a custom action at the end of the form submission process.
	 *
	 * @param array $entry The entry currently being processed.
	 * @param array $form The form currently being processed.
	*/
	public function after_validation($validation_result) {
		// Fires after validation, before form entry is stored
		$form  = $validation_result['form'];
        $current_page = rgpost( 'gform_source_page_number_' . $form['id'] ) ? rgpost( 'gform_source_page_number_' . $form['id'] ) : 1;
		$entry = GFFormsModel::get_current_lead();
		$settings = $this->get_form_settings($form);
		$first_name = '';
		$last_name = '';
        $process_card = false;
        $credit_card_field_id = 0;
        $billing_street = '';
        $billing_street_two = '';
        $billing_city = '';
        $billing_state = '';
        $billing_postalcode = '';
        $billing_country = '';
        $billing_email = '';
		// Check that the cybersource setting is enabled
        if(isset($settings['send_to_cybersource']) && $settings['send_to_cybersource'] == 1){
            foreach($form['fields'] as $field){
				// Set values for first and last name. Used for validating a fraud
                if($field['type'] == 'andaraccount' && !property_exists($field, 'is_field_hidden')){
                    $first_name = rgpost("input_{$field['id']}_1");
                    $last_name = rgpost("input_{$field['id']}_2");
					$billing_email = rgpost("input_{$field['id']}_3");
                }
                // Set values for billing address. Only needed if we are processing with cybersource
                if($field['type'] == 'andaraddress' && !property_exists($field, 'is_field_hidden')){
                    $billing_street = rgpost("input_{$field['id']}_1");
                    $billing_street_two = rgpost("input_{$field['id']}_2");
                    $billing_city = rgpost("input_{$field['id']}_3");
                    $billing_state = rgpost("input_{$field['id']}_4");
                    $billing_postalcode = rgpost("input_{$field['id']}_5");
                    $billing_country = rgpost("input_{$field['id']}_6");
                }
                if(
                    $field['label'] == 'Payment Frequency' ||
                    $field['label'] == 'Frequency' ||
                    $field['label'] == 'Pay Frequency' ||
					$field['label'] == 'Bill Frequency' ||
                    $field['label'] == 'Billing Frequency' ||
					$field['label'] == 'Donation Frequency'
                ){

                    $this->payment_frequency = rgpost("input_{$field['id']}");
				}
				// Set payment start date based on field value. Removing because we will just use todays date.
                // if(
                //     $field['label'] == 'Payment Start Date' ||
                //     $field['label'] == 'Payment Start Day' ||
                //     $field['label'] == 'Billing Start Date' ||
				// 	$field['label'] == 'Billing Start Day' ||
                //     $field['label'] == 'Donation Start Date' ||
				// 	$field['label'] == 'Donation Start Day'
                // ){
                //     $is_start_date_hidden = RGFormsModel::is_field_hidden( $form, $field, array());
                //     if(!$is_start_date_hidden){
                //         $payment_start_date_value = rgpost("input_{$field['id']}");
                //         if(is_array($payment_start_date_value)){
                //             // Create string from MM-DD-YYYY format. New string is YYYYMMDD
                //             $payment_start_date_string = $payment_start_date_value[2].$payment_start_date_value[0].$payment_start_date_value[1];
                //             $this->payment_start_date = $payment_start_date_string;
                //         } else {
                //             // Explode string by "/"
                //             $payment_start_date_parts = explode('/', $payment_start_date_value);
                //             $payment_start_date_string = $payment_start_date_parts[2].$payment_start_date_parts[0].$payment_start_date_parts[1];
                //             $this->payment_start_date = $payment_start_date_string;
                //         }
                //     }
                // }
                if($field['type'] == 'total' && !(RGFormsModel::is_field_hidden( $form, $field, array()))){
					
                    $this->payment_total = rgpost("input_{$field['id']}");
                }
                // Check that we have a credit card field
                if($field['type'] == 'creditcard'){
                    // Check that we are on the page with the credit card field
                    if($field['pageNumber'] == $current_page){
						// Check that the field is visible
                        // $is_hidden = RGFormsModel::is_field_hidden( $form, $field, array());
                        if(!(RGFormsModel::is_field_hidden( $form, $field, array()))){
                            if($field['failed_validation'] != 1 && $validation_result['is_valid']){
                                $process_card = true;
                                $credit_card_field_id = $field['id'];
                            }
                        }

                    }

                }

            }

        }
		// If name is equal to Ricardo Silva, dont process the card
		if($first_name == 'Ricardo' && $last_name == 'Silva'){
			//Assign modified $form object back to the validation result
			$validation_result['is_valid'] = false;
			$validation_result['form'] = $form;
			return $validation_result;
		}
		// If Ricardo email, dont process the card
		if($billing_email == 'rbbolado@gmail.com'){
			//Assign modified $form object back to the validation result
			$validation_result['is_valid'] = false;
			$validation_result['form'] = $form;
			return $validation_result;
		}
		// Check if send to cybersource is enabled. If so, continue with call to cybersource
		// Also need to make sure we are on the last page, and credit card data is entered
		if($process_card){
			// Get the value of the credit card fields
            // $credit_card_value = rgpost( "input_{$credit_card_field_id}" );
            $fields = GFCommon::get_fields_by_type($form, array("creditcard"));
            $credit_card_field = $fields[0];

            $card_number = rgpost("input_{$credit_card_field["id"]}_1");
            $expiration_date = rgpost("input_{$credit_card_field["id"]}_2");
            $expire_month = $expiration_date[0];
            $expire_year = $expiration_date[1];
            $security_code = rgpost("input_{$credit_card_field["id"]}_3");
            $card_type = rgpost("input_{$credit_card_field["id"]}_4");
            $card_name = rgpost("input_{$credit_card_field["id"]}_5");
            $card_name_array = explode(" ", $card_name);
            $card_firstname = $card_name_array[0];
            $card_lastname = $card_name_array[1];
            // Set payment type for later use
            $this->payment_type = getCardBrand($card_number);
			$this->payment_type_code = getCardBrandCode($this->payment_type);
            if($billing_street == ''){
                $billing_street = 'Field Address 1 label not set correctly.';
            }
            if($billing_city == ''){
                $billing_city = 'Field City label not set correctly.';
            }
            if($billing_state == ''){
                $billing_state = 'Field State label not set correctly.';
            }
            if($billing_postalcode == ''){
                $billing_postalcode = 'Field Postal Code label not set correctly.';
            }
            if($billing_email == ''){
                $billing_email = 'Field Andaremail not set correctly.';
            }

			// Log the entry for troubleshooting
			GFCommon::log_debug( 'Sending to Cybersource: body => ' . print_r( $entry, true ) );

			// Call the cybersource API
			try {
				// Check if form is in production mode
                if(isset($settings['cybersource_transaction_mode']) && $settings['cybersource_transaction_mode'] == 'Production'){

                    $soapClient = new ExtendedClient($this->get_plugin_setting('cybersourceWSDLURLProd'), array('mode' => 'prod'));

                } else {

                    $soapClient = new ExtendedClient($this->get_plugin_setting('cybersourceWSDLURLTest'), array('mode' => 'test'));

                }


				/*
				To see the functions and types that the SOAP extension can automatically
				generate from the WSDL file, uncomment this section:
				$functions = $soapClient->__getFunctions();
				print_r($functions);
				$types = $soapClient->__getTypes();
				print_r($types);
				*/

				$request = new stdClass();

				$request->merchantID = gf_to_andar()->get_plugin_setting('cybersourceMerchantId');

				// Before using this example, replace the generic value with your own.
				$request->merchantReferenceCode = "Website Transaction";

				// To help us troubleshoot any problems that you may encounter,
				// please include the following information about your PHP application.
				$request->clientLibrary = "PHP";
				$request->clientLibraryVersion = phpversion();
				$request->clientEnvironment = php_uname();

				// This section contains a sample transaction request for the authorization
				// service with complete billing, payment card, and purchase information.

				if($this->payment_frequency == 'Y'){
					// Only need these if a One-Time payment
					$ccAuthService = new stdClass();
					$ccAuthService->run = "true";
					$request->ccAuthService = $ccAuthService;
					$ccCaptureService = new stdClass();
					$ccCaptureService->run = "true";
					$request->ccCaptureService = $ccCaptureService;
					// End if One-Time payment
				}

				$billTo = new stdClass();
				$billTo->firstName = $card_firstname;
				// $billTo->firstName = "John";
				$billTo->lastName = $card_lastname;
				//$billTo->lastName = "Doe";
				$billTo->street1 = $billing_street;
				//$billTo->street1 = "1295 Charleston Road";
				$billTo->city = $billing_city;
				//$billTo->city = "Mountain View";
				$billTo->state = $billing_state;
				//$billTo->state = "CA";
				$billTo->postalCode = $billing_postalcode;
				//$billTo->postalCode = "94043";
				$billTo->country = "US";
				//$billTo->country = "US";
				$billTo->email = $billing_email;
				//$billTo->email = "null@cybersource.com";
				$billTo->ipAddress = $_SERVER['REMOTE_ADDR'];
				$request->billTo = $billTo;

				$card = new stdClass();
				$card->accountNumber = $card_number;
				// $card->accountNumber = "4111111111111111";
				$card->expirationMonth = $expire_month;
				// $card->expirationMonth = "12";
				$card->expirationYear = $expire_year;
				// $card->expirationYear = "2020";
				$card->cardType = $this->payment_type_code;
				$request->card = $card;

				$purchaseTotals = new stdClass();
				$purchaseTotals->currency = "USD";
				if($this->payment_frequency == 'Y'){
					// Only need this field if a One-Time payment
					$purchaseTotals->grandTotalAmount = $this->payment_total;
					// End on time payment
				}
				$request->purchaseTotals = $purchaseTotals;

				if($this->payment_frequency == 'M'){
					// Set up subscription, not used for single payment
					$recurringSubscriptionInfo = new stdClass();
					$recurringSubscriptionInfo->amount = $this->payment_total;
					$recurringSubscriptionInfo->frequency = "monthly";
					$recurringSubscriptionInfo->startDate = date('Ymd');
					$request->recurringSubscriptionInfo = $recurringSubscriptionInfo;
					$paySubscriptionCreateService = new stdClass();
					$paySubscriptionCreateService->run = "true";
					$request->paySubscriptionCreateService = $paySubscriptionCreateService;
					// End subscription setup fields
				}

				if($this->payment_frequency == 'Q'){
					// Set up subscription, not used for single payment
					$recurringSubscriptionInfo = new stdClass();
					$recurringSubscriptionInfo->amount = $this->payment_total;
					$recurringSubscriptionInfo->frequency = "quarterly";
					$recurringSubscriptionInfo->startDate = date('Ymd');
					$request->recurringSubscriptionInfo = $recurringSubscriptionInfo;
					$paySubscriptionCreateService = new stdClass();
					$paySubscriptionCreateService->run = "true";
					$request->paySubscriptionCreateService = $paySubscriptionCreateService;
					// End subscription setup fields
				}				

				$reply = $soapClient->runTransaction($request);
				// This section will show all the reply fields.
				// To retrieve individual reply fields, follow these examples.
				// ACCEPT and REJECT
				//				printf( "decision = $reply->decision<br>" );
				//				printf( "reasonCode = $reply->reasonCode<br>" );
				//				printf( "requestID = $reply->requestID<br>" );
				//				printf( "requestToken = $reply->requestToken<br>" );
				//				printf( "ccAuthReply->reasonCode = " . $reply->ccAuthReply->reasonCode . "<br>");

				// Log it
				GFCommon::log_debug( 'Cybersource: request => ' . print_r( $request, true ) );
				GFCommon::log_debug( 'Cybersource: response => ' . print_r( $reply, true ) );

                // If rejected, trigger the validation error
                if($reply->decision == 'ACCEPT'){
                     // If successful, store response for later use
                    $this->cybersource_response = $reply;

                } else {
 					// Set the validation to false if card was rejected
					$validation_result['is_valid'] = false;

					// Find the credit card field and set as invalid
					foreach ( $form['fields'] as $field ) {

						if ( $field->id == $credit_card_field_id ) {

							$field->failed_validation  = true;
							$field->validation_message = 'Please check your credit card information and try again.';
                            // print_r($reply);

							break;

						}

					}

                }

			} catch (SoapFault $exception) {

				// Something went wrong and the soap call failed
				GFCommon::log_debug( 'Cybersource error: exception => ' . print_r( get_class($exception), true ) );

                // Set the validation to false if card was rejected
                $validation_result['is_valid'] = false;

				// Set the validation to false for the credit card field
                foreach ( $form['fields'] as $field ) {

                    if ( $field->id == $credit_card_field_id ) {

                        $field->failed_validation  = true;
                        $field->validation_message = 'We&rsquo;re sorry, there was an issue with our credit card processing service. Please try again later.';

                        break;

                    }

                }

			}

		}

		//Assign modified $form object back to the validation result
		$validation_result['form'] = $form;

		return $validation_result;

	}

	public function pre_submission( $entry, $form ) {

		// Fires after validation, before form entry is stored

	}

	public function after_submission( $entry, $form ) {

        $settings = $this->get_form_settings( $form );

        if(isset($settings['andar_sync']) && $settings['andar_sync'] == 'Yes'){
            // Loop through the fields to check if they should be synced to andar
            foreach ( $form['fields'] as $field ) {

				if($field['type'] == 'andaraccount' && isset($settings['override_account']) && $settings['override_account'] == 1 && !(RGFormsModel::is_field_hidden( $form, $field, array()))) {

					$this->build_account_data($form, $entry, $field);

				} elseif($field['type'] == 'andaraccount' && !(RGFormsModel::is_field_hidden( $form, $field, array()))){

					$this->build_andar_account_data($form, $entry, $field);

                } elseif($field['type'] == 'andaraddress' && isset($settings['override_address']) && $settings['override_address'] == 1 && !(RGFormsModel::is_field_hidden( $form, $field, array()))) {

					$this->build_address_data($form, $entry, $field);

			  	} elseif($field['type'] == 'andaraddress' && !(RGFormsModel::is_field_hidden( $form, $field, array()))) {

  					$this->build_andar_address_data($form, $entry, $field);

                } elseif($field['type'] == 'address' && !(RGFormsModel::is_field_hidden( $form, $field, array()))) {

					$this->build_address_data($form, $entry, $field);

                } elseif($field['type'] == 'checkbox' && !(RGFormsModel::is_field_hidden( $form, $field, array()))) {
					
					$this->build_checkbox_data($form, $entry, $field);

				} else {

					$this->build_misc_data($form, $entry, $field);

				}
				if(strpos($field->cssClass, 'honoree-combine') !== false){

					$this->build_honoree_data($form, $entry, $field);

				}
				// Assemble some more data based on class configuration
				if($this->use_class_population($form, $entry, $field)){

					$this->build_class_data($form, $entry, $field);

				}
				// If there is a total field, go ahead and set it to the totalpledge header. We do this already when processing cybersource, but we will do it again in case cybersource is not being used
                if($field['type'] == 'total' && !(RGFormsModel::is_field_hidden( $form, $field, array()))){
					$this->payment_total = rgar($entry, $field->id);
					// Set the $payment_total_use_org_headers property based on the setting in the current total field
					//var_dump($field->useOrgHeaders);
					//die();
					if($field->useOrgHeaders){
						$this->payment_total_use_org_headers = true;
						$this->andar_data_new['Organizations.Transactions.TOTALPLEDGEAMOUNT'] = $this->payment_total;
					} else {
						$this->andar_data_new['Individuals.Transactions.TOTALPLEDGEAMOUNT'] = $this->payment_total;
					}
					// $this->andar_data_new['Individuals.Transactions.TOTALPLEDGEAMOUNT'] = $this->payment_total;
                }
			}

			$this->build_donation_data($form, $entry, $field);

			// Append honoree data if there is some information present in the form
			$this->andar_honoree = array_filter($this->andar_honoree);

			if(count($this->andar_honoree) > 0){

				$this->andar_data_new['Individuals.Transactions.GiftRelationships.INTERNALNOTE'] = '"' . implode(',', $this->andar_honoree) . '"';

			}			

            // Append additional cybersource response data if it is available. The remaining fields are managed in the form
            if($this->cybersource_response){

				$this->build_cybersource_data($form, $entry, $field);

			}
			
			// If individual account number or organization account number are blank, remove them from the array
			if(isset($this->andar_data_new['Individuals.ACCOUNTNUMBER']) && $this->andar_data_new['Individuals.ACCOUNTNUMBER'] == ''){

				unset($this->andar_data_new['Individuals.ACCOUNTNUMBER']);

			}
			
			if(isset($this->andar_data_new['Organizations.ACCOUNTNUMBER']) && $this->andar_data_new['Organizations.ACCOUNTNUMBER'] == ''){

				unset($this->andar_data_new['Organizations.ACCOUNTNUMBER']);

			}			

			// Check if a first name or last name is being passed in the array. If so we need to set an additional parameter.
            if (isset($this->andar_data_new['Individuals.FIRSTNAME']) || isset($this->andar_data_new['Individuals.LASTNAME'])) {

                array_push($this->andar_parameters, '*#CieParm#,main,UPDATENAME,1');

			}
			
			// If the payment only setting is active, remove the totalpledge header
			if(isset($settings['payment_only']) && $settings['payment_only'] == 1){
				if(isset($this->andar_data_new['Individuals.Transactions.TOTALPLEDGEAMOUNT'])){
					unset($this->andar_data_new['Individuals.Transactions.TOTALPLEDGEAMOUNT']);
				}
				if(isset($this->andar_data_new['Organizations.Transactions.TOTALPLEDGEAMOUNT'])){
					unset($this->andar_data_new['Organizations.Transactions.TOTALPLEDGEAMOUNT']);
				}
			}

			// Add param that prevents the transaction from being processed automatically. This will force the api to import the data and not process the data.
			array_push($this->andar_parameters, '*#CieParm#,command,process,0');

			// Make the request to Andar
			$this->make_andar_request();

			// Log the andar request and response
			$this->log_output($form);

			// Maybe output some debug info
			if(isset($settings['debug_mode']) && $settings['debug_mode'] == 'Yes'){

				$this->debug_output();

			}

			// Check if there is a non confident account error. If so, then try another andar request with new account number.
			if($this->non_confident_account()){

				// Set the andar account key to use this new account number that the api returned
				$this->andar_data_new['Individuals.ACCOUNTNUMBER'] = $this->non_confident_account();

				// Make the request to Andar
				$this->make_andar_request();

				// Log the andar request and response
				$this->log_output($form);

				// Maybe output some debug info
				if(isset($settings['debug_mode']) && $settings['debug_mode'] == 'Yes'){

					$this->debug_output();

				}

			}

        }

	}


	// # HELPERS -------------------------------------------------------------------------------------------------------

	/**
	 * The feedback callback for the 'andarApiUrl' setting on the plugin settings page and the 'mytext' setting on the form settings page.
	 *
	 * @param string $value The setting value.
	 *
	 * @return bool
	 */
	public function is_valid_setting( $value ) {
		return true;
	}
	public function use_alt_headers($form, $entry){
		$settings = $this->get_form_settings($form);
		if(
			isset($settings['alt_header_selector']) &&
			$settings['alt_header_selector'] != '0' &&
			isset($settings['alt_header_selector_value']) &&
			$settings['alt_header_selector_value'] != '0'

		){
			// If the options are set to use the alt header, we need to then check if the input value matches the setting
			if(rgar($entry, $settings['alt_header_selector']) == $settings['alt_header_selector_value']){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}		
	}
	public function use_class_population($form, $entry, $field){
		if($field['cssClass']){
			if(strpos($field['cssClass'], 'populate') !== false){
				return true;
			}
		}
		return false;
	}
	public function build_donation_data($form, $entry, $field){
		$settings = $this->get_form_settings($form);
		if($this->payment_total_use_org_headers){
			if(isset($settings['campaign_year']) && $settings['campaign_year'] != ''){
				$this->andar_data_new['EnvelopeMaster.CAMPAIGNYEAR'] = $settings['campaign_year'];
				$this->andar_data_new['Organizations.Transactions.CampaignYear'] = $settings['campaign_year'];
				array_push($this->andar_parameters, '*#CieParm#,envelope,CAMPAIGNYEAR,'.$settings['campaign_year']);
			}
			if(isset($settings['campaign_account']) && $settings['campaign_account'] != ''){
				$this->andar_data_new['EnvelopeMaster.CAMPAIGNACCOUNTNUMBER'] = $settings['campaign_account'];
				$this->andar_data_new['Organizations.Transactions.CampaignAccountNumber'] = $settings['campaign_account'];
				array_push($this->andar_parameters, '*#CieParm#,envelope,CAMPAIGNACCOUNTER,'.$settings['campaign_account']);
			}
			if(isset($settings['book_number']) && $settings['book_number'] != ''){
				$this->andar_data_new['Organizations.Transactions.DCDetails.BOOKNUMBER'] = $settings['book_number'];
			}
			if(isset($settings['master_account']) && $settings['master_account'] != ''){
				array_push($this->andar_parameters, '*#CieParm#,envelope,MASTERACCOUNTER,'.$settings['master_account']);
			}
			if(isset($settings['processing_account']) && $settings['processing_account'] != ''){
				array_push($this->andar_parameters, '*#CieParm#,envelope,PROCESSINGACCNT,'.$settings['processing_account']);
			}			
			if(isset($settings['fundraising_account']) && $settings['fundraising_account'] != ''){
				array_push($this->andar_parameters, '*#CieParm#,envelope,FUNDRAISINGACNT,'.$settings['fundraising_account']);
			}
		} else {
			if(isset($settings['campaign_year']) && $settings['campaign_year'] != ''){
				$this->andar_data_new['EnvelopeMaster.CAMPAIGNYEAR'] = $settings['campaign_year'];
				$this->andar_data_new['Individuals.Transactions.CampaignYear'] = $settings['campaign_year'];
				array_push($this->andar_parameters, '*#CieParm#,envelope,CAMPAIGNYEAR,'.$settings['campaign_year']);
			}
			if(isset($settings['campaign_account']) && $settings['campaign_account'] != ''){
				$this->andar_data_new['EnvelopeMaster.CAMPAIGNACCOUNTNUMBER'] = $settings['campaign_account'];
				$this->andar_data_new['Individuals.Transactions.CampaignAccountNumber'] = $settings['campaign_account'];
				array_push($this->andar_parameters, '*#CieParm#,envelope,CAMPAIGNACCOUNTER,'.$settings['campaign_account']);
			}
			if(isset($settings['book_number']) && $settings['book_number'] != ''){
				$this->andar_data_new['Individuals.Transactions.DCDetails.BOOKNUMBER'] = $settings['book_number'];
			}
			if(isset($settings['master_account']) && $settings['master_account'] != ''){
				array_push($this->andar_parameters, '*#CieParm#,envelope,MASTERACCOUNTER,'.$settings['master_account']);
			}
			if(isset($settings['processing_account']) && $settings['processing_account'] != ''){
				array_push($this->andar_parameters, '*#CieParm#,envelope,PROCESSINGACCNT,'.$settings['processing_account']);
			}			
			if(isset($settings['fundraising_account']) && $settings['fundraising_account'] != ''){
				array_push($this->andar_parameters, '*#CieParm#,envelope,FUNDRAISINGACNT,'.$settings['fundraising_account']);
			}
		}	
	}
	public function build_class_data($form, $entry, $field){
		// This feature supports envelope type and transaction type control. We are going to possible set those two heads based on the value of the form
		// Field value must contain part of the string used to determine the envelope and/or transaction type
		$field_value = rgar($entry, $field->id);
		// ex credit-card, bill-me, daf
		// Turn classes into an array
		$class_array = explode(' ', $field['cssClass']);
		// loop through the classes
		$set_envelope_type = false;
		$set_transaction_type = false;
		foreach($class_array as $class){
			if($class == 'populate-envelope-type'){
				$set_envelope_type = true;
			}
			if($class == 'populate-transaction-type'){
				$set_transaction_type = true;
			}
		}
		// continue with setting envelope type
		if($set_envelope_type){
			//var_dump(explode('envelope-type-'.$field_value.'-', $field['cssClass']));
			foreach($class_array as $class){
				// if this class name contains all the right words, we need to use the ending as the value
				if(strpos($class, 'envelope-type-'.$field_value.'-') !== false){
					$exploded_class = explode('envelope-type-'.$field_value.'-', $class);
					$envelope_value = $exploded_class[1];
					if($field->useOrgHeaders){
						
						$this->andar_data_new['EnvelopeMaster.ENVELOPETYPE'] = $envelope_value;
					} else {
						$this->andar_data_new['EnvelopeMaster.ENVELOPETYPE'] = $envelope_value;
					}
				}
			}
		}
		if($set_transaction_type){
			foreach($class_array as $class){
				// if this class name contains all the right words, we need to use the ending as the value
				if(strpos($class, 'transaction-type-'.$field_value.'-') !== false){
					$exploded_class = explode('transaction-type-'.$field_value.'-', $class);
					$envelope_value = $exploded_class[1];
					if($field->useOrgHeaders){
						$this->andar_data_new['Organizations.Transactions.TRANSACTIONTYPE'] = $envelope_value;
					} else {
						$this->andar_data_new['Individuals.Transactions.TRANSACTIONTYPE'] = $envelope_value;
					}					
				}
			}
		}		
	}
	public function build_andar_account_data($form, $entry, $field){
		// file_put_contents('andar.txt', print_r($field->inputs, true));
		$andar_first_name_value = sanitize_for_andar(rgar($entry, $field->inputs[0]['id']));
		$andar_last_name_value = sanitize_for_andar(rgar($entry, $field->inputs[1]['id']));

		$andar_email_address_value = sanitize_for_andar(rgar($entry, $field->inputs[2]['id']));
		$andar_email_type_value = rgar($entry, $field->inputs[3]['id']);

		$andar_account_number_value = rgar($entry, $field->inputs[4]['id']);

		$andar_area_code_value = rgar($entry, $field->inputs[5]['id']);
		$andar_area_code_value = preg_replace('/[^0-9]/', '', $andar_area_code_value);

		$andar_phone_number_value = rgar($entry, $field->inputs[6]['id']);
		$andar_phone_number_value = preg_replace('/[^0-9]/', '', $andar_phone_number_value);

		$andar_phone_number_type_value = rgar($entry, $field->inputs[7]['id']);

		// Add the form data to the request. Leave out phone number if the fields are hidden in advanced settings tab
		if($field->useOrgHeaders){
			// $this->andar_data_new['Individuals.FIRSTNAME'] = $andar_first_name_value;
			// $this->andar_data_new['Individuals.LASTNAME'] = $andar_last_name_value;
			// $this->andar_data_new['Individuals.EMails.EMAILADDRESS'] = $andar_email_address_value;
			// $this->andar_data_new['Individuals.EMails.EMAILTYPE'] = $andar_email_type_value;
			if($field->hidePhone != 1){
				// $this->andar_data_new['Individuals.PhoneNumbers.AREACODE'] = $andar_area_code_value;
				// $this->andar_data_new['Individuals.PhoneNumbers.PHONENUMBER'] = $andar_phone_number_value;
				// $this->andar_data_new['Individuals.PhoneNumbers.PHONENUMBERTYPE'] = $andar_phone_number_type_value;
			}
		} else {
			$this->andar_data_new['Individuals.FIRSTNAME'] = $andar_first_name_value;
			$this->andar_data_new['Individuals.LASTNAME'] = $andar_last_name_value;
			$this->andar_data_new['Individuals.EMails.EMAILADDRESS'] = $andar_email_address_value;
			$this->andar_data_new['Individuals.EMails.EMAILTYPE'] = $andar_email_type_value;
			if($field->hidePhone != 1){
				$this->andar_data_new['Individuals.PhoneNumbers.AREACODE'] = $andar_area_code_value;
				$this->andar_data_new['Individuals.PhoneNumbers.PHONENUMBER'] = $andar_phone_number_value;
				$this->andar_data_new['Individuals.PhoneNumbers.PHONENUMBERTYPE'] = $andar_phone_number_type_value;
			}
	
			// Add the account number to the andar call if there is a value
			if(isset($andar_account_number_value) && $andar_account_number_value != null && $andar_account_number_value != ''){
				$this->andar_data_new['Individuals.ACCOUNTNUMBER'] = $andar_account_number_value;
			}
		}
	}

	public function build_account_data($form, $entry, $field){
		$settings = $this->get_form_settings($form);
		foreach($field->inputs as $sub_field){
			$sub_field_id = $sub_field['id'];
			$sub_field_nice_id = str_replace('.', '--', $sub_field['id']);
			$sync_id = 'sync_'.$sub_field_nice_id;
			//$andar_field_header = 'andar_choice_'.$sub_field_nice_id;
			if(isset($settings[$sync_id]) && $settings[$sync_id] == 1){
				// If the andar alt selector field value matches form setting, then we need to use the alt field			
				if($this->use_alt_headers($form, $entry)){
					$andar_field_header = 'alt_andar_choice_'.$sub_field_nice_id;
				} else {
					$andar_field_header = 'andar_choice_'.$sub_field_nice_id;
				}
				$this->andar_data_new[$settings[$andar_field_header]] = rgar($entry, $sub_field_id);
			}
		}
	}	

	public function build_andar_address_data($form, $entry, $field){
		$andar_address_street1_value = sanitize_for_andar(rgar($entry, $field->inputs[0]['id']));
		$andar_address_street2_value = sanitize_for_andar(rgar($entry, $field->inputs[1]['id']));

		$andar_address_city_value = sanitize_for_andar(rgar($entry, $field->inputs[2]['id']));
		$andar_address_state_value = sanitize_for_andar(rgar($entry, $field->inputs[3]['id']));

		$andar_address_postcode_value = sanitize_for_andar(rgar($entry, $field->inputs[4]['id']));

		$andar_address_country_value = rgar($entry, $field->inputs[5]['id']);
		$andar_address_type_value = rgar($entry, $field->inputs[6]['id']);

		// Add the form data to the request
		if($field->useOrgHeaders){
			$this->andar_data_new['Organizations.Addresses.ADDRESSLINE1'] = $andar_address_street1_value;
			$this->andar_data_new['Organizations.Addresses.ADDRESSLINE2'] = $andar_address_street2_value;
			$this->andar_data_new['Organizations.Addresses.CITY'] = $andar_address_city_value;
			$this->andar_data_new['Organizations.Addresses.STATEORPROV'] = $andar_address_state_value;
			$this->andar_data_new['Organizations.Addresses.ZIPPOSTALCODE'] = $andar_address_postcode_value;
			$this->andar_data_new['Organizations.Addresses.COUNTRYCODE'] = $andar_address_country_value;
			$this->andar_data_new['Organizations.Addresses.ADDRESSTYPE'] = $andar_address_type_value;
		} else {
			$this->andar_data_new['Individuals.Addresses.ADDRESSLINE1'] = $andar_address_street1_value;
			$this->andar_data_new['Individuals.Addresses.ADDRESSLINE2'] = $andar_address_street2_value;
			$this->andar_data_new['Individuals.Addresses.CITY'] = $andar_address_city_value;
			$this->andar_data_new['Individuals.Addresses.STATEORPROV'] = $andar_address_state_value;
			$this->andar_data_new['Individuals.Addresses.ZIPPOSTALCODE'] = $andar_address_postcode_value;
			$this->andar_data_new['Individuals.Addresses.COUNTRYCODE'] = $andar_address_country_value;
			$this->andar_data_new['Individuals.Addresses.ADDRESSTYPE'] = $andar_address_type_value;
		}
	}

	public function build_checkbox_data($form, $entry, $field){
		$settings = $this->get_form_settings($form);
		$checkbox_values = [];
		foreach($field->inputs as $sub_field){
			$sub_field_id = $sub_field['id'];
			$sync_id = 'sync_'.$field->id;
			$checkbox_value = rgar($entry, $sub_field_id);
			if($checkbox_value != ''){
				$checkbox_values[] = $checkbox_value;
			}
		}
		if(isset($settings[$sync_id]) && $settings[$sync_id] == 1){
			// If the andar alt selector field value matches form setting, then we need to use the alt field
			if($this->use_alt_headers($form, $entry)){
				$andar_field_header = 'alt_andar_choice_'.$field->id;
			} else {
				$andar_field_header = 'andar_choice_'.$field->id;
			}
			// If this is the anonymous flag we need to override the checkbox value
			if(strpos($field->cssClass, 'anonymous-flag') !== false){
				// If there is a checkbox value set, we need to override the value to 'uncheck'
				if(count($checkbox_values) > 0){
					$checkbox_values = ['0'];
				}
			}			
			$this->andar_data_new[$settings[$andar_field_header]] = implode(', ', $checkbox_values);			
		}	
	}

	public function build_address_data($form, $entry, $field){
		$settings = $this->get_form_settings($form);
		foreach($field->inputs as $sub_field){
			$sub_field_id = $sub_field['id'];
			$sub_field_nice_id = str_replace('.', '--', $sub_field['id']);
			$sync_id = 'sync_'.$sub_field_nice_id;
			//$andar_field_header = 'andar_choice_'.$sub_field_nice_id;
			if(isset($settings[$sync_id]) && $settings[$sync_id] == 1){
				// If the andar alt selector field value matches form setting, then we need to use the alt field			
				if($this->use_alt_headers($form, $entry)){
					$andar_field_header = 'alt_andar_choice_'.$sub_field_nice_id;
				} else {
					$andar_field_header = 'andar_choice_'.$sub_field_nice_id;
				}
				$this->andar_data_new[$settings[$andar_field_header]] = rgar($entry, $sub_field_id);
			}
		}
	}

	public function build_misc_data($form, $entry, $field){
		$settings = $this->get_form_settings($form);
		$sync_id = 'sync_'.$field->id;

		if(isset($settings[$sync_id]) && $settings[$sync_id] == 1 && !(RGFormsModel::is_field_hidden( $form, $field, array()))){
			// If the andar alt selector field value matches form setting, then we need to use the alt field			
			if($this->use_alt_headers($form, $entry)){
				$andar_field_header = 'alt_andar_choice_'.$field->id;
			} else {
				$andar_field_header = 'andar_choice_'.$field->id;
			}
			$andar_header_value = $settings[$andar_field_header];
			if($field->type == 'date'){
				// Remove hypens if it is a date field
				$andar_data_value = str_replace('-', '', rgar($entry, $field->id));
				// Remove slashes if it is a date field
				$andar_data_value = str_replace('/', '', rgar($entry, $field->id));				
			} else {
				$andar_data_value = rgar($entry, $field->id);
			}
			// If this header is individual account then unset it so the override can be used
			if($andar_header_value == 'Individuals.ACCOUNTNUMBER'){
				if(isset($this->andar_data_new['Individuals.ACCOUNTNUMBER'])){
					unset($this->andar_data_new['Individuals.ACCOUNTNUMBER']);
				}
			}
			// If this header is organization account then unset it so the override can be used
			if($andar_header_value == 'Organizations.ACCOUNTNUMBER'){
				if(isset($this->andar_data_new['Organizations.ACCOUNTNUMBER'])){
					unset($this->andar_data_new['Organizations.ACCOUNTNUMBER']);
				}
			}						
			$this->andar_data_new[$andar_header_value] = $andar_data_value;
		}
	}

	public function build_honoree_data($form, $entry, $field){
		if($field->inputs){
			foreach($field->inputs as $sub_field){
				$this->andar_honoree[] = rgar($entry, $sub_field['id']);
			}
		} else {
			$this->andar_honoree[] = rgar($entry, $field->id);
		}		
	}

	public function build_cybersource_data($form, $entry, $field){

		$settings = $this->get_form_settings($form);
		if($this->payment_total_use_org_headers){
			// PAYMENT TYPE
			$this->andar_data_new['Organizations.Transactions.PAYMENTTYPE'] = $this->payment_type;
			// PAYMENT TOTALS
			$this->andar_data_new['Organizations.Transactions.TOTALPAYMENTAMOUNT'] = $this->payment_total;
			$this->andar_data_new['Organizations.Transactions.TOTALPLEDGEAMOUNT'] = $this->payment_total;

			if(isset($settings['book_number']) && $settings['book_number'] != ''){
				$this->andar_data_new['Organizations.Transactions.DCDetails.TOTALDONATION'] = $this->payment_total;
			}
			if(isset($settings['source_code']) && $settings['source_code'] != ''){
				$this->andar_data_new['Organizations.Transactions.SOURCECODE'] = $settings['source_code'];
			}
		} else {
			// PAYMENT TYPE
			$this->andar_data_new['Individuals.Transactions.PAYMENTTYPE'] = $this->payment_type;
			// PAYMENT TOTALS
			$this->andar_data_new['Individuals.Transactions.TOTALPAYMENTAMOUNT'] = $this->payment_total;
			$this->andar_data_new['Individuals.Transactions.TOTALPLEDGEAMOUNT'] = $this->payment_total;

			if(isset($settings['book_number']) && $settings['book_number'] != ''){
				$this->andar_data_new['Individuals.Transactions.DCDetails.TOTALDONATION'] = $this->payment_total;
			}
			if(isset($settings['source_code']) && $settings['source_code'] != ''){
				$this->andar_data_new['Individuals.Transactions.SOURCECODE'] = $settings['source_code'];
			}			
		}
		//$this->andar_data_new['Individuals.Transactions.TRANSACTIONTYPE'] = '500Individual';
		//$this->andar_data_new['EnvelopeMaster.ENVELOPETYPE'] = 'MISC';
		array_push($this->andar_parameters, '*#CieParm#,main,CHECKFORDUPPLED,0');	
		// SUBSCRIPTION ID
		// print_r($this->cybersource_response);
//		if(isset($this->cybersource_response->paySubscriptionCreateReply->subscriptionID)){
//			array_push($this->andar_headers, 'Individuals.Transactions.BillingSched.CYBSSUBSCRIPTIONID');
//			array_push($this->andar_data, $this->cybersource_response->paySubscriptionCreateReply->subscriptionID);
//			array_push($this->andar_headers, 'Individuals.Transactions.BillingSched.BILLINGSTARTDATE');
//			array_push($this->andar_data, $this->payment_start_date);
//		}
	}

	public function make_andar_request(){
		// Convert headers to string
		$this->andar_headers_string = implode(',', array_keys($this->andar_data_new));
		// Convert data to string
		$this->andar_data_string = implode(',', $this->andar_data_new);
		// Convert parameters to string
		$this->andar_parameters_string = implode("\n", $this->andar_parameters);

		// Start curl to send post request to Andar endpoint
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->get_plugin_setting('andarApiUrl'));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);

		$data = array(
			'api_key' => $this->get_plugin_setting('andarApiKey'),
			'header' => $this->andar_headers_string,
			'data'    => $this->andar_data_string,
			'parameters' => $this->andar_parameters_string
		);

		$data = http_build_query($data);
		// print_r($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$this->andar_response = curl_exec($ch);
		// $info = curl_getinfo($ch);
		curl_close($ch);
	}

	public function debug_output(){
		echo '<div style="margin: 150px 15px 15px 15px; padding: 15px; background-color: #0e2a35; color: #FFFFFF;">';
			if($this->cybersource_response){
				echo 'Cybersource Response: ';
				print_r($this->cybersource_response);
				echo '<br /><br />';
			}
			echo 'Headers: ';
			print_r($this->andar_headers_string);
			echo '<br /><br />';
			echo 'Data: ';
			print_r($this->andar_data_string);
			echo '<br /><br />';
			echo 'Parameters: ';
			print_r($this->andar_parameters_string);
			echo '<br /><br />';
			echo 'Response Code: ' . get_response_status_code($this->andar_response);
			echo '<br /><br />';
			print_r($this->andar_response);
		echo '</div>';
	}

	public function log_output($form){
		// Build form title
		$form_title = $form['title'] . ' (' . $form['id'] . ')';
		// Build date time
		$tz = 'America/Kentucky/Louisville';
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone($tz));
		$dt->setTimestamp($timestamp);
		// $file = '/var/www/vhosts/metrounitedway.org/public_html/andar_log.txt';
		$file = dirname(__FILE__) . '/andar_log.txt';
		// Open the file to get existing content
		// $current = file_get_contents($file);
		// Append new data to the file
		$current = "\n";
		$current .= "\n";
		$current .= "\n";
		$current .= "------------------------------------------------";
		$current .= "\n";
		$current .= "Form: ";
		$current .= print_r($form_title, true);
		$current .= "\n";
		$current .= "Submitted: ";
		$current .= print_r($dt->format('m-d-Y, H:i:s'), true);
		$current .= "\n";
		$current .= "\n";
		$current .= "== ANDAR HEADERS == \n";
		$current .= print_r($this->andar_headers_string, true);
		$current .= "\n";
		$current .= "\n";
		$current .= "== ANDAR DATA == \n";
		$current .= print_r($this->andar_data_string, true);
		$current .= "\n";
		$current .= "\n";
		$current .= "== ANDAR PARAMETERS == \n";
		$current .= print_r($this->andar_parameters_string, true);
		$current .= "\n";
		$current .= "\n";
		$current .= "== ANDAR RESPONSE == \n";
		$current .= print_r($this->andar_response, true);
		// Write the contents back to the file
		//file_put_contents($file, $current);
		GFCommon::log_debug($current);
	}

	public function non_confident_account() {
		$nc_account = false;
		if(get_error_list($this->andar_response)){
			foreach(get_error_list($this->andar_response) as $error){
				if(isset($error[2]) && isset($error[3]) && $error[2] == 'Connector.Individuals.nameNC'){
					$nc_account = substr($error[3], 22, 7);
					break;
				}
			}			
		}
		return $nc_account;
	}

}
