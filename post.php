<?php 

require_once 'bootstrap.php';


if(isset($_GET['post_id'])){
    $comments = $comment->selectAllByPostId($_GET['post_id']);
    $posts = $post->selectById('posts', $_GET['post_id']);
    $likes = $like->getLikes($_GET['post_id']);
}


require_once 'views/post.view.php';
?>