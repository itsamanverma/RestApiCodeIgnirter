<?php
 class User_model extends CI_Model
 {
     function __construct()
     {
         parent::__construct();
     }
     function information()
     {
         return ["details" => "Sona","Ereccsion","20000"];
     }
    //  function return_users()
    //  {
    //      return ["username" => "Akshay" ,"company" =>"IBM"];
    //  }
    function return_users()
     {  
        $this->load->database();
        // $query = $this->db->query("SELECT * FROM user")->result_array();
        $query = $this->db->query("SELECT * FROM user")->result();
        /* convert the object into array */
        //$query->reuslt_array();

        // echo "<pre>";
        // print_r($query);//if we print direct $query it give object not formatted array
        // echo "</pre>";

//         foreach ($query->result_array() as $row) {
//             echo $row->username;
//             echo $row->company;
// }
return $query;
     }
 }