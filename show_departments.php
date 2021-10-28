<?php 

require_once 'bootstrap.php';

    $departments = $user->selectAll('department');
    //var_dump($proffesors);


require_once 'views/show_departments.view.php';
?>