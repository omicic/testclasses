<?php 

require "core/init.php";

$post_id = $_POST['post_id'];
$body = $_POST['body'];

$comment_id = $_GET['link-id'];
//dd($comment_id);


if(userComment($post_id,$body,$comment_id)){
    header("Location: single_post.php?id=".$post_id);
}else{
    header("Location: error.php");
}
