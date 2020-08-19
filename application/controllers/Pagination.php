<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller
{

public function __construct()
{
 parent::__construct();
$this->load->model('Student_mdl');
}


public function index()
{

$this->load->library('pagination');
$config = [
'base_url'=>base_url('pagination/index'),
'per_page' =>4,
'total_rows' => $this->Student_mdl->totalrows(),
"full_tag_open" => "<center><ul class='pagination'>",
"full_tag_close" => "</ul></center>",
"first_tag_open" => "<li>",
"first_tag_close" => "</li>",
"last_tag_open" => "<li>",
"last_tag_close" => "</li>",
"next_tag_open" => "<li> ",
"next_tag_close" => "</li>",
"prev_tag_open" => "<li>",
"prev_tag_close" => "</li>",
"num_tag_open" => "<li>",
"num_tag_close" => "</li>",
"cur_tag_open" => "<li class='active'><a>",
"cur_tag_close" => "</a></li>",
"use_page_numbers" => TRUE

];


$this->pagination->initialize($config);

$limit = $config['per_page'];
$offset = $this->uri->segment(3);
$offset = ($offset=='' || filter_var($offset, FILTER_VALIDATE_INT) === false)?1:$offset;
$cur_page = $offset;
$offset -= 1;
$per_page = $limit;
$start = $offset * $per_page;
$data['students'] = $this->Student_mdl->getAllstudent($limit,$start);
$this->load->view('pagination',$data);
}




}
