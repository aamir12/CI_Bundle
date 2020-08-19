<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller
{
  
	public function __construct()
	{

	parent::__construct();
	$this->load->model('Crud_mdl');
	
	  
	}


	public function index()
	{
		// $data['action'] = '';
		// $data['allstudents'] = $this->Crud_mdl->allstudent();
		// $this->load->view('crud',$data);

		$this->load->view('json');

	}

	public function alldata()
	{
		$data = $this->Crud_mdl->allstudent();
		echo json_encode($data);
	}

	public function getdata()
	{
		$data = $this->Crud_mdl->allstudent();
		$dd = json_encode($data);
		echo "hellofriend(".$dd.")";
	}

	

}
