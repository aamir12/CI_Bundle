<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycal_mdl extends CI_Model
{
	
	private $conf;
	
	public function __construct()
	{
		parent::__construct();
		$this->conf = array(
        'month_type'   => 'short',
        'day_type'     => 'short',
		'show_next_prev'=> true,
		'next_prev_url' => base_url().'mycal/display'
      );
	  
	  
	  $this->conf['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar ">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
		<div class="haveevent">
	    <span class="addeve" id="{day}">+</span>	
		<span class="day_num">{day} </span> 
		
		</div>
		{/cal_cell_content}
		
        {cal_cell_content_today}
		<div class="haveevent">
		<span class="addeve" id="{day}">+</span>
		<span class="day_num highlight">{day}</span>
		
         </div>		
		{/cal_cell_content_today}

        {cal_cell_no_content}
		<span class="addeve" id="{day}">+</span>
		<span class="day_num">{day}</span>
		{/cal_cell_no_content}
		
        {cal_cell_no_content_today}
		<span class="addeve">+</span>
		<span class="day_num highlight">{day}</span>
		{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';
	  
	  
	  
		
	}
	
	
	public function getallevents($date)
	{
		$query = $this->db->get_where("events","created_date like '%".$date."%'");
	
	$eventdata = '';
	if($query->num_rows()>0){	
	foreach($query->result_array() as $row)
	{				
		$eventdata.= '<tr>
        <td>'.$row['message'].'</td>
        <td><a href="javascript:void(0);"   onclick="deleteevent(\''.$row['id'].'\')" class="btn btn-danger btn-xs">X</a></td>        
      </tr>';
		
	}
	
	}
	
	return $eventdata;
		
	}
	
	
	public function getevents($year,$month)
	{
		$query = $this->db->get_where("events","created_date like '".$year."-".$month."%'");
		
		$eventdata = array();
			if($query->num_rows()>0)
			{	
				foreach($query->result_array() as $row)
				{

					$day = substr($row['created_date'],8,2);
					if( $day < 10)
					{
					 $day = substr($day,1,1);
						
					}	
					
					$eventdata[$day] = $row['message'];
					
				}
			
			}
		
		return $eventdata;
	}
	
	public function generate($year,$month)
	{
	 $year  = ($year==0)?date('Y'):$year;
     $month  = ($month==0)?date('m'):$month;	 
	 
	 $this->load->library("calendar",$this->conf);
	 $data = $this->getevents($year,$month);	 
	 return $this->calendar->generate($year, $month,$data);
		
	}
	
	
	public function add_events($date,$data){
		
		$this->db->insert('events',['created_date'=>$date,'message'=>$data]);
		
		
	}
	
	
	public function delete_event($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('events');
	}
	
}
