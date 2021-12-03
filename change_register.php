<?php 
require_once 'bootstrap.php';

/* $classes = $class->selectAll('classes');
var_dump($classes); */

//da ne moze da ide na register stranicu ako je logovan
 if(!isset($_SESSION['loggedUser'])){
    header("Location: index.php");
} 
if(isset($_SESSION['loggedUser'])){
$classes = $class->selectAll('classes');


if(isset($_GET['id'])){
    // var_dump($_GET['id']);
 $student =$user->selectById('users', $_GET['id']);
 $school_year_active = $school_year->selectByActive();
/*  $sy=$student_year->selectByIdAndActive($school_year_active[0]->id);
 //var_dump($sy);
 if($sy){
    var_dump($sy);
    //header('Location: index.php');
    
 }else{

 } */

 if(isset($_POST['registerBtn'])){
    var_dump('222');
    //save to student_year table  

    //$user_id,$_POST['class'],
    $school_year_active = $school_year->selectByActive();
    //var_dump($school_year_active);
    $year=$school_year_active[0]->id;
    $student_y = $student_year->createStudentYear($year);
    header("Location: index.php");
    //require_once 'views/index.view.php';
}

 //var_dump($student);
 //$register_name=$student[0]->name;
 //var_dump($register_name);
 //

 //
}

 
/* if(isset($_GET['id']) && isset($_POST['registerBtn'])){
    var_dump('222');
    //save to student_year table  

    //$user_id,$_POST['class'],
    $school_year_active = $school_year->selectByActive();
    //var_dump($school_year_active);
    $year=$school_year_active[0]->id;
    $student_y = $student_year->createStudentYear($year);
    header("Location: index.php");
    //require_once 'views/index.view.php';
}
     */
}






require_once 'views/change.register.view.php';



//require_once 'views/index.view.php';
?>