 function OnPageLoader() {
    document.getElementById("myoverlay").style.display = "block";
}

function OffPageLoader() {
    document.getElementById("myoverlay").style.display = "none";
}
 
 //requesturl request url
 //filterReqFrm form name
 //
	  
$(document).ready(function(){              

		function loadMyData(page)
		{
				OnPageLoader();   
				var data = $('#filterReqFrm');
				var url = $("#requesturl").val();

				$.ajax
				({
				type: "POST",
				url: url,
				data: data.serialize()+"&page="+page,
				success: function(msg)
				{

				OffPageLoader();								
				var result = JSON.parse(msg);							
				$('#TBrecords').html(result['records']);
				$('#mypaginatoin').html(result['pagination']);


				}
				});
		}

		loadMyData(1);  // For first time page load default results

		$('#mypaginatoin').on('click','li.active',function(){
		var page = $(this).attr('p');
		loadMyData(page);

		});       


		$('#mypaginatoin').on('click','#go_btn',function(){
		var page = parseInt($('.goto').val());
		var no_of_pages = parseInt($('.total').attr('a'));
		if(page != 0 && page <= no_of_pages){
		loadMyData(page);
		}else{
		alert('Enter a PAGE between 1 and '+no_of_pages);
		$('.goto').val("").focus();
		return false;
		}

		});



});
			
function clear_searchfilter()
{
$('#filterReqFrm')[0].reset();
getSearch();
}
			
	
