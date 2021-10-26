<?php     
require 'classes/Contact.php';


if(isset($_POST["btnSend"])){
    $contactmessage = new Contact();
    $contactmessage->addContactMessage();  
}




require 'views/contact.view.php';
?>