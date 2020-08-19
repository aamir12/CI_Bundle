<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypdf extends CI_Controller
{

  public function index()
  {
    //$this->load->view('welcome_message');
      // Get output html
    $html = $this->load->view('welcome_message','',true);
    
    // Load pdf library
    $this->load->library('pdf');
    
    // Load HTML content
    $this->dompdf->loadHtml($html);
    
    // (Optional) Setup the paper size and orientation
    $this->dompdf->setPaper('A4', 'landscape');
    
    // Render the HTML as PDF
    $this->dompdf->render();
    
    // Output the generated PDF (1 = download and 0 = preview)
    $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
  }



}