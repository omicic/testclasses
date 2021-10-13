<?php 


class QueryBuilder{
    
protected $db;

public function __construct($db){
    $this->db=$db;
}
    public function selectAll($table){
        $sql = "SELECT * FROM {$table}";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
        
    }

    public function selectById($table,$id){
       //var_dump($id);
        $sql = "SELECT * FROM {$table} WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
      }

      public function deleteById($table,$id){
        $sql = "DELETE FROM {$table} WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);

    }
}
?>