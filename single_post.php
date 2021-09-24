<?php 
$title = "LifeBook";
require "core/init.php";

$categories = getCategories();

$post = getSinglePost($_GET['id']);
// get likes
//dd($_GET['id']);
$likes = getLikes($_GET['id']);

// comments
$comments = getPostComments($_GET['id']);
//dd($comments);

require "views/single_post.view.php";
