<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller
{

public function __construct(){
  parent::__construct();
  $this->load->model('Product_mdl');
}

public function index(){
	// $cart = $this->cart->contents();
	// echo "<pre>";
	// print_r($cart);
	// die();
  $data['products'] = $this->Product_mdl->getAllProducts();
  $this->load->view('products',$data);
}


public function remove($rowid){
	$data = array(
				'rowid'=>$rowid,
				'qty'=>0
			);
	$this->cart->update($data);
	return redirect('shop'); 
}


public function clearall(){
	$this->cart->destroy();
	return redirect('shop'); 
}


public function add(){
	$id = $this->input->post('id');
	$product = $this->Product_mdl->getProduct($id);
	$insert = array(
	'id'=>$this->input->post('id'),
	'price'=>$product['price'],
	'qty'=>1,
	'name'=>$product['name']
	);

	if($product['option_name']){
		$insert['options'] = array(
			$product['option_name']=>$this->input->post($product['option_name'])
		);
	}
	$this->cart->insert($insert);
	return redirect('shop');
}



}
