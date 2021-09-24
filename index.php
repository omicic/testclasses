<?php 
$title = "Testclass";
require "core/init.php";

$categories = getCategories();
$role ="";

$all_categories = getCategories();
if(isset($_POST['myCategory'])){
    $search_category = $_POST['myCategory'];
    for ($i=0; $i < count($all_categories); $i++) { 
        if($search_category == $all_categories[$i]['name']){       
            $category=$all_categories[$i]['id'];  
        }
    }
}

if(isset($user['id'])){
    $role = getRole($user['id']);
}

if(isset($admin['id'])){
    $admin_categories = getAdminCategories($admin['id']);
}

if(isset($category)){
  
    if(count($user) == 0){
        $all_public_tests = getAllPublicTestsWithCategory($category);
    } else{
        //dd("2");
        if($user['role']=="admin"){
            if(isset($user['id'])){
                $all_public_tests = getAllTestsFromAdminCategory($user['id'],$category);
        
            }    
        } else{
            //dd("3");
            $all_public_tests = getAllPublicTestsWithCategory($category); 
        } 
    } 
}else{

    if(count($user) != 0){
            if($user['role']=="admin"){
               // dd("6");
               if(isset($user['id'])){
                $all_public_tests = getAllTestsForAdmin($user['id']);
                 if(getRole($user['id'])){
                     $role = getRole($user['id']);
                 };
               }
                
            }else{
                $all_public_tests = getAllPublicTests();  
                      
            }
    }else{
        //dd('ovde');
        $all_public_tests = getAllPublicTests();  
    }   
}




require "views/index.view.php";