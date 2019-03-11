<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");

/*********************************************************************
 * @discription  Controller API
 *********************************************************************/
//include '/var/www/html/codeigniter/application/services/JWT.php';
include '/var/www/html/codeigniter/application/Rabbitmq/sender.php';
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

    /**
     * @method veryfyEmailId() verify the email and send verify link to user
     * @return void
     */
    public function veryfyEmailId($token)
    {
        $query = " UPDATE registeruser SET active = 1 where reset_key ='$token' ";
        $stmt = $this->conn_id->prepare($query);
        $true = $stmt->execute();
        $query = "UPDATE registeruser SET reset_key = null where reset_key='$token'";
        $stmt = $this->conn_id->prepare($query);
        if ($stmt->execute()) {
            $dabta = array(
                "message" => "200",
                "status" => "Email verifyed..!",
            );
            print json_encode($data);
            return "200";
        } else {
            $data = array(
                "message" => "401",
                "status" => "Unauthorized error",
            );
            print json_encode($data);
            return "401";
        }
    }
    /**
     * Create the jwtToken
     */
    public function jwtToken($email)
    {
        // $payload   = ['iat' => time(), 'iss' => 'localhost', 'userid' => $email];
        $secretKey = "aman";
        $token = JWT::encode($email, $secretKey);
        return $token;
    }

    /**
     * @method forgotPassword() sending resetting password ink to registered mail
     * @return void
     */
    public function forgotpassword($email)
    {
        $present = ServiceReference::emailpresent($email);
        if ($present) {
            $rabb = new SendMail();
            $token = md5($email);
            $query = "UPDATE registeruser SET reset_key = '$token' where email = '$email'";
            $statement = $this->db->conn_id->prepare($query);
            $statement->execute();
            $sub = 'password recovery mail';
            $body = 'click here to reset password' . $token;
            $response = $rabb->sendEmail($email, $sub, $body);
            if ($response == "sent") {
                $data = array(
                    "message" => "200",
                );
                print json_encode($data);
            } else {
                $data = array(
                    "message" => "400",
                );
                print json_encode($data);
                return "400";
            }
        } else {
            $data = array(
                "message" => "404",
            );
            print json_encode($data);
            return "404";
        }
        return $data;
    }
    /**
     * create the 
     */
    public function emailpresent($email)
    {
        $query = "SELECT * from registeruser WHERE email = '$email'";
        $stmt = $this->db->conn_id->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
}
