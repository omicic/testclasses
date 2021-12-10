<?php 

class ProffesorSubject extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createProffesorSubject($prof_id,$subj_id){

        var_dump($prof_id . ',' . $subj_id);

        $errors = [];
/* 
        if(isset($_POST['proff_id'])){
            $name = $_POST['register_name'];
        } else{
            $register_name = "Email is required";
            array_push($error,$register_name_error);
        }

        if(isset($_POST['register_description'])){
            $description = $_POST['register_description'];
        } else{
            $register_description = "register_description is required";
            array_push($error,$register_description_error);
        }

        if(count($errors)==0){
            $sql = "INSERT INTO subjects VALUES(NULL,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$description]);
    
            if($query){
                $this->register_result = true;
            }
        } */
    }

 
}