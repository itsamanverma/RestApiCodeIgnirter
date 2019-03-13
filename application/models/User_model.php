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
     {  /* load the database */
        //$this->load->database();

        /* access the data from database dynamically & Convert the Object into array*/
         $query = $this->db->query("SELECT * FROM user")->result_array();

        /* access the data from database dynamically in Object from */
        //$query = $this->db->query("SELECT * FROM user")->result();
        
        /* retrieve all records from a table */
        //$this->db->where('id','1');
        //$query = $this->db->get('user')->result_array();

        /*SELECT * FROM user where id =1 */
        //$query = $this->db->get_where('user',array('id'=>'1'))->result_array();

        //var_dump($query);
        /* convert the object into array */
        //$query->reuslt_array();

        // echo "<pre>";
        // print_r($query);//if we print direct $query it give object not formatted array
        // echo "</pre>";

//         foreach ($query->result_array() as $row) {
//             echo $row->username;
//             echo $row->company;
//             }
return $query;
     }
 }