<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Array_helper_demo extends CI_Controller
{
    public function index()
    {
        $this->load->helper('array');

        $data['seo'] = array(
             "meta_desc" =>"Codeginiter frameWork",
             "meta_key" =>"Ak12@34",
             "title" =>"using of array helper methods"
        );
        $this->load->view('array_helper_view',$data);
    }
    
}
 