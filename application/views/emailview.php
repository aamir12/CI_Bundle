

<!DOCTYPE HTML>
<html>
<head>
<title>Email Send</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<!-- Custom Theme files -->
<link href="<?php echo ASSETS.'email/';?>css/style.css" rel='stylesheet' type='text/css' />	
<!-- Custom Theme files -->

<script src="<?php echo ASSETS.'email/';?>tinymce/tinymce.min.js"></script>

<script>
tinymce.init({
  selector: '#myTextarea',
 relative_urls : false,
remove_script_host : false,
convert_urls : true,

  height: 250,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools image'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
  toolbar2: 'print preview media | forecolor backcolor emoticons | image code',
  // without images_upload_url set, Upload tab won't show up
    images_upload_url: '<?php echo base_url().'emailtemplate/upload/';?>',
    
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '<?php echo base_url().'emailtemplate/upload/';?>');
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);


        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },
});
</script>

</head>
<body>
<!--main-->
    <div class="main effect2">
		
			<div class="login-form">
			  <div class="login-inner">
			        <h2>Email Updates</h2>
					<p>If you enjoyed this article,subscribe below to get free email updates</p>
					<form method="post" action="<?=ROOTURL.'emailtemplate/sendmail'?>">
						<input type="text" name="recipient" class="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" >
				       
				       <input type="text" name="subject" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" >

				        <textarea id="myTextarea" name="message"></textarea>
						<div class="submit"><input type="submit"  value="Send" ></div>
						<div class="clear"></div>
						
					</form>
				</div>
					   
             </div>
		<div class="clear"></div>
	</div>
	
</body>
</html>