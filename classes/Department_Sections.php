<?php 

class Department_Sections extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createDepartmentSectons($last_id,$new_department){
     
        $sections = $new_department->sections;    

       $errors = [];   
             foreach ($sections as $section) {
                $sql = "INSERT INTO department_sections VALUES(NULL,?,?,NULL)";
                $query = $this->db->prepare($sql);
                $query->execute([$last_id,$section]);               
            } 

        return $this->register_result = true;  
         
    }


    public function selectAllById($id_department){
        //var_dump($id_department);
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
         //var_dump($query);
         return $query->fetchAll(PDO::FETCH_OBJ); 
     }
 
}