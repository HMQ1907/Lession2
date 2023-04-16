<?php
class DModel{
    protected $db = array();
    public function __construct()
    {
        $this ->db = new database();
        
    }
}
?>