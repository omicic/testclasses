<?php 

class Section extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createSection(){

        //var_dump('1');

        $errors = [];

        if(isset($_POST['register_name'])){
            $name = $_POST['register_name'];
        } else{
            $register_name = "Name is required";
            array_push($error,$register_name_error);
        }

        if(isset($_POST['register_description'])){
            $description = $_POST['register_description'];
        } else{
            $register_description = "register_description is required";
            array_push($error,$register_description_error);
        }

        if(count($errors)==0){
            $sql = "INSERT INTO sections VALUES(NULL,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$description]);
    
            if($query){
                $this->register_result = true;
            }
        }
    }




}