<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");

/*********************************************************************
 * @discription  Controller API
 *********************************************************************/
include '/var/www/html/codeigniter/application/libraries/php-jwt-master/JWT.php';
defined('BASEPATH') or exit('No direct script access allowed');
class ServiceReference extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
/**
 * create the function for registeration of user
 * @param fname
 * @param lname
 * @param email
 * @param password
 */
    public function insertDb($fname, $lname, $email, $password)
    {
        // $datta = [
        //     'fname' => $fname,
        //     'lname' => $lname,
        //     'email' => $email,
        //     'password' => $password,
        // ];
      //  $flag = ServiceReference::isEmailPresent($email);
        // if ($flag == 0) {
            $query = "INSERT into registeruser (fname,lname,email,password) values ('$fname','$lname','$email','$password')";
            $stmt = $this->db->conn_id->prepare($query);
            // $res = $stmt->execute($datta);
            $res = $stmt->execute();
            if ($res) {
                $data = array(
                    "message" => "200",
                    "status" => "Succesfully register.!",
                );
                print json_encode($data);
            } else {
                $data = array(
                    "message" => "204",
                    "status" => "server successfully processed the request, but is not returning any content",
                );
                print json_encode($data);
                return "204";
            }
        // } else if ($flag == 1) {
        //     $data = array(
        //         "message" => "201",
        //         "status" => "resquest is fulfil & new resoures will created",
        //     );
        //     print json_encode($data);
        //     return "201";
        // } else {
        //     $data = array(
        //         "message" => "203",
        //         "status" => "retrun the meta information",
        //     );
        //     print json_encode($data);
        //     return "203";
        // }
        return $data;
    }
/**
 * @param email,password
 */
    public function login($email, $password)
    {
        $data = [
            'email' => $email,
            'password' => $password,
        ];
        $query = "SELECT * from registeruser WHERE email ='$email' AND password = '$password' ";
        $stmt = $this->db->conn_id->prepare($query);
        $stmt->execute();
        $no = $stmt->rowCount();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($no > 0) {
            $data = array(
                "message" => "200",
                "status" => "Succesfully login.!",
            );
            print json_encode($data);
        } else {
            $data = array(
                "message" => "204",
                "status" => "server successfully processed the request, but is not returning any content",
            );
            print json_encode($data);
            return "204";
        }
        return $data;
    }

    // /**
    //  * @method isEmailPresent() check email number duplicate
    //  * @return void
    //  */
    //      public function isEmailPresent($email){
    //      $query = "SELECT * FROM registeruser ORDER BY id";
    //      $stmt =  $this->connect->prepare($query);
    //      $stmt->execute();
    //  }

}
/*  */
