<?php

class cateModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selectAllCate($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql, array());
    }
    
    public function selectId($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $data = array(':id' => $id);
        return $this->db->select($sql, $data);
    }
    
    public function insertCate($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    
    public function updateCate($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
   
   public function deleteCate($table, $cond)
   {
        return $this->db->delete($table, $cond);
   }
   
   public function search($table, $name)
   {
        $sql = "SELECT * FROM $table WHERE name LIKE '%$name%'";
        $result = $this->db->query($sql);
        return $result->fetchAll();
   }
}
?>