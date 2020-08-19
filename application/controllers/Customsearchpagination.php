<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customsearchpagination extends CI_Controller
{

public function __construct()
{
 parent::__construct();
$this->load->model('Student_mdl');
}


public function index()
{

$this->load->view('customsearchpagination');
}


public function searchstudentdata()
{

 $condition['search']['keyword'] = $this->input->post('keyword');
 $page = isset($_POST['page'])?$_POST['page']:'1';
 $condition['pagination']['start'] = $page;
 $condition['pagination']['limit'] = 2;
 $this->Student_mdl->search_studentdata($condition);
 
}



}
