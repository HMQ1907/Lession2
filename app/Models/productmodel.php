<?php
class productmodel extends DModel {
    public function __construct() {
        parent::__construct();
    }
     public function getProductById($id){
        $sql = "SELECT * FROM product WHERE id = :id";
        $data = array(':id' => $id);
        return $this->db->select($sql, $data);
    }
    public function selectAllProduct($table) {
        $sql = "SELECT $table.*, category.name AS category_name 
                FROM $table 
                INNER JOIN category ON $table.cate_id = category.id ";
        return $this->db->select($sql, array());
    }
    public function insertProduct($table, $data) {
        return $this->db->insert($table, $data);
    }
    
    public function updateProduct($table, $data, $cond) {
        return $this->db->update($table, $data, $cond);
    }
    
    public function deleteProduct($table, $cond) {
        return $this->db->delete($table, $cond);
    }
    
    public function search($table, $name) {
        $sql = "SELECT $table.*, category.name AS category_name 
                FROM $table
                INNER JOIN category ON $table.cate_id = category.id
                WHERE $table.name LIKE '%$name%'";
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }
}
?>
