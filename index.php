<?php 

require_once 'bootstrap.php';

$posts = $post->selectAll('posts');

if(isset($_SESSION['loggedUser'])){
 //var_dump($_SESSION['loggedUser']);
    if($_SESSION['loggedUser']->role == 'user'){
        //var_dump($_SESSION['loggedUser']->role);
        $student_years = $student_year->selectByIdAndActive($_SESSION['loggedUser']->id );
      //  var_dump(count($student_years));
       
        if(count($student_years)=="0"){
        //var_dump($_SESSION['loggedUser']->id);
            $id =$_SESSION['loggedUser']->id;       
            header('Location: change_register.php?id='.$_SESSION['loggedUser']->id);   
       } 

        //Delete post - if user is logged get post_id from a href, select post, if exist delete post and delete image from uploads folder
        if(isset($_GET['post_id'])){   
            $p = $post->selectById('posts',$_GET['post_id']);
            if($p){
                $path = "uploads/" . $p[0]->imagepath;
                if($path){
                    if(!unlink($path)){
                        echo "Not Working";
                    } else {
                    $post->deleteById('posts',$_GET['post_id']);
                    } 
                } 
            }
            require_once 'views/index.view.php';
        }
    }


    if($_SESSION['loggedUser']->role == 'editor'){
        //var_dump($_GET['role']);
        if(isset($_GET['role']) && $_GET['role'] === 'user'){
            $posts = $post->selectAllPublic('1','user');
        } 
        require_once 'views/index.view.php';
    }
    


    if(isset($_GET['category'])){
     if($_GET['category'] == 'news'){     
        //news from editors
        $posts = $post->selectAllPublic(1,'editor');
     } else {
         //Posts from students
         if($_GET['category'] == 'blogs'){
            $posts = $post->selectAllPublic(1,'proffesor');
         }else{
            $posts = $post->selectAllPublic(1,'user');
         }    
     }  
     require_once 'views/index.view.php';
    } 
}
require_once 'views/index.view.php';
?>