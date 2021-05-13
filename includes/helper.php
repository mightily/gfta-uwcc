<?php

	// Parse Andar response and return the status
	function get_response_status_code($response){

		// Convert csv output to arrays
		$lines = explode(PHP_EOL, $response);

		$response_array = [];

		foreach ($lines as $line) {

			$response_array[] = str_getcsv($line);

		}
		// Store status of response, it is first value of array
		// Array( [0] => status [1] =>  406 [2] =>  errors found )
		$status = $response_array[0][1];

		return $status;

	}

	function get_error_list($response){

		// Convert csv output to arrays
		$lines = explode(PHP_EOL, $response);

		$response_array = [];

		foreach ($lines as $line) {

			$response_array[] = str_getcsv($line);

		}

		// Store status of response, it is first value of array
		// Array( [0] => status [1] =>  406 [2] =>  errors found )
		if(isset($response_array[2]) && $response_array[2][0] == 'Errors List'){
			unset($response_array[0]);
			unset($response_array[1]);
			unset($response_array[2]);
		} else {
			$response_array = false;
		}

		return $response_array;

	}

	// Parse Andar response and return array with headers as keys
	function get_response_data($response){

		// Convert csv output to arrays
		$lines = explode(PHP_EOL, $response);

		$response_array = [];

		foreach ($lines as $line) {

			$response_array[] = str_getcsv($line);

		}

		// Remove last value of array, it is blank
		array_pop($response_array);


		// Remove status from response array, it is first key in response
		array_shift($response_array);

		// If data was returned, not just a status. First value will be headers.
		$headers = [];

		if(count($response_array) > 0){

			$headers = $response_array[0];

			// Remove headers from response array
			array_shift($response_array);

		}

		// If response array has data after we removed the headers, and headers is not empty
		$formatted_response_data = [];

		if(count($response_array) > 0 && count($headers) > 0){

			foreach($response_array as $reponse_row){

				$formatted_response_data[] = array_combine($headers, $reponse_row);

			}

		}

		print_r($formatted_response_data);

		return $formatted_response_data;

	}

	// Accepts a formatted andar response and returns the row with the most content/data
	function get_array_with_most_data($andar_data) {

		// If there is more than one record in andar, we need to choose one to use
		$data_row = [];

		if(count($andar_data) === 1){

			$data_row = $andar_data;

		} else {

			// We need to use the row that has the most data
			$data_key = 0;

			$data_count_const = 0;

			foreach($andar_data as $key => $data_row){

				$data_count = count(array_filter($data_row, function($v, $k){

					return($v && $v != '-null-');

				}, ARRAY_FILTER_USE_BOTH));

				if($data_count > $data_count_const){

					$data_key = $key;

					$data_count_const = $data_count;

				}

			}

			$data_row = $andar_data[$data_key];

		}

	}

    /**
     * Format State
     *
     * Note: Does not format addresses, only states. $input should be as exact as possible, problems
     * will probably arise in long strings, example 'I live in Kentukcy' will produce Indiana.
     *
     * @example echo myClass::format_state( 'Florida', 'abbr'); // FL
     * @example echo myClass::format_state( 'we\'re from georgia' ) // Georgia
     *
     * @param  string $input  Input to be formatted
     * @param  string $format Accepts 'abbr' to output abbreviated state, default full state name.
     * @return string          Formatted state on success,
     */
    function format_state( $input, $format = '' ) {
        if( ! $input || empty( $input ) )
            return;

        $states = array (
            'AL'=>'Alabama',
            'AK'=>'Alaska',
            'AZ'=>'Arizona',
            'AR'=>'Arkansas',
            'CA'=>'California',
            'CO'=>'Colorado',
            'CT'=>'Connecticut',
            'DE'=>'Delaware',
            'DC'=>'District Of Columbia',
            'FL'=>'Florida',
            'GA'=>'Georgia',
            'HI'=>'Hawaii',
            'ID'=>'Idaho',
            'IL'=>'Illinois',
            'IN'=>'Indiana',
            'IA'=>'Iowa',
            'KS'=>'Kansas',
            'KY'=>'Kentucky',
            'LA'=>'Louisiana',
            'ME'=>'Maine',
            'MD'=>'Maryland',
            'MA'=>'Massachusetts',
            'MI'=>'Michigan',
            'MN'=>'Minnesota',
            'MS'=>'Mississippi',
            'MO'=>'Missouri',
            'MT'=>'Montana',
            'NE'=>'Nebraska',
            'NV'=>'Nevada',
            'NH'=>'New Hampshire',
            'NJ'=>'New Jersey',
            'NM'=>'New Mexico',
            'NY'=>'New York',
            'NC'=>'North Carolina',
            'ND'=>'North Dakota',
            'OH'=>'Ohio',
            'OK'=>'Oklahoma',
            'OR'=>'Oregon',
            'PA'=>'Pennsylvania',
            'RI'=>'Rhode Island',
            'SC'=>'South Carolina',
            'SD'=>'South Dakota',
            'TN'=>'Tennessee',
            'TX'=>'Texas',
            'UT'=>'Utah',
            'VT'=>'Vermont',
            'VA'=>'Virginia',
            'WA'=>'Washington',
            'WV'=>'West Virginia',
            'WI'=>'Wisconsin',
            'WY'=>'Wyoming',
        );

        foreach( $states as $abbr => $name ) {
            if ( preg_match( "/\b($name)\b/", ucwords( strtolower( $input ) ), $match ) )  {
                if( 'abbr' == $format ){
                    return $abbr;
                }
                else return $name;
            }
            elseif( preg_match("/\b($abbr)\b/", strtoupper( $input ), $match) ) {
                if( 'abbr' == $format ){
                    return $abbr;
                }
                else return $name;
            }
        }
        return;
    }

    /**
     * Obtain a brand constant from a PAN
     *
     * @param type $pan               Credit card number
     * @param type $include_sub_types Include detection of sub visa brands
     * @return string
     */
    function getCardBrand($pan, $include_sub_types = false){
        //maximum length is not fixed now, there are growing number of CCs has more numbers in length, limiting can give false negatives atm

        //these regexps accept not whole cc numbers too
        //visa
        $visa_regex = "/^4[0-9]{0,}$/";
        $vpreca_regex = "/^428485[0-9]{0,}$/";
        $postepay_regex = "/^(402360|402361|403035|417631|529948){0,}$/";
        $cartasi_regex = "/^(432917|432930|453998)[0-9]{0,}$/";
        $entropay_regex = "/^(406742|410162|431380|459061|533844|522093)[0-9]{0,}$/";
        $o2money_regex = "/^(422793|475743)[0-9]{0,}$/";

        // MasterCard
        $mastercard_regex = "/^(5[1-5]|222[1-9]|22[3-9]|2[3-6]|27[01]|2720)[0-9]{0,}$/";
        $maestro_regex = "/^(5[06789]|6)[0-9]{0,}$/";
        $kukuruza_regex = "/^525477[0-9]{0,}$/";
        $yunacard_regex = "/^541275[0-9]{0,}$/";

        // American Express
        $amex_regex = "/^3[47][0-9]{0,}$/";

        // Diners Club
        $diners_regex = "/^3(?:0[0-59]{1}|[689])[0-9]{0,}$/";

        //Discover
        $discover_regex = "/^(6011|65|64[4-9]|62212[6-9]|6221[3-9]|622[2-8]|6229[01]|62292[0-5])[0-9]{0,}$/";

        //JCB
        $jcb_regex = "/^(?:2131|1800|35)[0-9]{0,}$/";

        //ordering matter in detection, otherwise can give false results in rare cases
        if (preg_match($jcb_regex, $pan)) {
            return "jcb";
        }

        if (preg_match($amex_regex, $pan)) {
            return "amex";
        }

        if (preg_match($diners_regex, $pan)) {
            return "diners_club";
        }

        //sub visa/mastercard cards
        if ($include_sub_types) {
            if (preg_match($vpreca_regex, $pan)) {
                return "v-preca";
            }
            if (preg_match($postepay_regex, $pan)) {
                return "postepay";
            }
            if (preg_match($cartasi_regex, $pan)) {
                return "cartasi";
            }
            if (preg_match($entropay_regex, $pan)) {
                return "entropay";
            }
            if (preg_match($o2money_regex, $pan)) {
                return "o2money";
            }
            if (preg_match($kukuruza_regex, $pan)) {
                return "kukuruza";
            }
            if (preg_match($yunacard_regex, $pan)) {
                return "yunacard";
            }
        }

        if (preg_match($visa_regex, $pan)) {
            return "visa";
        }

        if (preg_match($mastercard_regex, $pan)) {
            return "mastercard";
        }

        if (preg_match($discover_regex, $pan)) {
            return "discover";
        }

        if (preg_match($maestro_regex, $pan)) {
            if ($pan[0] == '5') {//started 5 must be mastercard
                return "mastercard";
            }
                return "maestro"; //maestro is all 60-69 which is not something else, thats why this condition in the end

        }

        return "unknown"; //unknown for this system
    }

	function getCardBrandCode($brand){
		$brand_number = '000';
		if($brand == 'visa'){ $brand_number = '001'; }
		if($brand == 'mastercard'){ $brand_number = '002'; }
		if($brand == 'amex'){ $brand_number = '003'; }
		if($brand == 'discover'){ $brand_number = '004'; }
		return $brand_number;
	}

	function sanitize_for_andar($data){
		// Remove Commas
		$data = str_replace(',', '', $data);
		return $data;
	}

?>
