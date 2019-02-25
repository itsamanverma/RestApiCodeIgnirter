<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model{

    /**
     * function to write query for get method
     */
    public function findall(){
        $qe = "SELECT * FROM test ";
       $data = $this->db->query ("SELECT * FROM test ")->result_array();
        print_r($data);
   
        foreach ($data as $record) {
            echo $record->id."   ";
            echo $record->name."   ";
            echo $record->price."   ";
            echo $record->quantity."\n";
            
            // echo $row['name']."<br />\n";
        }

    }

    /**
     * function to write query for get method
     */
    public function find($id){
       $data =  $this->db->query("SELECT * FROM test WHERE id = '$id'")->row()->result(); 
        // $this->db->where('id',$id);
        // return $this->db->get('product')->row();
        return $data;
        // foreach ($data as $record) {
        //     print_r($record->id."</br>");
        //     print_r($record->name."</br>");
        //     print_r($record->price."</br>");
        //     print_r($record->quantity."</br>");
        //     // echo $row['name']."<br />\n";
        // }
    }

    /**
     * function to write query for post method
     */
    public function insert($data){
        print_r($data);
        $id = $data[0];
        $name = $data[1];
        $price = $data[2];
        $quantity = $data[3];
        $query = $this->db->query("INSERT INTO test (id,name,price,quantity) VALUES ('" . $id . "','" . $name . "'," . $price . "," . $quantity . ")");
        ProductModel::queryRun($query);        
    }

    /**
     * function to write query for put method
     */
    public function update($id,$data){
        print_r($data);
        $name = $data[0];
        $price = $data[1];
        $quantity = $data[2];
        $query = $this->db->query("UPDATE test SET name='".$name."', price='".$price."', quantity='".$quantity."' where id='".$id ."'");
        ProductModel::queryRun($query); 
    }

    public function delete($id){
        $query = $this->db->query("DELETE from test where id='".$id ."'  ");
        ProductModel::queryRun($query);
    }

    /**
     * function to run query and return status to the user 
     * 
     * @return json the json data of the sql query 
     */
    public function queryRun($res)
    {
        // if (!($res = $this->db->query($query))) {
        //     $error = $this->db->error(); // Has keys 'code' and 'message'
        //     echo json_encode(array("status" => 500, "message" => $error["message"]), JSON_PRETTY_PRINT);
        // } else {
         //   var_dump($res);
            if (is_bool($res))
                echo json_encode(array("status" => 200, "message" => "succes"), JSON_PRETTY_PRINT);
            else
                echo json_encode(array("status" => 200, "message" => "fail"), JSON_PRETTY_PRINT);
        
    }
}


?>