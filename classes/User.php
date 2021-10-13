<?php 

class User extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function registerUser(){
        $name = $_POST['register_name'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];

        $sql = "INSERT INTO users VALUES(NULL,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$name,$email,$password]);

        if($query){
            $this->register_result = true;
        }
    }

    public function loginUser(){
     
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
           // var_dump($email);

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
}