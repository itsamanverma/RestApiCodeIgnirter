<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_test extends CI_Controller
{

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function index()
    {
        $this->load->view('myindexview');
    }
    public function show()
    {
        $this->load->model('my_model');
        $name = $this->my_model->firstName();
        //$lastName  = $this->my_model->lastName();
        echo "<strong> My Name is</strong> =" .$name; 
		//echo "<br>LastName =" .$lastName;
    }
    public function show1()
    {
        /* in codeigniter we have the facility to make Alias   */
        $this->load->model('authentication_from_google','google');
        $name = $this->google->userData();
        echo "<strong> Name:- </strong> =" .$name; 
    }
}
