<?php 
class Like extends QueryBuilder{


  public function getLikes($id){
    $sql = "SELECT * FROM likes WHERE post_id=?";
    $query = $this->db->prepare($sql);
    $query->execute([$id]);

    $likes = $query->fetchAll(PDO::FETCH_OBJ);
    return count((array) $likes);
 }

 function voted($user_id,$post_id)
{
    $sql = "SELECT * FROM likes WHERE user_id=? AND post_id=?";
    $query = $this->db->prepare($sql);
    $query->execute([$user_id,$post_id]);
    $likes = $query->fetch(PDO::FETCH_OBJ);


        if($likes){
            return true;
        }else{
            return false;
        }

}

public function addVote($user_id,$post_id){

    $sql = "INSERT INTO likes VALUES (NULL,?,?)";
    $query = $this->db->prepare($sql);
    $query->execute([$user_id,$post_id]);

}

public function removeVote($user_id,$post_id){
    $sql = "DELETE FROM likes WHERE user_id=? AND post_id=?";
    $query = $this->db->prepare($sql);
    $query->execute([$user_id, $post_id]);
 
}



}