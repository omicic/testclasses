<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_POST['department_sub_btn'])){ 
    //var_dump("proslo");
   $data = $department->createDepartment();  
}

require_once 'views/adddepartment.view.php';