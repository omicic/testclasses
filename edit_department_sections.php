<?php 

require_once 'bootstrap.php';
$sections = $section->selectAll('sections');



if(isset($_GET['id'])){

    $id_department = $_GET['id'];

    if(isset($_POST['changed_description_btn'])){
        //var_dump($_POST['description']);
        $description = $_POST['description'];
        $name = $_POST['name'];
        $departmentupdated = $department->updateById($id_department,$name,$description);
        if($departmentupdated){
            header('Location: edit_department_sections.php?id='.$_GET['id']);
        }else{
            header('Location: error.php');
        }   
    }

    
    $department = $department->selectById('departments',$id_department);
    $department_sections = $departmentsections->selectAllById($id_department);
    if(isset($_POST['add_to_section_btn'])){
   
        $sect_id=$_POST['section'];
         if($departmentsections->createDepartmentSecton($id_department,$sect_id)){
            $department_sections = $departmentsections->selectAllById($id_department);
         }
     }

    if(isset($_GET['delete_id'])){
        $departmentsections->deleteById('department_sections',$_GET['delete_id']);
        header('Location: edit_department_sections.php?id='.$_GET['id']);
    }

}
   

require_once 'views/edit_department_sections.view.php';
?>