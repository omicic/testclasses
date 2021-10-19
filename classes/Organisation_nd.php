<?php 

class Organisation extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function registerOrganisation(){
        $errors = [];

        if(isset($_POST['register_name'])){
            $name = $_POST['register_name'];
        } else{
            $register_name = "register_name is required";
            array_push($error,$register_name_error);
        }

        if(isset($_POST['register_email'])){
            $email = $_POST['register_email'];
        } else{
            $register_email = "register_email is required";
            array_push($error,$register_email_error);
        }

        if(isset($_POST['register_linkedin'])){
            $linkedin = $_POST['register_linkedin'];
        }else{
            $register_linkedin = "register_linkedin is required";
            array_push($error,$register_linkedin_error);
        }

        if(isset($_POST['register_address'])){
            $address = $_POST['register_address'];
        }else{
            $address = NULL;
        }

        if(isset($_POST['register_city'])){
            $city = $_POST['register_city'];
        }else{
            $register_city = "register_city is required";
            array_push($error,$register_city_error);
        }

        if(isset($_POST['register_country'])){
            $country = $_POST['register_country'];
        }else{
            $register_country = "register_country is required";
            array_push($error,$register_country_error);
        }

        if(isset($_POST['register_phone_number'])){
            $phone_number = $_POST['register_phone_number'];
        }else{
            $phone_number = NULL;
        }

        if(count($errors)==0){
            $sql = "INSERT INTO users VALUES(NULL,?,?,?,?,?,?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$email,$password,$role,$organisation,$address,$city,$country,$phone_number]);
    
            if($query){
                $this->register_result = true;
            }
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