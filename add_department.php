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
var_dump($sections);


if(isset($_POST['add_dept_btn'])){
   
   var_dump($_POST['arraySubjects']);
    //$data = ; 

    if($department->createDepartment()){
      header("Location: index.php");
    } 

}
  //$subject_dept=$_POST['data'];
  //$subject_dept = json_decode("$subject_dept",true);
  //echo "key1":".$data["key1"];
  //var_dump($_REQUEST['data']);
 //}





require_once 'views/adddepartment.view.php';