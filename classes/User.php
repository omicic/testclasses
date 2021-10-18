<?php 

class User extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function registerUser($role){

        $name = $_POST['register_name'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];

        $sql = "INSERT INTO users VALUES(NULL,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$name,$email,$password,$role]);

        if($query){
            $this->register_result = true;
        }
    }

    public function loginUser(){
     
        $errors = [];
        
        if(!isset($_POST['email'])){
            $email_error = "Email is required";
            array_push($error,$email_error);
        
        } else{
            $email = $_POST['email'];
        }
            
        if(!isset($_POST['email'])){
            $password_error = "Password is required";
            array_push($error,$password_error);
        }else{
            $password = $_POST['password'];
        }

        if(count($errors) == 0){
            $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
            $query = $this->db->prepare($sql);
            $query->execute([$email,$password]);

            $loggedUser = $query->fetch(PDO::FETCH_OBJ);

            
            if($loggedUser != NULL){
                $_SESSION['loggedUser'] = $loggedUser;
                $this->loggedUser = $loggedUser;
        }
    }
 }


    public function getUserWithId($id){
    $sql = "SELECT * FROM users WHERE id=?";
    $query = $this->db->prepare($sql);
    $query->execute([$id]);

    $postOwner = $query->fetch(PDO::FETCH_OBJ);
    return $postOwner;
    }

    public function selectAll($role){
        $sql = "SELECT * FROM users WHERE role=?";
        $query = $this->db->prepare($sql);
        $query->execute([$role]);
    
        $editors = $query->fetchAll(PDO::FETCH_OBJ);
        return $editors;
    }
}