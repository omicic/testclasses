<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_POST['class_sub_btn'])){ 
   $data = $class->createClass();  
}

require_once 'views/addclass.view.php';