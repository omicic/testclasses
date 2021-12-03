<?php 

class Student_Year extends QueryBuilder {

    public $register_result = NULL;
    public $loggedUser = null;

    public function createStudentYear($year){

        //var_dump('1');

        $errors = [];

        $user_id = $_GET['id'];
        $class_id = $_POST['class'];

/*         if(isset($_POST['user'])){
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
        } */


        if(count($errors)==0){

            $sql = "INSERT INTO student_year VALUES(NULL,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$user_id,$class_id,$year]);
    
            if($query){
                $this->register_result = true;
            }
        }
    }

    public function selectActiveStudentYear($active_year_id){
       // var_dump($active_year_id);
         $sql = "SELECT * FROM student_year WHERE school_year_id=?";
         $query = $this->db->prepare($sql);
         $query->execute([$active_year_id]);
         return $query->fetchAll(PDO::FETCH_OBJ);
     }

     public function selectByIdAndActive($id){
        // var_dump($id);
         $sql = "SELECT sy.*,scy.* FROM 
         student_year AS sy 
         INNER JOIN school_year AS scy ON scy.id=sy.school_year_id
         WHERE sy.user_id=? AND scy.active='1'";
         $query = $this->db->prepare($sql);
         $query->execute([$id]);
         //var_dump($query);
         return $query->fetchAll(PDO::FETCH_OBJ);
     }
 
 

}