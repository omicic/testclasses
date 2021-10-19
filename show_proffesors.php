<?php 

require_once 'bootstrap.php';

    $proffesors = $user->selectAll('proffesor');
    //var_dump($proffesors);


require_once 'views/show_proffesors.view.php';
?>