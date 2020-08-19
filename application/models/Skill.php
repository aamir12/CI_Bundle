<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Skill extends CI_Model{
    function __construct() {
		$this->dbTbl = 'skills';
    }
	
	/*
     * Get rows from the skills table
     */
    function getRows($params = array()){
        $this->db->select("*");
		$this->db->from($this->dbTbl);
		
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
		}
		
		//search by terms
		if(!empty($params['searchTerm'])){
			$this->db->like('skill', $params['searchTerm']);
		}
        
		$this->db->order_by('skill', 'asc');
		
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
        }else{
			$query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
    }
}