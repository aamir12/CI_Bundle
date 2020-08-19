<?php 

function islogin()
{
	$CI = & get_instance();
	if(!$CI->session->userdata('admin_id'))
    return redirect(ADMIN.'login'); 

}



function get_pagination($previous_next_btn  ,$first_last_btn ,$per_page,$page,$totalrecords)
{

	$cur_page = $page;
	$page -= 1;
	$start = $page * $per_page;

	$no_of_paginations = ceil($totalrecords / $per_page);

	/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
	if ($cur_page >= 5) {
		$start_loop = $cur_page - 2;
		if ($no_of_paginations > $cur_page + 2)
			$end_loop = $cur_page + 2;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 4) {
			$start_loop = $no_of_paginations - 4;
			$end_loop = $no_of_paginations;
		} else {
			$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations > 5)
			$end_loop = 5;
		else
			$end_loop = $no_of_paginations;
	}
	/* ----------------------------------------------------------------------------------------------------------- */
	$msg = "<div class='col-md-8 text-center'><div class='pagination'><ul>";

	// FOR ENABLING THE FIRST BUTTON
	if ($first_last_btn && $cur_page > 1) {
		$msg .= "<li p='1' class='active'>First</li>";
	} else if ($first_last_btn) {
		$msg .= "<li p='1' class='inactive'>First</li>";
	}

	// FOR ENABLING THE PREVIOUS BUTTON
	if ($previous_next_btn && $cur_page > 1) {
		$pre = $cur_page - 1;
		$msg .= "<li p='$pre' class='active'>Previous</li>";
	} else if ($previous_next_btn) {
		$msg .= "<li class='inactive'>Previous</li>";
	}
	for ($i = $start_loop; $i <= $end_loop; $i++) {

		if ($cur_page == $i)
			$msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
		else
			$msg .= "<li p='$i' class='active'>{$i}</li>";
	}

	// TO ENABLE THE NEXT BUTTON
	if ($previous_next_btn && $cur_page < $no_of_paginations) {
		$nex = $cur_page + 1;
		$msg .= "<li p='$nex' class='active'>Next</li>";
	} else if ($previous_next_btn) {
		$msg .= "<li class='inactive'>Next</li>";
	}

	// TO ENABLE THE END BUTTON
	if ($first_last_btn && $cur_page < $no_of_paginations) {
		$msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
	} else if ($first_last_btn) {
		$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
	}
	
	$goto = "<div class='col-md-2'><div style='margin:20px 0px;'><input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/> </div></div>";
	$total_string = "<div class='col-md-2 text-center'><div style='margin:20px 0px; padding-right:10px; '><span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span> </div></div>";
	$res = $msg . "</ul></div></div>" . $goto . $total_string ;  // Content for pagination
	return $res;

}


function setmessage($type,$msg)
{
   if($type=='success')
   {
     $heading = 'Success !';
     $icon = '<i class="icon-check_circle"></i>';
     $classname='alert-success';
   }

   if($type=='danger')
   {
     $heading = 'Error !';
     $icon = '<i class="icon-cross2"></i>';
     $classname='alert-danger';
   }


	$CI->session->set_flashdata('mymsg','<div class="alert '.$classname.'">
	<strong>'.$heading.'!</strong> '.$msg.'
	</div>');


}



?>