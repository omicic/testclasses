<?php 
class Test extends QueryBuilder{

public $newPostStatus = NULL;
public $errors=array();

  public function createTest(){

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
  
    if(count($this->errors)==0){
              
                    $sql = "INSERT INTO posts VALUES (NULL,?,?,?,?,?,NULL)";
                    $query = $this->db->prepare($sql);
                    $query->execute([ $user_id, $title, $description,$department_id, $points,$public,$timer]);

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

  public function selectAllPublic($public,$role){
    $sql = "SELECT u.role, p.* FROM posts p INNER JOIN users u ON u.id = p.user_id WHERE p.public=? AND u.role = ?";
    $query = $this->db->prepare($sql);
    $query->execute([$public,$role]);
    return $query->fetchAll(PDO::FETCH_OBJ);
  }


}