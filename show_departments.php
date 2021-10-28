<?php 

require_once 'bootstrap.php';

    $departments = $department->selectAll('departments');
    //$sections_of_department = $department_sections->selectAllSections($)
    //var_dump($departments);


require_once 'views/show_departments.view.php';
?>