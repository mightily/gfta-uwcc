<?php

function get_andar_data($data) {
	
	if(!isset($data['andaremail'])){
		
		return '{}';
		
	}
	
	$email_address = strip_tags($data['andaremail']);
	
	if(gf_to_andar()->get_plugin_setting('andar_environment') == 'Production'){
		
		$curl_url = gf_to_andar()->get_plugin_setting('andarApiRetrieveUrl');
		
		$ch_data = array(
			'api_key' => gf_to_andar()->get_plugin_setting('andarApiKey'),
			'name' => 'API_Ind_Email',
			'parameters'    => 'emailAddress,'.$email_address
		);
		
	} else {
		$curl_url = gf_to_andar()->get_plugin_setting('andarApiRetrieveUrl');
		
		$ch_data = array(
			'api_key' => gf_to_andar()->get_plugin_setting('andarApiKey'),
			'name' => 'API_Ind_Email',
			'parameters'    => 'emailAddress,'.$email_address
		);
		
		//$curl_url = gf_to_andar()->get_plugin_setting('testandarApiRetrieveUrl');
		
		//$ch_data = array(
		//	'api_key' => gf_to_andar()->get_plugin_setting('testandarApiKey'),
		//	'name' => 'API_Ind_Email',
		//	'parameters'    => 'emailAddress,'.$email_address
		//);
		
	}	
	
	$ch_data = http_build_query($ch_data);
	
	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_URL, $curl_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $ch_data);
	
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	
	curl_close($ch);
	
	$response_code = get_response_status_code($output);
	//var_dump($output);
	if($response_code == '200'){
		
		// Convert csv output to arrays
		$lines = explode(PHP_EOL, $output);
		
		$response_array = [];
		
		foreach ($lines as $line) {
			
			$response_array[] = str_getcsv($line);
			
		}
		
		// Remove last value of array, it is blank
		array_pop($response_array);
		
		// Store status of response, it is first value of array
		$status = $response_array[0];
		
		// Remove status from response array
		array_shift($response_array);
		
		// If data was returned, not just a status. First value will be headers.
		$headers = [];
		
		if(count($response_array) > 0){
			
			$headers = $response_array[0];
			
			// Remove headers from response array
			array_shift($response_array);
			
		}
		
		// If response array has data after we removed the headers, and headers is not empty
		$user_contact_info = [];
		
		if(count($response_array) > 0 && count($headers) > 0){
			
			foreach($response_array as $user_data_array){
				
				$user_contact_info[] = array_combine($headers, $user_data_array);
				
			}
			
		}
		
		// If user has more than one record in andar, we need to choose one to use
		$user_contact_row = [];
		
		if(count($user_contact_info) === 0){
			
			return '{}';
			
		}
		
		if(count($user_contact_info) === 1){
			
			$user_contact_row = $user_contact_info[0];
			
		} else {
			// We need to use the row that has the most data
			$user_contact_info_key = 0;
			
			$user_data_count_const = 0;
			
			foreach($user_contact_info as $key => $single_user_contact){
				
				$user_data_count = count(array_filter($single_user_contact, function($v, $k){
					return($v && $v != '-null-');
				}, ARRAY_FILTER_USE_BOTH));
				
				if($user_data_count > $user_data_count_const){
					
					$user_contact_info_key = $key;
					
					$user_data_count_const = $user_data_count;
					
				}
				
			}
			
			$user_contact_row = $user_contact_info[$user_contact_info_key];
			
		}
		
		// Set the email field
		if(isset($user_contact_row['PERSONALEMAIL_1'])){
			
			$user_contact_row['EMAIL'] = $user_contact_row['PERSONALEMAIL_1'];
			
		} elseif(isset($user_contact_row['PERSONALEMAIL_2'])){
			
			$user_contact_row['EMAIL'] = $user_contact_row['PERSONALEMAIL_2'];
			
		} else {
			
			$user_contact_row['EMAIL'] = $user_contact_row['WORKEMAIL'];
			
		}
		
		// $user_contact_row['PERSONALEMAIL_1'];
		return json_encode($user_contact_row);
		
	} else {
		
		return '{}';
		
	}
	
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'gftoandar/v1', '/account', array(
		'methods' => 'GET',
		'callback' => 'get_andar_data',
	));
});