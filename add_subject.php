<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_POST['subject_sub_btn'])){ 
    //var_dump("proslo");
   $data = $subject->createSubject();  
}

require_once 'views/addsubject.view.php';