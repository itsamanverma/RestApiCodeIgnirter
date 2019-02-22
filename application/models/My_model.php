<?php

class My_model extends CI_Model
{
    public function  firstName()
    {
        $lastName = $this->lastName();
        return "<i>AMAN </i>" .$lastName;
    }

    private function lastName()
    {
       return "<i> VERMA</i>";
    }
    /**
     * here we do all database connections & API
     * call example like authentication google ,facebook, or loading some external
     * ApI ,this the actual database  
     */
}
?>