<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{

public function __construct()
{
 parent::__construct();
$this->load->model('Student_mdl');


}


public function index()
{
$data['action'] = '';
$data['students'] = $this->Student_mdl->allstudent();

$this->load->view('student',$data);
}

public function add()
{
$data['action'] = 'add';

$stduent = array(
               'pk_sid'=>'',
               'studentname'=>'',
                'address'=>'',
                'contact'=>'',
              'gender'=>'',
             'hobbies'=>array(),
             'category'=>'' 			   
               );
$data['userdata'] = $stduent;
$this->load->view('student',$data);
}


public function edit($sid="")
{

$data['action'] = 'edit';
if($sid=="")
{
return redirect("student");
}else
{
$data['userdata'] = $this->Student_mdl->getstudent($sid);
if(count($data['userdata'])>0)
{
$this->load->view('student',$data);
}else
{
return redirect("student");
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
$this->Student_mdl->addstudent($stduent);

$this->seterrormsg('alert-success','Success','Record Add Successfully.');
redirect("student");

}else
if($data['action']=='edit')
{
//update
$stdid = $this->input->post('pk_sid');
$this->Student_mdl->updatestudent($stduent,$stdid);
$this->seterrormsg('alert-success','Success','Record Update Successfully.');
redirect("student");

}

}

}


public function delete($stdid)
{

$data['students'] = $this->Student_mdl->deletestudent($stdid);
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
