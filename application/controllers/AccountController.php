<?php
defined('BASEPATH') or exit('No direct script access allowed');

include '/var/www/html/codeigniter/application/services/ServiceReference.php';
class AccountController extends CI_Controller
{
    private $refService = "";
/**
 * @description create an instance of service methods
 */
    public function __construct()
    {
        parent::__construct();
        $this->refService = new ServiceReference();
    }
/**
 * @return result
 */
    public function registerUser()
    {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['Emailid'];
        $password = $_POST['password'];
        return $res = $this->refService->insertDb($fname, $lname, $email, $password);

    }
/**
 * @return result
 */
    public function login()
    {
        $email = $_POST['Emailid'];
        $password = $_POST['password'];

        $key = explode("@", $email);
        $key = $key[0];

        return $res = $this->refService->login($email, $password);
    }

    // /**
    //  * @method veryfyEmailId() verify the email and send verify link to user
    //  * @return void
    //  */
    // public function veryfyEmailId()
    // {
    //     $token = $_POST["token"];
    //     return $this->serviceReference->veryfyEmailId($token);
    // }

    /**
     * create the functionn to forgot password
     */
    public function forgotpassword(){
        $email = $_POST['Emailid'];
        
        $res = $this->refService->forgotpassword($email);
    }
}
