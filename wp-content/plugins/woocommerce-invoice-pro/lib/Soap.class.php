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
* Purpose           : Soap Package
*
* 2018        nmtsms.ir      
*
**********************************************************************/
require_once 'classes/GetCredit.class.php';
require_once 'classes/ErrorManagement.class.php';
require_once 'classes/GetInbox.class.php';
require_once 'classes/SendMessage.class.php';
require_once 'classes/GetStatusesBySid.class.php';
require_once 'classes/GetStatus.class.php';


class Soap
{
  private $username;
  private $password;
  private $wsdl = "http://%s/web/webservice.asmx?wsdl";
  private $soapClient;

  function __construct($username , $password , $domain="nmtsms.ir"){
    $this->username   = $username;
    $this->password   = $password;
    $this->wsdl       = sprintf($this->wsdl,$domain);
    $this->soapClient = new SoapClient($this->wsdl );
    
  }

  public function getCredit(){
    $credit = new GetCredit($this->username, $this->password);
    $response= $this->soapClient->GetCredit($credit);
    $response = $response->GetCreditResult;
    
    if( $response < 0){
        $message = $this->getErrorText($response);
        throw new Exception($message,$response);

    }else{
        return array('credit'=>$response);
    }
  }
  
  public function getInbox($senderNumber , $count){
  
      $getInbox = new GetInbox($this->username, $this->password, $senderNumber, $count);
      $response = $this->soapClient->GetInbox($getInbox);
      //$responseParse = get_object_vars($response);
      if(!isset($response->GetInboxResult->Messagees->Message  ))
          return array();
      if ($response->GetInboxResult->ErrorCode < 0 ) {
          $message = $this->getErrorText($response->GetInboxResult->ErrorCode);
          throw new Exception($message,$response->GetInboxResult->ErrorCode);
          
      }else{
          
          $inbox = array();
          if(is_array($response->GetInboxResult->Messagees->Message)){
              foreach($response->GetInboxResult->Messagees->Message as $val)
                  array_push($inbox, array("receiver"=>$val->SenderNumber,"sender"=>$val->Mobile,"text"=>$val->Text,"date"=>$val->Date) );
          }else{
              array_push($inbox, array("receiver"=>$response->GetInboxResult->Messagees->Message->SenderNumber,
                                        "sender" =>$response->GetInboxResult->Messagees->Message->Mobile,
                                        "text"   =>$response->GetInboxResult->Messagees->Message->Text,
                                        "date"   =>$response->GetInboxResult->Messagees->Message->Date) 
                                       );
          }
          return $inbox;
      }
  }
  
  public function sendMessage($text,$senderNumber,$mobile,$isFlash=False){
      $sendMessage = new SendMessage($this->username, $this->password, $text, $senderNumber, $mobile, $isFlash);
      $response = $this->soapClient->SendBulk2($sendMessage);
      $responseParse = get_object_vars($response);
      if($responseParse["SendBulk2Result"]->ErrorCode < 0){
          $message = $this->getErrorText($responseParse["SendBulk2Result"]->ErrorCode);
          throw new Exception($message,$responseParse["SendBulk2Result"]->ErrorCode);
      }else{
          $result = array();
          $result['sid']          = $responseParse["SendBulk2Result"]->Sid;
          $result['senderNumber'] = $senderNumber;
          $result['isFlash']      = $isFlash;
          $responseParseNumbers = get_object_vars($responseParse["SendBulk2Result"]->Idies);
          $numberArrays = array();
          
          if(sizeof($mobile)==1)
                array_push( $numberArrays,array('number'=>$mobile[0],'sid'=>$responseParseNumbers['long']) );
          else
            foreach ($responseParseNumbers['long'] as $index=>$sid)
                array_push( $numberArrays,array('number'=>$mobile[$index],'sid'=>$sid) );  
          
          $result['numbers']=$numberArrays;
          return $result;
      }
  }

  
  public function GetStatusesBySid($sid){
      
      $statusId = new GetStatusesBySid($this->username, $this->password, (int)$sid);
      $response = $this->soapClient->GetStatusesBySid($statusId);
      if((int)$response->GetStatusesBySidResult->ErrorCode < 0){
            $message = $this->getErrorText($response->GetStatusesBySidResult->ErrorCode);
            throw new Exception($message,$response->GetStatusesBySidResult->ErrorCode);
       }else{
            $statuses = array();            
            if(is_array($response->GetStatusesBySidResult->Statuses->SmsStatus)){
                foreach ($response->GetStatusesBySidResult->Statuses->SmsStatus as $val){
                    $statusNumberId= $val->Status;
                    $statusText = $this->getStatusIdText($statusNumberId);
                    array_push ($statuses, array("number"=>$val->Mobile,"status"=>$statusText,"code"=>$statusNumberId));      
                }
            }else{
                $number = $response->GetStatusesBySidResult->Statuses->SmsStatus->Mobile;
                $statusCode = $response->GetStatusesBySidResult->Statuses->SmsStatus->Status;
                $statusText = $this->getStatusIdText($statusCode);
                array_push ($statuses, array("number"=>$number,"status"=>$statusText,"code"=>$statusCode)); 
                
            }
            return($statuses);
       }
      
  }
  
  public function getStatusIdText($id){
      $getStatus = new GetStatus((string)$id);
      $response = $this->soapClient->Status($getStatus);
     return $response->StatusResult;
  }

  
  public function getErrorText($errorCode){
      $error = new ErrorManagement($errorCode);
      $response = $this->soapClient->Error($error);
      return $response->ErrorResult;
  }

  
  function getUsername() {
      return $this->username;
  }

  function getPassword() {
      return $this->password;
  }

  function getWsdl() {
      return $this->wsdl;
  }

  function getSoapClient() {
      return $this->soapClient;
  }

  function setUsername($username) {
      $this->username = $username;
  }

  function setPassword($password) {
      $this->password = $password;
  }

  function setWsdl($wsdl) {
      $this->wsdl = $wsdl;
  }

  function setSoapClient($soapClient) {
      $this->soapClient = $soapClient;
  }




}

