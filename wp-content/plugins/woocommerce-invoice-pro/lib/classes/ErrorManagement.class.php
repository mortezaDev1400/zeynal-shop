<?php
/**********************************************************************
* Project           : PHP Soap Client
*
* Program name      : Webservice client
*
* Author            : nmtsms.ir
*
* Date created      : 2018
*
* Purpose           : Manage Error codes
*
* 2018        nmtsms.ir      
*
**********************************************************************/

class ErrorManagement {
    
    private $errorCode;
    function __construct($errorCode){
        $this->errorCode = $errorCode;
    }
    function getErrorCode() {
        return $this->errorCode;
    }

    function setErrorCode($errorCode) {
        $this->errorCode = $errorCode;
    }



    
}
