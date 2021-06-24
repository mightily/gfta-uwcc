<?php
/*
Plugin Name: Gravity Forms to Andar
Plugin URI: https://mightily.com
Description: Connects Gravity Forms to Andar CRM
Version: 2.2
Author: Mightily
Author URI: https://mightily.com

------------------------------------------------------------------------
Copyright 2013-2018 Mightily, LLC.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/
if( ! class_exists( 'Smashing_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}

require_once( 'includes/helper.php' );
require_once( 'includes/andar-field-list.php' );
require_once( 'includes/rest-endpoint.php' );

define( 'GF_SIMPLE_ADDON_VERSION', '2.1' );
define( 'GF_SIMPLE_FIELD_ADDON_VERSION', '1.0' );

$updater = new Smashing_Updater( __FILE__ );
$updater->set_username( 'mightily' );
$updater->set_repository( 'gfta-uwcc' );
$updater->initialize();

add_action( 'gform_loaded', array( 'GF_to_Andar_Bootstrap', 'load' ), 5 );
add_action( 'gform_loaded', array( 'GF_to_Andar_Account_Field_Bootstrap', 'load' ), 5 );
add_action( 'gform_loaded', array( 'GF_to_Andar_Address_Field_Bootstrap', 'load' ), 5 );
add_action( 'gform_loaded', array( 'Cybersource_SOAP_Client', 'load' ), 5 );

class Cybersource_SOAP_Client {

	public static function load() {

		require_once( 'class-cybersource.php' );
		
	}
    
}

class GF_to_Andar_Bootstrap {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			
            return;
			
        }

        require_once( 'class-gftoandar.php' );

        GFAddOn::register( 'GFtoAndar' );
		
    }

}

class GF_to_Andar_Account_Field_Bootstrap {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			
            return;
			
        }

        require_once( 'class-gftoandaraccount.php' );

        GFAddOn::register( 'GFtoAndarAccount' );
		
    }

}

class GF_to_Andar_Address_Field_Bootstrap {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			
            return;
			
        }

        require_once( 'class-gftoandaraddress.php' );

        GFAddOn::register( 'GFtoAndarAddress' );
		
    }

}

function gf_to_andar() {
	
    return GFtoAndar::get_instance();
	
}

function gf_to_andar_account() {
	
    return GFtoAndarAccount::get_instance();
	
}

function gf_to_andar_address() {
	
    return GFtoAndarAddress::get_instance();
	
}