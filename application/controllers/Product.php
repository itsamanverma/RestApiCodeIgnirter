<?php
/**
 * @Filename : Product.php
 * purpose   : program to implement resp api methods get,post,put,delete
 * @author   : AMAN
 * @version  : 1.0
 * @since    : 25-02-2019
 ***********************************************************************************/
defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');
require(APPPATH . '/libraries/Format.php');

use Restserver\Libraries\REST_Controller;
//class Product extends CI_Controller
class Product extends REST_Controller
{

    //   public function index($product_name='')
    //   {
    //      echo "<h3>$product_name</h3>";
    //       $this->load->view('product_view');
    //   }
    /**
     * CREATE THE PARENT CONSTRUCT
     */
    function __construct()
    {
        parent::__construct();
    }


    /**
     * function to print all data from database using get restapi
     */
    public function find_all_get()
    {
        $data = json_encode($this->ProductModel->findall());
        // print_r($data);
    }

    /**
     * function to print return particular data from database using get restapi
     */
    public function find_get($id)
    {
        echo json_encode($this->ProductModel->find($id), JSON_PRETTY_PRINT);
    }

    /**
     * function to create data into database using post restapi
     */

    public function create_post()
    {
        $prod = array(
            $this->post('id'),
            $this->post('name'),
            $this->post('price'),
            $this->post('quantity')
        );
        $d = $this->ProductModel->insert($prod);
    }

    /**
     * function to update the details in database using put restapi
     */

    public function update_put()
    {
        $prod = array(
            $this->put('name'),
            $this->put('price'),
            $this->put('quantity')
        );
        print_r($prod);
        $this->ProductModel->update($this->put('id'), $prod);
    }

    /**
     * function to delete data from database using delete restapi
     */

    public function delete_delete($id)
    {
        $this->ProductModel->delete($id);
    }
}
 