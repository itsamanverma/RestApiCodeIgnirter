<?php
 defined('BASEPATH') or exit('No direct script access allowed');
 class User_details extends CI_Controller
 {
    function index()
    {
        //echo "<strong><i>test</i></strong> the User Controller";
        $this->load->model('user_model');
        $data['userArray'] = $this->user_model->return_users();
        $this->load->view('user_view',$data);
    }
     function detail()
     {
        $this->load->model('user_model');
        $data['details'] = $this->user_model->information();
        print_r($data);
     }
 }
 ?>