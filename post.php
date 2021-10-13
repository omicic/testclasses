<?php 

require_once 'bootstrap.php';

if(isset($_GET['post_id'])){
//edit
//var_dump($_GET['post_id']);
$posts = $post->selectById('posts', $_GET['post_id']);
//var_dump($p[0]->title);
}





require_once 'views/post.view.php';
?>