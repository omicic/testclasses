<?php 
$title = "Chose your category list";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);
$all_categories = getCategories();
//dd($all_categories);
$admin_categories = getAdminCategories($admin['id']);
//dd($admin_categories);

if($_SERVER['REQUEST_METHOD'] == "POST"){

   $searched_category = $_POST['myCategory'];

   for ($i=0; $i < count($all_categories); $i++) { 
        if($searched_category == $all_categories[$i]['name']){
            $exist=true;
            $index=$i;
        }
   }

        if($exist){  
            if(addAdminCategories($admin['id'], $all_categories[$index]['id'])){             
                header("Location: add_category.php");
            }else{
                header("Location: ./error.php");
            }            
        }else{
            $cat_id = addCategory($searched_category);
            if($cat_id){
                $added_category = getCategoryName($cat_id);
                if(addAdminCategories($admin['id'], $added_category['id'])){
                    header("Location: add_category.php");
                }else{
                    header("Location: ./error.php");
                }             
        }        
    }    
}

require "./views/new_category.view.php";

