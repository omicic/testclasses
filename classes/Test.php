<?php 
class Test extends QueryBuilder{

public $newTestStatus = NULL;
public $errors=array();

  public function createTest($user_id){

    if(!isset($_POST['test_title']) || empty($_POST['test_title'])){
        $this->title_error = "Title is required";
        array_push($this->errors,$this->title_error );
    }else{
      $title = $_POST['test_title'];
    }

    if(!isset($_POST['test_description']) || empty($_POST['test_description'])){
      $this->description_error="Description is required";
      array_push($this->errors, $this->description_error);
    }else{
      $description = $_POST['test_description'];  
    }

    if(!isset($_POST['points']) || empty($_POST['points'])){
      $this->points_error="Points is required";
      array_push($this->errors, $this->points_error);
    }else{
      $points = $_POST['points'];  
    }

    if(!isset($_POST['timer']) || empty($_POST['timer'])){
      $this->timer_error="Timer is required";
      array_push($this->errors, $this->timer_error);
    }else{
      $timer = $_POST['timer'];  
    }

    if(isset($_POST['department_selection']) || empty($_POST['department_selection'])){
      $department_id = $_POST['department_selection'];  
    }
  
    if(count($this->errors)==0){
              
                    $sql = "INSERT INTO tests VALUES (NULL,?,?,?,?,?,?)";
                    $query = $this->db->prepare($sql);
                    $query->execute([$user_id, $title, $description,$department_id,$points,$timer]);

                    if($query){
                        $this->newTestStatus=true;
                    }else{
                      $this->newtestStatus=false;
                    }
        }
      return $this;
  }

  public function deletePost($id){
      $sql = "DELETE FROM posts WHERE id=?";
      $query = $this->db->prepare($sql);
      $query->execute([$id]);
  }

  public function update($id){
   // var_dump($id);
    if(!isset($_POST['post_title']) || empty($_POST['post_title'])){
      $this->title_error = "Title is required";
      array_push($this->errors,$this->title_error );
    }else{
      $title = $_POST['post_title'];
    }

    if(!isset($_POST['post_description']) || empty($_POST['post_title'])){
      $this->description_error="Description is required";
      array_push($this->errors, $this->description_error);
    }else{
      $description = $_POST['post_description'];  
    }

    $image_name = $_FILES['file']['name'];

    if(!isset($_FILES['file']['name']) || empty($_FILES['file']['name'])){
      $this->image_error = "Image is required";
      array_push($this->errors, $this->image_error);
    }


    if(count($this->errors)==0){
              $target_dir = $_SERVER['DOCUMENT_ROOT']."/testclasses/uploads/";
          
              $target_name = time().$image_name;
              $target_file = $target_dir.$target_name;

              $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
              $extensions_arr = ["png",'gif','jpg','jpeg'];


              if(in_array($imageFileType,$extensions_arr)){
                //var_dump($target_file);
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                // var_dump('1');
                    $sql = "UPDATE posts SET title=?, description=?, imagepath=?, update_at=NOW() WHERE id=? ";
                    $query = $this->db->prepare($sql);
                    $query->execute([$title, $description,  $target_name, $id]);
                
                    if($query){
                      return true;
                    }else{
                      return false;
                    } 
                }
              }
        }
      //return $this;
  }

  public function selectAllByAdmin($user_id){
    $sql = "SELECT * FROM tests WHERE admin_id=?";
    $query = $this->db->prepare($sql);
    $query->execute([$user_id]);
    return $query->fetchAll(PDO::FETCH_OBJ);
  }


}