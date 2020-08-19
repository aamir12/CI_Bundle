<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxfileupload extends CI_Controller
{

public function __construct()
{
 parent::__construct();
$this->load->model('Gallery_mdl');
}


public function index()
{
$data['action'] = '';
$data['images'] = $this->Gallery_mdl->allgalleryimage();

$this->load->view('ajaxupload',$data);
}


public function fileupload()
{


if(isset($_FILES["image"]["name"]))
{
 
$config = array(
'allowed_types'=>'jpg|png|jpeg',
'upload_path'=> realpath(APPPATH.'../assets/uploads/'),
'max_size'=>200
);
$this->load->library('upload', $config);
$this->upload->initialize($config);
if (!$this->upload->do_upload('image'))
{
 echo json_encode(array('offset'=>0,'msg'=>$this->upload->display_errors(),'imageupload'=>'', 'class'=>"text-danger", "action"=>$this->input->post('action')));

} else {
$upload_data = $this->upload->data();
 echo json_encode(array('offset'=>1,'msg'=>'File Upload Successfully','imageupload'=>$upload_data['file_name'] , 'class'=>"text-success", "action"=>$this->input->post('action')));

}

}else
{
echo json_encode(array('offset'=>0,'msg'=>'This field is required','imageupload'=>'' , 'class'=>"text-danger", "action"=>$this->input->post('action')));


}

}


public function FileAjaxUpload()
{

$imageName = $_FILES["image"]["name"];


if(!empty($imageName) && $imageName!='') {

$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
$fileAllow = array("jpg","jpeg","png","gif");

if(in_array($fileExtension,$fileAllow)){

if($_FILES["image"]["size"] < 200000) {

$strDtMix = @date("d").substr((string)microtime(), 2, 8);
$uploadfile = $strDtMix.".".pathinfo($imageName, PATHINFO_EXTENSION);
$path =APPPATH.'../assets/uploads/'.$uploadfile;
move_uploaded_file($_FILES['image']['tmp_name'],$path);

echo json_encode(array('offset'=>1,'msg'=>'File Upload Successfully','imageupload'=>$uploadfile , 'class'=>"text-success", "action"=>$this->input->post('action')));


}else
{

 echo json_encode(array('offset'=>0,'msg'=>'File size must be less than 200kb','imageupload'=>'', 'class'=>"text-danger", "action"=>$this->input->post('action')));


}
}else
{
 
 echo json_encode(array('offset'=>0,'msg'=>'Only jpg,jpeg,png files are allowed','imageupload'=>'', 'class'=>"text-danger", "action"=>$this->input->post('action')));

}

}
else
{
echo json_encode(array('offset'=>0,'msg'=>'This field is required','imageupload'=>'' , 'class'=>"text-danger", "action"=>$this->input->post('action')));


}



}





public function add()
{
$data['action'] = 'add';

$image = array(
               'pk_gid'=>'',
               'heading'=>'',
                'image'=>'',
                			   
               );
$data['userdata'] = $image;
$this->load->view('ajaxupload',$data);
}


public function edit($sid="")
{

$data['action'] = 'edit';
if($sid=="")
{
return redirect("gallery");
}else
{
$data['userdata'] = $this->Gallery_mdl->getgallery($sid);
if(count($data['userdata'])>0)
{
$this->load->view('gallery',$data);
}else
{
return redirect("gallery");
}

}


}


public function save()
{

$this->load->library('form_validation');
$data['action'] = $this->input->post('action');

$image = array(
               'pk_gid'=>$this->input->post('pk_gid'),
               'heading'=>$this->input->post('heading')	   
               );
			   
			   


$config = array(
array(
'field'=> 'heading',
'label'=> 'Heading',
'rules'=> 'trim|required'
),
array('field'=> 'image',
'label'=> 'Image',
'rules'=> 'callback_validate_image'
)
);


if($data['action']=="add" && empty($_FILES['image']['name']))
{
$config[1]['rules'] = 'required|callback_validate_image';
}

$this->form_validation->set_rules($config);
$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

if($this->form_validation->run()==FALSE)
{
$image['image'] = $this->input->post('preimg');
$data['userdata'] = $image;
$this->load->view('gallery',$data);
}else
{


if($data['action']=='add')
{
//insert
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['upload_path']   = './assets/uploads/';
$this->load->library('upload', $config);


if($this->upload->do_upload('image'))
{
$uploadData = $this->upload->data();
$image['image'] = $uploadData['file_name'];
$this->Gallery_mdl->addgallery($image);
$this->seterrormsg('alert-success','Success','Record Add Successfully.');
}

redirect("gallery");

}else
if($data['action']=='edit')
{
//update
$stdid = $this->input->post('pk_gid');

if(!empty($_FILES['image']['name']))
{
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['upload_path']   = './assets/uploads/';
$this->load->library('upload', $config);
if($this->upload->do_upload('image'))
{
$uploadData = $this->upload->data();
$image['image'] = $uploadData['file_name'];
@unlink('./assets/uploads/'.$this->input->post('preimg'));
}
else
{
$image['image'] = $this->input->post('preimg');
}

}

$this->Gallery_mdl->updategallery($image,$stdid);
$this->seterrormsg('alert-success','Success','Record Update Successfully.');
redirect("gallery");

}

}

}


public function validate_image()
{

$imageName = $_FILES["image"]["name"];
if(!empty($imageName)) {

$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
$fileAllow = array("jpg","jpeg","png","gif");
if(in_array($fileExtension,$fileAllow)){
if($_FILES["image"]["size"] < 200000) {
 return true;
}else
{
$this->form_validation->set_message('validate_image', 'Maximum File size should be 200kb');
 return false;
}
}else
{
 $this->form_validation->set_message('validate_image', 'Please select only gif/jpg/jpeg/png file.');
 return false;
}

}

}


public function delete($stdid)
{
$img = $this->Gallery_mdl->getgallery($stdid);
 $path =realpath(APPPATH.'../assets/uploads/'.$img['image']);
@unlink($path);
$this->Gallery_mdl->deletegallery($stdid);
$this->seterrormsg('alert-success','Success','Record Delete Successfully.');
return redirect('gallery');
}



public function seterrormsg($classname,$heading,$msg)
{
$this->session->set_flashdata('mymsg','<div class="alert '.$classname.'">
<strong>'.$heading.'!</strong> '.$msg.'
</div>');
}


public function showallfile()
{

$this->load->helper('directory');
$files = directory_map('./assets/');

asort($files);

foreach($files as $file){
    if(is_string($file)){
        echo $file;
    }
}

}


}