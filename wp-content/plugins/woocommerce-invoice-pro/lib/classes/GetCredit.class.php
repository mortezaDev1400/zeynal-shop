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
* Purpose           : Manage Credite 
*
* 2018        nmtsms.ir      
*
**********************************************************************/
class GetCredit
{
  public $userName;
  public $password;
  function __construct($username , $password){
    $this->userName = $username;
    $this->password = $password;
  }
  function getUserName() {
      return $this->userName;
  }

  function getPassword() {
      return $this->password;
  }

  function setUserName($userName) {
      $this->userName = $userName;
  }

  function setPassword($password) {
      $this->password = $password;
  }


}