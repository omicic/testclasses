<?php 

function getUsers()
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users");
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);
   
        return $users;

    }else{
        header("Location: error.php");
    }
}

function register_user($title,$first_name,$last_name,$email,$password)
{
    global $db;
    $role = 'user';
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
    $sql = $db->prepare("INSERT INTO users (title,first_name,
                            last_name, email, password, role) 
                            VALUES (?,?,?,?,?,?)");
    $sql->bind_param("ssssss",$title,$first_name,$last_name,$email,$password_hash,$role);
    $sql->execute();

    if($sql->errno == 0){
        $_SESSION['id'] = $sql->insert_id;
        header("Location: user/home.php");
    }else{
        header("Location: error.php");
    }
}

function isLogged()
{
    if(isset($_SESSION['id'])){
        return true;
    }else{
        return false;
    }
}

function transformTime($sec)
{
    $min = floor($sec / 60);
    $sec-=$min*60;
    if($min>60){
        $hour=floor($min/60);
        $min-=$hour*60;
    }

    return sprintf('%02d:%02d:%02d', $hour, $min,$sec);
}


function login_user($email,$password)
{
    global $db;
    $user_password = getUserPassword($email);
    $role = getUserRole($email);

    if(!$user_password){
        return false;
    }

    if(!password_verify($password,$user_password)){
        return false;
    }

    
    $sql = $db->prepare("SELECT id FROM users u WHERE email=? AND password=?");
    $sql->bind_param("ss",$email,$user_password);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
      
        $id = $result->fetch_assoc()['id'];

        // LOGIN //
        $_SESSION['id'] = $id;
        return $role;

    }else{
        header("Location: error.php");
    }

    
}

function getUserPassword($email)
{
    global $db;
    $sql = $db->prepare("SELECT password FROM users WHERE email=?");
    $sql->bind_param("s",$email);
    $sql->execute();

    $result = $sql->get_result(); // mysql result set
    if($result->num_rows == 0){
        return false;
    }
    $password = $result->fetch_assoc()['password'];

    return $password;

}


function getUserRole($email)
{
    global $db;
    $sql = $db->prepare("SELECT role FROM users WHERE email=?");
    $sql->bind_param("s",$email);
    $sql->execute();

    $result = $sql->get_result(); // mysql result set
    if($result->num_rows == 0){
        return false;
    }
    $role = $result->fetch_assoc()['role'];

    return $role;

}


function getRole($id)
{
    global $db;
    $sql = $db->prepare("SELECT role FROM users WHERE id=?");
    $sql->bind_param("i",$id);
    $sql->execute();

    $result = $sql->get_result(); // mysql result set
    if($result->num_rows == 0){
        return false;
    }
    $role = $result->fetch_assoc()['role'];

    return $role;

}


function getUser($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM users WHERE id=?");
    $sql->bind_param("i",$id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $user = $result->fetch_assoc();
      
        return $user;

    }else{
        header("Location: error.php");
    }
}

 function change_title($user)
{
    global $db;
    $title = "";
    if($user['title'] == "mr"){
        $title = "ms";
    }else{
        $title = "mr";
    }
    $sql = $db->prepare("UPDATE users SET title=?, updated_at=NOW() WHERE id=?");
    $sql->bind_param("si",$title,$user['id']);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function change_email($email,$id)
{
    global $db;
    $sql = $db->prepare("UPDATE users SET email=?, updated_at=NOW() WHERE id=?");
    $sql->bind_param("si",$email,$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function change_password($password,$new_password,$user)
{
    global $db;
    if(!password_verify($password,$user['password'])){
        return false;
    }
    $new_password_hash = password_hash($new_password,PASSWORD_DEFAULT);

    $sql = $db->prepare("UPDATE users SET password=?, updated_at=NOW() WHERE id=?");
    $sql->bind_param("si",$new_password_hash,$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}