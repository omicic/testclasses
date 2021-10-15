<?php 

require_once 'bootstrap.php';
//var_dump($voted);

if($_GET['post_id']){
    $voted = $like->voted($_SESSION['loggedUser']->id,$_GET['post_id']);
    //var_dump($voted);
    if(!$voted){
        $like->addVote($_SESSION['loggedUser']->id, $_GET['post_id']);
    }else{
        $like->removeVote($_SESSION['loggedUser']->id, $_GET['post_id']);
    }
    
    header('Location: post.php?post_id='.$_GET['post_id']);
}