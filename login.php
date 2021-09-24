<?php 
$title = "Login";
require "core/init.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    
  
    if(!isset($_POST['email']) || empty($_POST['email'])){
        $email_error = "Emal name is required";
        array_push($errors,$email_error);
    }else{
        $email = $_POST['email'];
    }
    if(!isset($_POST['password']) || empty($_POST['password'])){
        $password_error = "Password name is required";
        array_push($errors,$password_error);
    }else{
        $password = $_POST['password'];
    }
    

    if(count($errors) == 0){
        $role = login_user($email,$password);
   
        if(login_user($email,$password)){
            if($role === 'user'){
                header('Location: user/home.php?success=1');
            }else{
                //dd(true);
                header('Location: admin/home.php?success=1');
            }
           
        }else{
            $wrong_email_pass = "Wrong email password combination";
        }
    }
}

require "views/login.view.php";

