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
* Purpose           : Send SMS
*
* 2018        nmtsms.ir      
*
**********************************************************************/
class SendMessage {
    
    private $userName;
    private $password;
    private $text;
    private $senderNumber;
    private $mobile;
    private $isFlash;
    
    function __construct($userName, $password, $text, $senderNumber, $mobile, $isFlash) {
        $this->userName = $userName;
        $this->password = $password;
        $this->text = $text;
        $this->senderNumber = $senderNumber;
        $this->mobile = $mobile;
        $this->isFlash = $isFlash;
    }
    
    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getText() {
        return $this->text;
    }

    function getSenderNumber() {
        return $this->senderNumber;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getIsFlash() {
        return $this->isFlash;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setSenderNumber($senderNumber) {
        $this->senderNumber = $senderNumber;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setIsFlash($isFlash) {
        $this->isFlash = $isFlash;
    }



    
}
