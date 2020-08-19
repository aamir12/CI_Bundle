<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
  
	public function __construct()
	{

	parent::__construct();
	$this->load->model('Crud_mdl');
	$this->load->library('form_validation');
	  
	}


	public function index()
	{
		$data['action'] = '';
		$data['allstudents'] = $this->Crud_mdl->allstudent();
		$this->load->view('crud',$data);

	}

	public function add()
	{

	  $data['action'] = 'Add';
	  $data['userdata'] = array();
	  if($this->input->post('save'))
	  {
	      $data['userdata'] = $this->input->post();
	      $rules = array(
           array('studentname','Student Name'),
        
	      );
	      $this->load->view('crud',$data);
	  }else   
	   {
	    $this->load->view('crud',$data);
	   }
	}


public function edit($sid="")
{

    $data['action'] = 'Edit';
    if($sid=="")
    {
      return redirect("crud");
    }else
    {
    $data['userdata'] = $this->Crud_mdl->getstudent($sid);
    if($data['userdata'])
    {
       $this->load->view('crud',$data);
    }else
    {
      return redirect("crud");
    }

    }


}


public function save()
{

$this->load->library('form_validation');
$data['action'] = $this->input->post('action');

$stduent = array(
               'pk_sid'=>$this->input->post('pk_sid'),
               'studentname'=>$this->input->post('studentname'),
                'address'=>$this->input->post('address'),
                'contact'=>$this->input->post('contact'),
	           'hobbies'=>$this->input->post('hobbies'),	
              'gender'=>$this->input->post('gender'),
             
             'category'=>$this->input->post('category')			   
               );
			   
$data['userdata'] = $stduent;			   

$config = array(
array(
'field'=> 'studentname',
'label'=> 'Student Name',
'rules'=> 'trim|required|alpha',
),
array(
'field'=> 'address',
'label'=> 'Address',
'rules'=> 'trim|required',
),

array(
'field'=> 'contact',
'label'=> 'Contact Number',
'rules'=> 'trim|required|integer',
),

array(
'field'=> 'hobbies[]',
'label'=> 'Hobbies',
'rules'=> 'required',
'errors' =>array('required'=>'Select Atleast One Hobby')
),

array(
'field'=> 'gender',
'label'=> 'Gender',
'rules'=> 'required',
),

array(
'field'=> 'category',
'label'=> 'Category',
'rules'=> 'required',
)
);

if(isset($_POST['hobbies']))
{
  $stduent['hobbies'] = implode('@',$this->input->post('hobbies'));
}

$this->form_validation->set_rules($config);
$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

if($this->form_validation->run()==FALSE)
{
$this->load->view('student',$data);
}else
{

if($data['action']=='add')
{
//insert
$this->Crud_mdl->addstudent($stduent);
$this->seterrormsg('alert-success','Success','Record Add Successfully.');
redirect("student");

}else
if($data['action']=='edit')
{
//update
$stdid = $this->input->post('pk_sid');
$this->Crud_mdl->updatestudent($stduent,$stdid);
$this->seterrormsg('alert-success','Success','Record Update Successfully.');
redirect("student");

}

}

}


public function delete($stdid)
{

$data['students'] = $this->Crud_mdl->deletestudent($stdid);
$this->seterrormsg('alert-success','Success','Record Delete Successfully.');
return redirect('student');
}



public function seterrormsg($classname,$heading,$msg)
{
$this->session->set_flashdata('mymsg','<div class="alert '.$classname.'">
<strong>'.$heading.'!</strong> '.$msg.'
</div>');
}

}
