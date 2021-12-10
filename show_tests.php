<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}
$tests=$test->selectAllByAdmin($_SESSION['loggedUser']->id);

if(isset($_POST['checkAllTests'])){
    var_dump($_POST['checkAllTests']);
}

//$data = array();
//var_dump($_POST['test_ids_for_deleting']);
//
$array=[];
$testsForDeleting='';

if(isset($_POST['buttonDelete'])){
    $testsForDeleting = $_POST['buttonDelete'];
    $array = explode(',',$testsForDeleting);
    var_dump($array);

    for ($i=0; $i < count($array) ; $i++) { 
        $deleted = $test->deleteById('tests',$array[$i]);
        if(!$deleted){
            header('Location: error.php');
        }
    } 

    header('Location: show_tests.php');

}
   
    /* $data = 'Your array is: ' . $_POST['myArray'];       
echo json_encode($data);  
die();  */     



require_once 'views/show_tests.view.php';