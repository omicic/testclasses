<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_POST['year_sub_btn'])){ 
   $data = $school_year->createSchoolYear();  
}

require_once 'views/addschoolyear.view.php';