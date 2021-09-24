<?php 
$title = "LifeBook";
require "core/init.php";



//$all_public_posts = getAllPublicPostsFromUser($_GET['id']);
$all_public_posts = getAllPublicPosts();



require "views/user_posts.view.php";