<?php 
class Contact{
    public function addContactMessage(){

  
        
    $errormsg=[];
    $to_email = 'omicic@gmail.com';

    if(isset($_POST['sender_email'])){
    $email_title = filter_var($_POST['sender_email'], FILTER_SANITIZE_EMAIL);
    $headers = 'From: '.$email_title;
    }else{
        array_push($errormsg, "Email address isn't valid");
    }
    //var_dump($email_title);
    if(isset($_POST['name'])){
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }else {
        $name_error = "Name is not properly entered";
        array_push($errormsg, $name_error);
    }

    if(isset($_POST['name'])){
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }else {
        $name_error = "Subject is not properly entered";
        array_push($errormsg, $name_error);
    }

    if(isset($_POST['message'])){
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    }else {
        $name_error = "Message is not properly entered";
        array_push($errormsg, $name_error);
    }

    
    //$message = 'This mail is sent using the PHP mail function';
    if(count($errormsg)==0){
        mail($to_email,$subject,$message,$headers); 
        header('Location: contact.php?success=true');
    }else{
        header('Location: error.view.php');
    }

}
}
?>