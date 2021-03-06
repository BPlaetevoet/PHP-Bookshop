<?php
session_start();

require_once 'bootstrap.php';

use Bookshop\Business\UserService;

define('MY_EMAIL', 'bart.plaetevoet@telenet.be');
define('EMAIL_SUBJECT', 'bookshop contact-formulier');

$page = $_POST["page"];
function errorResponse($message){
    header("HTTP/1.1 500 Internal Server Error");
    die (json_encode(array('message'=>$message)));
}

function checkfields($fields_req){
    foreach($fields_req as $name => $required){
        if($required && empty($_POST[$name])){
            errorResponse("$name is niet ingevuld");
        }
    }
}
function setMessageBody ($fields_req) {
    $message_body = "";
    foreach ($fields_req as $name) {
      if(!empty($_POST[$name])){
            $message_body .= ucfirst($name) . ": " . $_POST[$name] . "\n";
        }
      }
      
      return $message_body;
  }
header ('Content-type: application/json');

if($page=="registreer"){
        $fields_req = array("naam"=>true, 
            "voornaam"=>true, 
            "mail"=>true, 
            "adres"=>true, 
            "postcode"=>true, 
            "gemeente"=>true, 
            "password"=>true);
        checkfields($fields_req);
        $naam = \htmlspecialchars($_POST["naam"]);
        $voornaam = \htmlspecialchars($_POST["voornaam"]);
        $mail = \htmlspecialchars($_POST["mail"]);
        $adres =  \htmlspecialchars($_POST["adres"]);
        $postcode = \htmlspecialchars($_POST["postcode"]);
        $gemeente = \htmlspecialchars($_POST["gemeente"]);
        $password = \base64_encode(\htmlspecialchars($_POST["password"]));
        $registratie = UserService::RegisterNewUser($mgr, $naam, $voornaam, $mail, 
           $adres, $postcode, $gemeente, $password);
        if($registratie){
            $login = userService::validateUser($mgr, $mail, $password);
            $_SESSION["login"]= $login[0]->getId(); 
            echo json_encode(array('message'=>'Bedankt om te registreren.'));
        }else{
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array('message'=>'Dit e-mail adres is al in gebruik '));
        }

}elseif($page=="contact"){
        $fields_req = array("naam"=>true, "voornaam"=>true, "mail"=>true, "boodschap"=>true);
        checkfields($fields_req);
        $messageBody = setMessageBody($fields_req);
        $email = $_POST["mail"];
        if(mail(MY_EMAIL, EMAIL_SUBJECT, $messageBody, "from: $email" )){
            echo json_encode(array('message'=>'Uw boodschap werd verstuurd.'));
        }else {
            header ('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array('message'=>'Ooooooops er ging iets fout.'));
        }   
   }

