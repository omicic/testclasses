<?php 

class Department extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createDepartment(){

        $errors = [];

         if(isset($_POST['arraySubjects'])){
            $new_department = json_decode($_POST['arraySubjects']);
            if(isset($new_department->name)){
                $name = $new_department->name;
            }else{
                $register_name_error = "Name is required";
                array_push($errors,$register_name_error);
            }

            if(isset($new_department->description)){
                $description = $new_department->description;
            }

         /*  if(isset($new_department->name)){
                $sections = $new_department->sections; //var_dump($subjects);      
            }    */    
        }

        if(count($errors)==0){
           $sql = "INSERT INTO departments VALUES(NULL,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$description]);
            $last_id = $this->db->lastInsertId();
            return $last_id;
        } 
    }
        
    public function updateById($id,$name,$description){
        var_dump($id);
        $sql = "UPDATE departments SET name=?, description=? WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$name,$description,$id]);
        if($query){
            return true;
        }else{
            return false;
        }
    }


}