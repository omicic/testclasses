<?php 

require "config.php";
require "connection.php";
require "helpers.php";
require "db_functions.php";
require "db_post_functions.php";
require "db_test_questions_functions.php";
require "db_admin_category_functions.php";
require "db_user_test_db_functions.php";


if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_SESSION['id'])){
    $user = getUser($_SESSION['id']);
    if($user['role'] == 'admin'){
        $all_categories = getAdminCategories($user['id']);
    }
}else{
    $user=[];
}