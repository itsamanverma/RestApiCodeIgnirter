<?php
 defined('BASEPATH') or exit('No direct script access allowed');
 class User_details extends CI_Controller
 {
    function index()
    {
        /** 
         *using the helper method
         * helper method provide some helper methode which directly uses
         * in Controller & view  
         */ 
        $this->load->helper('common_helper');
        echo custom_helper();

        /**
         * load the custom libraries
         */
        //  $this->load->library('test_1');
        //  $this->test_lib->test_1();

        // $this->load->library('form_validation');
        // $this->form_validation->set_rule();

        //echo "<strong><i>test</i></strong> the User Controller";
        
        /*every time we need to load the model so instead of autoload the model */
        //$this->load->model('user_model');
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