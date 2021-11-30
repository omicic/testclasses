<?php 

class Student_Year extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createStudentYear(){

        //var_dump('1');

        $errors = [];

        if(isset($_POST['user'])){
            $user = $_POST['user'];
        } else{
            $register_user_error = "User is required";
            array_push($error,$register_user_error);
        }

        if(isset($_POST['class'])){
            $class = $_POST['class'];
        } else{
            $register_class_error = "Class is required";
            array_push($error,$register_class_error);
        }

        if(isset($_POST['year'])){
            $year = $_POST['year'];
        } else{
            $register_year_error = "Year is required";
            array_push($error,$register_year_error);
        }


        if(count($errors)==0){
            $sql = "INSERT INTO student_year VALUES(NULL,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$user,$class,$year]);
    
            if($query){
                $this->register_result = true;
            }
        }
    }
}