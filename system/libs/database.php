<?php
class database extends PDO {
    public function __construct() {
        $connec = 'mysql:dbname=lampart_lession;host=localhost';
        $user = 'root';
        $pass = '';
        parent::__construct($connec, $user, $pass);
        $db = new PDO($connec, $user, $pass);
    }

    public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC) {
        try { 
            $statement = $this->prepare($sql);
            foreach($data as $key => $value){
                $statement->bindValue($key, $value);
            }
            $statement->execute();
            return $statement->fetchAll($fetchStyle);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function insert($table, $data) {
        try {
            $keys = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($keys) VALUES ($values)";
            $statement = $this->prepare($sql);
            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value);
            }    
            return  $statement->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } 
    }

    public function update($table, $data, $cond) {
        try {
            $updatekeys = null;
            foreach($data as $key => $value) {
                $updatekeys .= "$key=:$key,";
            }
            
            $updatekeys = rtrim($updatekeys, ",");
            $sql = "Update $table set $updatekeys where $cond";
            $statement = $this->prepare($sql);
            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
            return $statement->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } 
    }

    public function delete($table, $cond, $limit = 1) {
        try {
            $sql = "delete from $table where $cond limit $limit";
            return $this->exec($sql);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } 
    }
}
?>