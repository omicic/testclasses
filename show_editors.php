<?php 

require_once 'bootstrap.php';

    $editors = $user->selectAll('editor');
    //var_dump($editors);


require_once 'views/show_editors.view.php';
?>