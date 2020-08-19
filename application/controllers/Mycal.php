<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycal extends CI_Controller
{


public function __construct()
{
	parent::__construct();
	$this->load->model("Mycal_mdl");
	
}


public function listevents()
{
$date =  $this->input->post('date');
$date = date('Y-m-d',strtotime($date));	

echo $this->Mycal_mdl->getallevents($date);
	
}

public function display($year=0,$month=0)
{
	
    $data['calendar'] = $this->Mycal_mdl->generate($year,$month);
	$data['year'] = $year;
	$data['month'] = $month;
	$this->load->view('mycal',$data);
	
}

public function addevent()
{
$date =  $this->input->post('date');
$date = date('Y-m-d',strtotime($date));	
$message = $this->input->post('message');
$this->Mycal_mdl->add_events($date,$message);
	
}


public function deleteevent()
{
$id =  $this->input->post('id');
$this->Mycal_mdl->delete_event($id);
	
	
}


}