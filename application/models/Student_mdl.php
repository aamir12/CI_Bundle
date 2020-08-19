<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_mdl extends CI_Model
{

function addstudent($stddata)
{
$this->db->insert('student',$stddata);
}

function totalrows()
{
$q = $this->db->count_all('student');
return $q;
}


function getAllstudent($limit,$offset)
{

$q =  $this->db->limit($limit,$offset)->get('student');
return $q->result_array();

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

function search_studentdata($param = array())
{
   $resultArray = array(
			"records" =>"",
			"pagination" => ""
			);
		  
			
			
			if($param['search']['keyword']!="")
			{
			  $this->db->like('studentname' ,$param['search']['keyword'] );
			  $this->db->or_like('contact' ,$param['search']['keyword'] );
			}
			
			
		   $page= $param['pagination']['start'];
		   $cur_page = $page;
		   $page -= 1;
		   $per_page = $param['pagination']['limit'];
		   $start = $page * $per_page;
	       $query = $this->db->get('student');
		   $totalrecords =  $query->num_rows();
		   
		   if($param['search']['keyword']!="")
			{
			  $this->db->like('studentname' ,$param['search']['keyword'] );
			  $this->db->or_like('contact' ,$param['search']['keyword'] );
			}
		   
            $this->db->limit($per_page, $start);		   
		    $query = $this->db->get('student');
		    
		if($query->num_rows()>0)
		{
		 $records = "";
		 $result =  $query->result_array();
		 foreach($result as  $row)
		 {
		  
			  $records.='<tr>	
			  <td >'.$row['studentname'].'</td>	
			  <td >'.$row['address'].'</td>
			  <td >'.$row['contact'].'</td>
			  <td >'.$row['gender'].'</td>
			  <td >'.$row['category'].'</td>
			 <td class="text-center"> 
			  <a href="editoutwardbill.php?ebillanum='.$row['pk_sid'].'" style="text-decoration:none;">
			  <img src="'.ASSETS.'img/editicon.png" style="cursor:pointer;" > </a>
			 <img src="'.ASSETS.'img/printimg.png" style="cursor:pointer;" onclick="javascript:printreport(\''.$row['pk_sid'].'\' ,\''.$row['contact'].'\' )"></td>	
			  </tr>'; 
		 
		 }
		 $resultArray['records'] = $records;
		 $resultArray['pagination'] = get_pagination(true,true , $per_page ,$cur_page ,$totalrecords ); 
		 
		}else
		{
		 $resultArray['records'] ='<tr><td colspan="12" class="text-center"> No Records Found </td></tr>';
		 $resultArray['pagination'] = '';
		}
				
		echo json_encode($resultArray);

}


}