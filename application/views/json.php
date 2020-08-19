<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>title</title>
	 
</head>
<body>
	
	<div id="demo"></div>
    

</body>

  <script  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- <script>
  	$.ajax({
       url:"<?=base_url()?>"+"json/alldata",
       type:"POST",
       success:function(data)
       {
           var result = JSON.parse(data);
         
           var x = "";
           //method 1
          /* for(i in result)
           {
           	  x+= result[i].studentname+"<br>";

           }

           */
           
//with key and value
/* 
$.each(result,function(k,v){
	$.each(v,function(k1,v1){
	x+= k1+":"+v1+"<br>";	
	});
});
*/

            $.each(result,function(key,value){     
			   x+= value.studentname+"<br>";	
		    });

           $("#demo").html(x);
       }

  	});

  	function hellofriend(data)
  	{  

  		alert(data);
  	}
  </script> -->

<!--   <script>
  	$.ajax({
     url:'<?=base_url()?>'+'json/getdata',
     type:'POST',
     success:function(data)
     {
     	//alert(data);
     	eval(data);
     }


  	});

  	function hellofriend(data)
  	{
  		data1 = JSON.stringify(data);
  		alert('hello');
  		alert(data1);
  	}


  </script> -->

<script>
	function hellofriend(data)
  	{
  		data1 = JSON.stringify(data);
  		alert('hello');
  		alert(data1);
  	}
	
</script>
 
 <script src="<?=base_url().'json/getdata'?>"></script>

</html>