<?php 
$title = "All tests";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

//$users = getUsers(); ///opasnost za bezbenost!!!!!!!!!!!!!!!!!!

//dd($users);


if($_SERVER['REQUEST_METHOD'] === "GET"){

    if(isset($_GET['id'])){
        $done_tests_id = $_GET['id'];
        if($done_tests_id){
            $done_tests= getDoneTests($done_tests_id);
          
            $test = getSingleTest($_GET['id']);//treba nam category_id
          //dd($test);
         } 
    }
 //
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    if(isset($_POST['studentName'])){
        $studentName = $_POST['studentName'];
        dd($studentName);
        $stringname = explode(" ", $studentName);
        $firstName = $stringname[0];
        $lastName = $stringname[1];
    
        $done_tests = getDoneTestsByName($done_tests_id, $firstName, $lastName);
       
        $test = getSingleTest($_GET['id']);
    }

}



require "./views/results_for_test.view.php"; 