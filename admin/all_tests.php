<?php 
$title = "All tests";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}
//$admin = getUser($_SESSION['id']);
//dd($all_categories);

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
        //dd($all_categories[$cat_id]['category_id']);
        $tests = getAllTestsForAdminCategory($_SESSION['id'],$all_categories[$cat_id]['category_id']);
        if($test){
            header("Location: all_tests.php");
        }
  
    }else{
        $tests = getAllTestsForAdmin($user['id']);
    
    }
} 

//dd($tests);

require "./views/all_tests.view.php";