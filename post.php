<?php 

require_once 'bootstrap.php';

if(isset($_GET['post_id'])){
//edit
//var_dump($_GET['post_id']);
$posts = $post->selectById('posts', $_GET['post_id']);
$likes = $like->getLikes($_GET['post_id']);
//var_dump($_SESSION['loggedUser']);
$voted = $like->voted($_SESSION['loggedUser']->id,$_GET['post_id']);

//var_dump($voted);
}





require_once 'views/post.view.php';
?>