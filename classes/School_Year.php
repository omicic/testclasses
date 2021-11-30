<?php 

class School_Year extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createSchoolYear(){

        //var_dump('1');

        $errors = [];

        if(isset($_POST['register_name'])){
            $year = $_POST['register_name'];
        } else{
            $register_name_error = "Name is required";
            array_push($error,$register_name_error);
        }

        if(isset($_POST['register_description'])){
            $description = $_POST['register_description'];
        } else{
            $register_description_error = "Register_description is required";
            array_push($error,$register_description_error);
        }

        if(count($errors)==0){
            $sql = "INSERT INTO school_year VALUES(NULL,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$year, $description]);
    
            if($query){
                $this->register_result = true;
            }
        }
    }




}