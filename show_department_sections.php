<?php 

require_once 'bootstrap.php';
$sections = $section->selectAll('sections');
if(isset($_GET['id'])){
    $id_department = $_GET['id'];
   //var_dump($id_department);
    $department = $department->selectById('departments',$id_department);
    $department_sections = $departmentsections->selectAllById($id_department);

   
    var_dump($department_sections);
}

    

require_once 'views/show_department_sections.view.php';
?>