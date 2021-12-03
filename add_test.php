<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

//$sections_for_add = [];
//$sections = $section->selectAll('sections');

if(isset($_POST['add_dept_btn'])){
   $last_id_department=$department->createDepartment();
 
    if($last_id_department){  
      $new_department = json_decode($_POST['arraySubjects']);
      $new_department_sections = $new_department->sections;
      if($departmentsections->createDepartmentSectons($last_id_department,$new_department_sections)){
        header("Location: show_test.php");
      } 
      
    }  

}


require_once 'views/addtest.view.php';