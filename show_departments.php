<?php 

require_once 'bootstrap.php';

    $departments = $department->selectAll('departments');

require_once 'views/show_departments.view.php';
?>