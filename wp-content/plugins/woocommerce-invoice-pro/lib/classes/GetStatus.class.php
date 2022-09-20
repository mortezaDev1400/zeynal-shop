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
* Purpose           : Manage Status text
*
* 2018        nmtsms.ir      
*
**********************************************************************/
class GetStatus {
   private $status;
   
   function __construct($id) {
       $this->status = $id;
   }
   function getStatus() {
       return $this->status;
   }

   function setStatus($status) {
       $this->status = $status;
   }


}
