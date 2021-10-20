<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_POST['section_sub_btn'])){ 
    //var_dump("proslo");
   $data = $section->createSection();  
}

require_once 'views/addsection.view.php';