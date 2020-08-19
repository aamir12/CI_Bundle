<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Event Calendar</title>

<style type="text/css">
.calendar{
	font-family:Arial;
	font-size:12px;
	
}

table.calendar{
	border-collapse : collapse;
	margin:auto;
	
}
.calendar .days td
{
width:80px; height:80px; padding:4px;	
border :1px solid #999 ;
vertical-align:top;
background-color:#def;
}

.calendar .days td:hover
{
	background-color:#fff;
}

.calendar .highlight
{
	font-weight:bold;
	color:red;
	background-color:#fff;
	
}

.calendar th
{
	text-align:center;
	background-color:#ff0000;
	color:#fff;
	padding:15px;
	font-size:15px;
	
}
.calendar th a
{
	background-color:yellow;
	padding:5px;
	color:#000;
	font-size:12px;
	border-radius:5px;
	text-decoration : none !important;
}




.addeve{
float:right;
padding:0px 4px;
border:solid 1px #000;
background-color:yellow;
border-radius:50%;	
cursor:pointer;
}

.haveevent{
	width:100%;
	height:100%;
	padding:5px;
background-color: rgba(98, 195, 123, 0.54);
	
}

.day_num{
	font-size: 18px;
    
}

</style>
<link rel="stylesheet" href="<?= CSSURL ?>bootstrap.min.css">
<script src="<?= JSURL ?>jquery-3.2.0.min.js"></script>
<script src="<?= JSURL ?>bootstrap.min.js"></script>
  
  
<script type="text/javascript">
<?php
$year  = ($year==0)?date('Y'):$year;
$month  = ($month==0)?date('m'):$month;	 
	 
?>

$(document).ready(function(){
	
 $('.calendar .days td').click(function(){
	 
	 if($("#chkact").val() =='0')
		 return;
	 
	 var day = $(this).find('.day_num').html();
	 
	 if (typeof day === "undefined")
	 return;
	 
	 day = "<?php echo $year.'-'.$month.'-'; ?>"+day;
	 
	 var date = new Date(day);
        var newdate = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();
	 $("#datehead").html(newdate);
	 
	  $.ajax({
			 url:"<?php echo base_url().'mycal/listevents'?>",
			 type : "POST",
			 data: {
				date: day

			 },
			 success : function(data)
			 {
				  if(data!="")
				  {  
                $("#eventsdata").html(data);
				 $("#eventlist").modal({backdrop: "static"});
				  }
			 }
			 
			 
		 });
	 
	 
 
 })	;

 $('.addeve').click(function(){
	 
	 var day = $(this).attr('id');
	 day = "<?php echo $year.'-'.$month.'-'; ?>"+day; 
	 $("#date").val(day);
	 $("#chkact").val('0');
	 $("#myModal").modal({backdrop: "static"});
	 
	 
	 

 });


  $('#addeventfrm').on('submit', function(e){
       e.preventDefault();
       var data = $("#addeventfrm").serialize();
	    $.ajax({
			 url:"<?php echo base_url().'mycal/addevent'?>",
			 type : "POST",
			 data: data,
			 success : function(data)
			 {
				 location.reload();
				 
			 }
			 
			 
		 });
		
	   
	   
  });
 
});


function closeaddevent()
{
	$("#chkact").val('1');
	$("#myModal").modal("hide");
	$("#addeventfrm")[0].reset();
}

function deleteevent(eid)
{
	
	 $.ajax({
			 url:"<?php echo base_url().'mycal/deleteevent'?>",
			 type : "POST",
			 data: {
				id: eid

			 },
			 success : function()
			 {
               location.reload(); 
			 }
			 
			 
		 });
	 
	
}

</script>

</head>

<body>

<?php
echo $calendar;
?>
<input type="hidden" id="chkact" value="1" /> 

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
	  <form  id="addeventfrm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Event</h4>
        </div>
        <div class="modal-body">
   
   
  <div class="form-group">
    <label for="message">Event:</label>
    <input type="text" class="form-control" id="message" name="message" required>
  </div>
 
  <input type="hidden" value="" id="date" name="date" />
        </div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="closeaddevent()">Close</button>
		  <button type="submit" class="btn btn-primary" >Save</button>
        </div>
		
		 </form>
		
      </div>
      
    </div>
  </div>
  
  


<!-- Modal -->
  <div class="modal fade" id="eventlist" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
	  <form action="" id="addeventfrm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Event List of  &nbsp;<span id="datehead"></span></h4>
        </div>
        <div class="modal-body">
     
       <table class="table table-bordered table-striped">
    <thead>
      <tr class="info">
        <th>Event</th>
        <th width="5%">Action</th>
        
      </tr>
    </thead>
    <tbody id="eventsdata">
      
    </tbody>
  </table>
   
  
  
        </div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  
        </div>
		
		 </form>
		
      </div>
      
    </div>
  </div>
  


  
  
</body>
</html>