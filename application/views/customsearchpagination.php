<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= CSSURL ?>bootstrap.min.css">
  <!--
  working
  <script type='text/javascript' src='<?= JSURL ?>jquery-1.10.2.min.js'></script>
  <script type='text/javascript' src='<?= JSURL ?>jquery-migrate-1.2.1.min.js'></script>
  -->
  
  <script type='text/javascript' src='<?= JSURL ?>jquery-3.2.0.min.js'></script>
  
  <script src="<?= JSURL ?>bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="<?= ASSETS ?>custompagination/custompagination.css">
  <!-- working
   <script src="<?= ASSETS ?>custompagination/custompagination.js"></script>
  -->
  
  <script src="<?= ASSETS ?>custompagination/custompagination1.js"></script>
  
  
</head>
<body>

<div id="myoverlay" >
  <div id="text"><img src="<?php echo ASSETS.'custompagination/preload.gif';?>"></div>
</div>


<div class="container">

 <h2>Students </h2>
 
 
<script>
/*
$(document).ready(function(){
		$("#from").datepicker({
					
					dateFormat:"yy-mm-dd",
					changeMonth: true,
					changeYear: true,
					numberOfMonths: 1, //set number of months display
					onClose: function( selectedDate ) {
						$( "#to" ).datepicker( "option", "minDate", selectedDate );
					}
				});
				
				
		$("#to").datepicker({
					dateFormat:"yy-mm-dd",
					changeMonth: true,
					changeYear: true,
					numberOfMonths: 1, //set number of months display
					onClose: function( selectedDate ) {
						$( "#from" ).datepicker( "option", "maxDate", selectedDate );
					}
		});	

});
*/


function getSearch()
{
    
		OnPageLoader();
		var data = $('#filterReqFrm');
		
		$.ajax
		({
			type: "POST",
			url: "<?php echo ROOTURL.'Customsearchpagination/searchstudentdata'?>",
			data: data.serialize(),
			success: function(msg)
			{

			OffPageLoader();
								
								var result = JSON.parse(msg);
							
								$('#TBrecords').html(result['records']);
								$('#mypaginatoin').html(result['pagination']);
		    }
		});
		
	
		
}

</script>


<form class="form-inline" role="form" name="filterReqFrm" id="filterReqFrm">
  <div class="form-group">
    <label for="keyword">Search:</label>
    <input type="keyword" class="form-control" id="keyword" name="keyword">
  </div>
 
  <button type="button" class="btn btn-primary" id="subsearch" onclick="javascript:getSearch();">
  
  Submit
  </button>
  <button type="button" id="clearall" onclick="javascript:clear_searchfilter();"  class="btn btn-danger">
     
      Clear All
    </button>

<input type="hidden" value="<?php echo ROOTURL.'Customsearchpagination/searchstudentdata'?>" name="requesturl" id="requesturl" />	
	
</form>
 
 
 <table cellpadding="0" cellspacing="0" class="table table-striped" >
	<thead>
		<tr>
		
        <th>Name</th>
		<th>Address</th>
		<th>Contact</th>
        <th>Gender</th>
		<th>Category</th>
		<th>Action</th>
		
	     </tr>
	</thead>
	<tbody id="TBrecords"> 


	</tbody>
	</table>
							
							
	<div class="row" id="mypaginatoin">
	</div>	
 

 
  
</div>

</body>
</html>
