<?php 
require_once 'bootstrap.php';

/* $classes = $class->selectAll('classes');
var_dump($classes); */

//da ne moze da ide na register stranicu ako je logovan
/* if(isset($_SESSION['loggedUser'])){
    header("Location: index.php");
} */

if(isset($_GET['id'])){
 $student =$user->selectById('users', $_GET['id']);
 //var_dump($student[0]);
 $register_name=$student[0]->name;

 $classes = $class->selectAll('classes');
}



require_once 'views/change.register.view.php';?>