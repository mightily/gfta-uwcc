<?php

class ExtendedClient extends SoapClient {
    
    public $mode = 'test';

    function __construct($wsdl, $options = null) {
        
        $this->mode = $options['mode'];

        parent::__construct($wsdl, $options);

    }

    // This section inserts the UsernameToken information in the outgoing SOAP message.
    function __doRequest($request, $location, $action, $version, $one_way = NULL) {

        $user = gf_to_andar()->get_plugin_setting('cybersourceMerchantId');

        $password = '';
        
        if($this->mode == 'prod'){
            
            $password = gf_to_andar()->get_plugin_setting('cybersourceTransactionKeyProd');
            
        } else {
            
            $password = gf_to_andar()->get_plugin_setting('cybersourceTransactionKeyTest');
            
        }
        
        $soapHeader = "<SOAP-ENV:Header xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"><wsse:Security SOAP-ENV:mustUnderstand=\"1\"><wsse:UsernameToken><wsse:Username>$user</wsse:Username><wsse:Password Type=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText\">$password</wsse:Password></wsse:UsernameToken></wsse:Security></SOAP-ENV:Header>";

        $requestDOM = new DOMDocument('1.0');
        $soapHeaderDOM = new DOMDocument('1.0');

        try {

            $requestDOM->loadXML($request);
            $soapHeaderDOM->loadXML($soapHeader);

            $node = $requestDOM->importNode($soapHeaderDOM->firstChild, true);
            $requestDOM->firstChild->insertBefore($node, $requestDOM->firstChild->firstChild);
            $request = $requestDOM->saveXML();

            // printf( "Modified Request:\n*$request*\n" );

        } catch (DOMException $e) {

            die( 'Error adding UsernameToken: ' . $e->code);

        }

        return parent::__doRequest($request, $location, $action, $version, $one_way);

    }

}

?>