<?php 

function getCategories()
{
    global $db;
    $sql = $db->prepare("SELECT * FROM categories");
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $cat = $result->fetch_all(MYSQLI_ASSOC);
        return $cat;
    }else{
        header('Location: errors.php');
    }
}



function savePost($title,$body,$image,$user_id,$cat_id,$public)
{
    global $db;
    $sql = $db->prepare("INSERT INTO posts (title,body,image,user_id,category_id,public) 
                        VALUES(?,?,?,?,?,?)");
    $sql->bind_param('sssiii',$title,$body,$image,$user_id,$cat_id,$public);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function getAllPostsFromUser($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM posts WHERE user_id=? ORDER BY created_at DESC");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $posts = $result->fetch_all(MYSQLI_ASSOC);

        return $posts;
    }else{
        return false;
    }
}

function deletePost($id)
{
    global $db;
    $sql = $db->prepare("DELETE FROM posts WHERE id=?");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function editPost($title,$body,$category_id,$public,$user_id,$post_id)
{
    global $db;
    $sql = $db->prepare("UPDATE posts SET title=?, body=?, 
                                category_id=?, public=?,
                                user_id=?, updated_at=NOW() 
                                WHERE id=?");
    $sql->bind_param('ssiiii',$title,$body,$category_id,$public,$user_id,$post_id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function getAllPublicTestsWithCategory($id){
    {
        //dd($id);
        global $db;
        $sql = $db->prepare("SELECT t.id,t.admin_id,t.title,t.body,t.category_id,t.points,t.public,u.first_name as first_name,u.last_name as last_name                    
        FROM tests t
        JOIN users u ON u.id = t.admin_id
        JOIN categories c ON c.id = t.category_id
        WHERE t.category_id=? AND t.public=1
        ");

        $sql->bind_param('i',$id);
        $sql->execute();

        if($sql->errno == 0){
            $result = $sql->get_result();
            $tests = $result->fetch_all(MYSQLI_ASSOC);
            return $tests;
        }else{
            return false;
        }
    }
    }
    
    function getAllPublicTests()
    {
            global $db;
      $sql = $db->prepare("SELECT 
                                    t.id,
                                    t.admin_id,
                                    t.title,
                                    t.body,
                                    t.category_id,
                                    t.points,
                                    t.public,
                                    u.first_name,
                                    u.last_name                    
                                    FROM tests t
                                    INNER JOIN users u ON t.admin_id=u.id
                                    WHERE t.public=1
                                    "); 

        //$sql->bind_param('i',$id);
        $sql->execute();
        //dd($sql);


        if($sql->errno == 0){
            $result = $sql->get_result();
            $tests = $result->fetch_all(MYSQLI_ASSOC);
           
            return $tests;
        }else{
            return false;
        }
    }

function getSinglePost($id)
{
    global $db;
    $sql = $db->prepare("SELECT
                        p.id,
                        p.title,
                        p.body,
                        p.image,
                        p.user_id,
                        p.public,
                        p.created_at,
                        p.category_id,
                        u.id AS userId,
                        u.first_name,
                        u.last_name
                        FROM posts p
                        INNER JOIN users u
                        ON p.user_id = u.id
                        WHERE p.id = ?
                        ");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $post = $result->fetch_assoc();
        return $post;
    }else{
        return false;
    }
}

function getAllPublicPostsFromUser($id)
{
    global $db;
    $sql = $db->prepare("SELECT
                        p.id,
                        p.title,
                        p.body,
                        p.image,
                        p.user_id,
                        p.created_at,
                        p.category_id,
                        u.id AS userId,
                        u.first_name,
                        u.last_name
                        FROM posts p
                        INNER JOIN users u
                        ON p.user_id = u.id
                        AND p.public = 1
                        WHERE u.id = ?
                        ");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $posts = $result->fetch_all(MYSQLI_ASSOC);

        return $posts;
    }else{
        return false;
    }
}

function getAllPublicPosts()
{
    global $db;
    $sql = $db->prepare("SELECT
                        p.id,
                        p.title,
                        p.body,
                        p.image,
                        p.user_id,
                        p.created_at,
                        p.category_id,
                        u.id AS userId,
                        u.first_name,
                        u.last_name
                        FROM posts p
                        INNER JOIN users u
                        ON p.user_id = u.id
                        AND p.public = 1
                        ");
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $posts = $result->fetch_all(MYSQLI_ASSOC);

        return $posts;
    }else{
        return false;
    }
}

function userVoteUp($post_id)
{
    global $db;
    $sql = $db->prepare("INSERT INTO likes (user_id,post_id) VALUES (?,?)");
    $sql->bind_param('ii',$_SESSION['id'],$post_id);
    $sql->execute();

    if($sql->errno == 0){
        return true;

    }else{
        return false;
    }
}

function voted($post_id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM likes WHERE user_id=? AND post_id=?");
    $sql->bind_param('ii',$_SESSION['id'],$post_id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $likes = $result->num_rows;

        if($likes > 0){
            return true;
        }else{
            return false;
        }
      
    }else{
        header('Location: error.php');
    }
}

function getLikes($post_id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM likes WHERE  post_id=?");
    $sql->bind_param('i',$post_id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $likes = $result->num_rows;
        return $likes;
      
    }else{
        header('Location: error.php');
    }
}

function userComment($post_id,$body,$comment_id)
{
    global $db;
   // dd($body);
   //dd($comment_id);
   if($comment_id==null){
    $sql = $db->prepare("INSERT INTO q_comments (user_id,post_id) VALUES (?,?)");
    $sql->bind_param('ii',$_SESSION['id'],$post_id);
    $sql->execute();
    $comment_id = $sql->insert_id;
    }
   
  
   
    if($sql->errno == 0){
       
        $sql1 = $db->prepare("INSERT INTO comments (comment_id, body) VALUES (?,?)");
        $sql1->bind_param('is',$comment_id,$body);
        $sql1->execute();
        if($sql1->errno ==0 ){
            return true;
        }else{
            return false;
        }
          
    }else{
        return false;
    }
}

function getPostComments($post_id)
{
    //dd($post_id);
    global $db;
    $sql = $db->prepare("SELECT
                        q.id,
                        c.body,
                        c.created_at,
                        u.first_name,
                        u.last_name
                        FROM q_comments q
                        JOIN comments c
                        ON q.id = c.comment_id
                        INNER JOIN users u
                        ON q.user_id = u.id
                        WHERE q.post_id = ?
                        ");
    $sql->bind_param('i',$post_id);
    $sql->execute();
       

    if($sql->errno == 0){
        $result =$sql->get_result();
        $comments = $result->fetch_all(MYSQLI_ASSOC);
        return $comments;
      
    }else{
        return false;
    }
}