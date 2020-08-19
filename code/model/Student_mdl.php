<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_mdl extends CI_Model
{

function addstudent($stddata)
{
$this->db->insert('student',$stddata);
}


function allstudent()
{
$q = $this->db->get('student');
return $q->result_array();
}

function deletestudent($stddata)
{
$this->db->where('pk_sid', $stddata);
$this->db->delete('student');

}


function getstudent($stddata)
{
$this->db->where('pk_sid',$stddata);
$q = $this->db->get('student');
return $q->row_array();
}

function updatestudent($stddata,$stdid)
{
$this->db->where('pk_sid',$stdid);
$q = $this->db->update('student',$stddata);
}


}