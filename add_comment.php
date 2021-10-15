<?php 
require 'bootstrap.php';


if(isset($_POST['add_comment_btn'])){
  
    if(isset($_POST['body'])){
        $comment->addComment($_SESSION['loggedUser']->id, $_POST['post_id']);
    }

    header('Location: post.php?post_id='.$_POST['post_id']);

}