<?php
defined('BASEPATH') or exit('No direct script access allowed');

include '/var/www/html/codeigniter/application/services/InsertData.php';
class Register extends CI_Controller
{
    private $refService = "";
/**
 * @description create an instance of service methods
 */
    public function __construct()
    {
        parent::__construct();
        $this->refService = new InsertData();
    }
/**
 * @return result
 */
    public function insertUser()
    {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['Emailid'];
        $password = $_POST['password'];
        $res = $this->refService->insertDb($fname, $lname, $email, $password);
        return $res;
    }
/**
 * @return result
 */
    public function selectuser()
    {
        $email = $_POST['Emailid'];
        $password = $_POST['password'];
        $res = $this->refService->login($email, $password);
        
        return $res;
    }
}  
