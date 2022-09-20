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
* Purpose           : Manage Inbox 
*
* 2018        nmtsms.ir      
*
**********************************************************************/
class GetInbox {
    private $userName;
    private $password;
    private $senderNumber;
    private $count;
    
    
    function __construct($userName, $password, $senderNumber, $count) {
        $this->userName = $userName;
        $this->password = $password;
        $this->senderNumber = $senderNumber;
        $this->count = (int)$count;
    }
    

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getSenderNumber() {
        return $this->senderNumber;
    }

    function getCount() {
        return $this->count;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setSenderNumber($senderNumber) {
        $this->senderNumber = $senderNumber;
    }

    function setCount($count) {
        $this->count = $count;
    }


    
}
