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
* Purpose           : Get Status by send id
*
* 2018        nmtsms.ir      
*
**********************************************************************/
class GetStatusesBySid {
    
    private $userName;
    private $password;
    private $sid;
    
    function __construct($userName, $password, $sid) {
        $this->userName = $userName;
        $this->password = $password;
        $this->sid = $sid;
    }
    
    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getSid() {
        return $this->sid;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setSid($sid) {
        $this->sid = $sid;
    }



    
    
}
