<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_mdl extends CI_Model
{

	function allstudent()
	{
		 $query = $this->db->get('student');
		 $data = $query->result_array();
		 return $data;
	}

	function addstudent($data)
	{
		 $status = $this->db->insert('student',$data);
		 return ($status)?$this->db->insert_id():false;
	}


	function updatestudent($data,$id)
	{
		 $this->db->where('pk_sid',$id);
		 $status = $this->db->updata('student',$data);
		 return ($status)?true:false;
	}

	function getstudent($id)
	{
		 $this->db->where('pk_sid',$id);
		 $status = $this->db->get('student');
		 return ($status)?$status->row_array():false;
	}

	function deletestudent($id)
	{
		 $this->db->where('pk_sid',$id);
		 $status = $this->db->delete('student');
		 return ($status)?true:false;
	}




}