<?php 
class Post extends QueryBuilder{

public $newPostStatus = NULL;
public $errors=array();

  public function createPost(){

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
     
    $createdAt = date('Y-m-d');
    $user_id = $_SESSION['loggedUser']->id;

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
                    $sql = "INSERT INTO posts VALUES (NULL,?,?,?,?,?)";
                    $query = $this->db->prepare($sql);
                    $query->execute([$title, $description, $target_name, $user_id, $createdAt]);

                    if($query){
                        $this->newPostStatus=true;
                    }else{
                      $this->newPostStatus=false;
                    }
                }
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



  /*   if($query->errno == 0){
    $result = $query->get_result();
    $likes = $result->num_rows;
    return $likes; */
   // }
 // }



}