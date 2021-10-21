<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}


//var_dump($subjects);



$subject_for_add = [];
$subjects = $subject->selectAll('subjects');

//if($_POST['add_subject_to_department_btn']){ 
   // var_dump('1');
    // if(isset($_POST['result'])){
       // var_dump('1');
   //// } 
    //$subjects[count($subjects)] = $_POST['subjects'];
   //$data = $department->createDepartment();  

  // if(isset($_POST['result'])){
    //$subject_dept = $_POST['data'];
   // $subject_dept = json_decode(stripslashes($_POST['data']));
   // var_dump($subject_dept);
    // here i would like use foreach:
    
//}






 if(isset($_POST['department_sub_btn'])){ 
    var_dump("proslo");
   //$data = $department->createDepartment(); 

   //$subject_dept = json_decode(stripslashes($_POST['result']));
    //var_dump($subject_dept);
} 


require_once 'views/adddepartment.view.php';