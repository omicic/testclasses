<?php 

class Department extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createDepartment(){

        //var_dump('1');

        $errors = [];

        if(isset($_GET['arraySubjects'])){
 
            $new_department = json_decode($_GET['arraySubjects']);
            if(isset($new_department->name)){
                $name = $new_department->name;
            }else{
                $register_name_error = "Name is required";
                array_push($errors,$register_name_error);
            }

            if(isset($new_department->description)){
                $description = $new_department->description;
            }

            if(isset($new_department->name)){
                $subjects = $new_department->subjects;//var_dump($subjects);   
   
            }
           
           
        }

        if(count($errors)==0){
           $sql = "INSERT INTO departments VALUES(NULL,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$description]);
            $last_id = $this->db->lastInsertId();
            //var_dump($last_id);

            if($query){
                foreach ($subjects as $id => $subject) {
                    $sql = "INSERT INTO department_subjects VALUES(NULL,?,?,NULL)";
                    $query = $this->db->prepare($sql);
                    $query->execute([$last_id,$subject]);
                    
                 } 

                 return $this->register_result = true;
            } 
        }
    }

 
}