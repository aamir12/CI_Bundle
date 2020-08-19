<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailtemplate extends CI_Controller
{

	public function __construct()
	{
	  parent::__construct();

	}


	public function index()
	{
	  $this->load->view('emailview');
	}



   public function upload()
   {
			// Allowed origins to upload images
			$accepted_origins = array("http://localhost");

			// Images upload path
			$imageFolder = "upload/";

			reset($_FILES);
			$temp = current($_FILES);
			if(is_uploaded_file($temp['tmp_name'])){
			if(isset($_SERVER['HTTP_ORIGIN'])) {
			// Same-origin requests won't set an origin. If the origin is set, it must be valid.
			if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
			header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
			}else{
			header("HTTP/1.1 403 Origin Denied");
			return;
			}
			}

			// Sanitize input
			if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
			header("HTTP/1.1 400 Invalid file name.");
			return;
			}

			// Verify extension
			if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
			header("HTTP/1.1 400 Invalid extension.");
			return;
			}

			// Accept upload if there was no origin, or if it is an accepted origin
			$filetowrite = $imageFolder . $temp['name'];
			move_uploaded_file($temp['tmp_name'], $filetowrite);

			// Respond to the successful upload with JSON.
			// Use a location key to specify the path to the saved image resource.
			// { location : '/your/uploaded/image/file'}
			echo json_encode(array('location' => $filetowrite));
			} else {
			// Notify editor that the upload failed
			header("HTTP/1.1 500 Server Error");
			}

   }

   public function sendmail()
   {

   	    $this->load->library('encrypt');
		//Load email library
		$this->load->library('email');

		//SMTP & mail configuration
		$config = array(
		'protocol'  => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'webregister88@gmail.com',
		'smtp_pass' => 'Webregister88@510638',
		'mailtype'  => 'html',
		'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = $this->input->post('message');
		$this->email->to($this->input->post('recipient'));
		$this->email->from('webregister88@gmail.com','CodexKing');
		$this->email->subject($this->input->post('subject'));
		$this->email->message($htmlContent);

		//Send email
		$this->email->send();

		return redirect('Emailtemplate');
   }



}
