<?php 

function addCategory($searched_category){
    //dd($searched_category);
    global $db;
    $sql = $db->prepare("INSERT INTO categories (name) 
    VALUES(?)");
    $sql->bind_param('s',$searched_category);
    $sql->execute();
    $cat_id=$sql->insert_id;
    //dd($cat_id);

    if($sql->errno == 0){
        return $cat_id;
    }else{
        return false;
    }
}

function getCategoryName($category_id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM categories WHERE id=?");
    $sql->bind_param('i',$category_id);
    $sql->execute();
 
    if($sql->errno == 0){
        $result = $sql->get_result();
        $cat = $result->fetch_assoc();
        return $cat;
    }else{
        header('Location: errors.php');
    }
}

function addAdminCategories($admin, $category_id){
    global $db;
    $sql = $db->prepare("INSERT INTO admin_categories (category_id, admin_id) 
    VALUES(?,?)");
    $sql->bind_param('ii',$category_id,$admin);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}


function getAdminCategories($admin_id){
    global $db;
    $sql = $db->prepare("SELECT 
                            * 
                            FROM admin_categories ac
                            INNER JOIN categories c
                            ON ac.category_id=c.id
                            WHERE ac.admin_id=?
                            ");
    $sql->bind_param('i',$admin_id);
    $sql->execute();
 
    if($sql->errno == 0){
        $result = $sql->get_result();
        $all_admin_categories = $result->fetch_all(MYSQLI_ASSOC);
        return $all_admin_categories;
    }else{
        header('Location: errors.php');
    }
}

function deleteAdminCategory($id){
    global $db;
    $sql = $db->prepare("DELETE FROM admin_categories WHERE category_id=?");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}