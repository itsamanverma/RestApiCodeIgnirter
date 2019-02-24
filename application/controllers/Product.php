<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
{
 public function index($product_name='')
 {

    echo "<h3>$product_name</h3>";
     $this->load->view('product_view');
 }
}
?>