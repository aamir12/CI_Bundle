<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load skill model
		$this->load->model('skill');
    }
    
    public function index(){
		// Load the view
		$this->load->view('skills/index');
    }
	
	function autocompleteData() {
        $returnData = array();
        
        // Get skills data
		$conditions['searchTerm'] = $this->input->get('term');
		$conditions['conditions']['status'] = '1';
        $skillData = $this->skill->getRows($conditions);
		
        // Generate array
		if(!empty($skillData)){
            foreach ($skillData as $row){
				$data['id'] = $row['id'];
                $data['value'] = $row['skill'];
                array_push($returnData, $data);
            }
        }
        
        // Return results as json encoded array
        echo json_encode($returnData);die;
    }
}