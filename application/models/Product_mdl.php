<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_mdl extends CI_Model
{

public function getAllProducts()
{
$results = $this->db->get('products')->result_array();

foreach($results as &$result)
{
if($result['option_value'])
{
$result['option_value'] = explode(',',$result['option_value'] );
}
}

return $results;

}

public function getProduct($id)
{
$result = $this->db->get_where('products',['id'=>$id])->row_array();
if($result['option_name'])
{
$result['option_value'] = explode(',',$result['option_value']);
}

return $result;
}




}