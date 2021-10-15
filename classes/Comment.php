<?php 
class Comment extends QueryBuilder{

    public function addComment($user_id,$post_id){
        if(isset($_POST['body'])){
            $body = $_POST['body'];
        }
        
        $createdAt = date('Y-m-d');
        $sql = "INSERT INTO q_comments VALUES (NULL,?,?,?)";
        $query = $this->db->prepare($sql);
        $result = $query->execute([$post_id,$user_id,$createdAt]);
        $last_id = $this->db->lastInsertId();

        if($query){
            $sql = "INSERT INTO comments VALUES (NULL,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$last_id,$body]);
        } 
    }

    public function selectAllByPostId($post_id){
        $sql = "SELECT 
                qc.*,
                c.*,
                u.* 
                FROM q_comments as qc
                INNER JOIN comments as c
                ON qc.id = c.comment_id
                INNER JOIN users as u
                ON qc.user_id = u.id
                WHERE QC.post_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$post_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }



}