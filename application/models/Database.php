<?php
class Database extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser()
    {
        $this->db->insert("users",$user);
    }
}
?>