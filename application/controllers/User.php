<?php
/**
 * @Filename : User.php
 * purpose   : program to implement resp api methods get,post,put,delete
 * @author   : AMAN
 * @version  : 1.0
 * @since    : 06-03-2019
 ***********************************************************************************/
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Database", "database");
        $this->load->helper('form');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $this->load->view("login");
    }

    public function plogin()
    {
        $this->load->view("plogin");
    }
    /**
     * create the function for register using the curd operation 
     * REQUEST_METHOD Which request method was used to access the page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
     * 
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->view("register");
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->input->post();
            if (($error = $this->validation($data)) !== true) {
                $this->returnStatus($error, 'error');
            } else {
                unset($data["rpassword"]);
                $this->database->insertUser($data);
                $this->returnStatus(base_url() . "user/login", 'success');
            }
        }
    }

    public function validation($data = null) //$data)

    {
    $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        if ($data !== null) {
            $this->form_validation->set_data($data);
        }
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password', ' ', 'required|min_length[8]|matches[password]');
        $this->form_validation->set_rules(
            'email',
            'Email Address',
            'required|valid_email|is_unique[users.email]',
            [
                'required' => 'You have not provided email.',
                'is_unique' => 'email already exists.',
            ]
        );

        if ($this->form_validation->run() == false) {
            $error = [];
            foreach ($data as $key => $value) {
                $error[$key] = form_error($key);
            }
            return $error;
        } else {
            return true;
        }
    }

    public function returnStatus($message, $status)
    {
        $er = include_once 'errorcode.php';
        $report = [];
        $report['code'] = $er[$status];
        $report['message'] = $message;
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($report));
        $string = $this->output->get_output();
        echo $string;
        exit;
        //echo json_encode($report);
    }
}
