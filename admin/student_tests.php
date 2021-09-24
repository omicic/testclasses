<?php 
$title = "All tests";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}
//$admin = getUser($_SESSION['id']);
//$all_categories = getAdminCategories($admin['id']);

$exist=false;
$tests = getAllTestsForAdmin($user['id']);


if($_SERVER['REQUEST_METHOD'] === "POST"){
//dd(true);
    $searched_category = $_POST['myCategory'];
    //dd($searched_category);
 
    for ($i=0; $i < count($all_categories); $i++) { 
         if($searched_category == $all_categories[$i]['name']){
             $exist=true;
             $cat_id=$i;
             
         }
    }

    if($exist){

        $tests = getAllTestsForAdminCategory($_SESSION['id'],$all_categories[$cat_id]['category_id']);
        if($test){
            header("Location: student_test.php");
        }
  
    }else{
        $tests = getAllTestsForAdmin($user['id']);
    
    }
} 



if($_SERVER['REQUEST_METHOD'] === "GET"){
    
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
    }
 
    if(isset($_GET['id'])){
        $done_tests_id = $_GET['id'];
        if($done_tests_id){
            $done_tests= getDoneTests($done_tests_id);
            $test = getSingleTest($_GET['id']);//treba nam category_id
        } 
    }
}




require "./views/show_students_tests.view.php";