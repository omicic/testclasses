<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}


//var_dump($subjects);



//$subject_for_add = [];
//$subjects = $subject->selectAll('subjects');
$sections_for_add = [];
$sections = $section->selectAll('sections');

if(isset($_POST['add_dept_btn'])){
   $last_id_department=$department->createDepartment();
 
    if($last_id_department){  
      $new_department = json_decode($_POST['arraySubjects']);
      if($departmentsections->createDepartmentSectons($last_id_department,$new_department)){
        header("Location: show_departments.php");
      } 
      
    }  

}


require_once 'views/adddepartment.view.php';