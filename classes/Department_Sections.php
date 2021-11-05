<?php 

class Department_Sections extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createDepartmentSectons($last_id,$new_department_sections){
     
    $sections = $new_department_sections;  
    
   // var_dump($sections);
       $errors = [];   
             foreach ($sections as $section) {
               // var_dump($section);  
                $sql = "INSERT INTO department_sections VALUES(NULL,?,?,NULL)";
                $query = $this->db->prepare($sql);
                $query->execute([$last_id,$section]);               
            } 

        return $this->register_result = true;  
         
    }

    public function createDepartmentSecton($last_id,$new_department_section){
     
           $errors = [];   
                 
                    $sql = "INSERT INTO department_sections VALUES(NULL,?,?,NULL)";
                    $query = $this->db->prepare($sql);
                    $query->execute([$last_id,$new_department_section]);               
                
    
            return $this->register_result = true;  
             
        }


    public function selectAllById($id_department){
      
         $sql = "SELECT              
                    d.name AS department_name,
                    s.name AS section_name, 
                    s.description AS section_description,
                    ds.id AS d_section_id
                    FROM department_sections ds 
                    INNER JOIN departments d ON ds.id_department = d.id 
                    INNER JOIN sections s ON s.id = ds.id_section
                   
                    WHERE ds.id_department=?";
         $query = $this->db->prepare($sql);
         $query->execute([$id_department]);
         return $query->fetchAll(PDO::FETCH_OBJ); 
     }
 
}