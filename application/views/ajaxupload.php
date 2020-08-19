<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= CSSURL ?>bootstrap.min.css">
  <script src="<?= JSURL ?>jquery-3.2.0.min.js"></script>
  <script src="<?= JSURL ?>bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<?php
if($action=='add' || $action=='edit')
{

?>

  <h2><?php echo ($action=='add')?'Add':'Edit' ;?> Gallery <a href="<?= ROOTURL.'ajaxfileupload'?>" class="btn btn-primary pull-right">
 Back
 </a></h2>
  
   
  
  <?php if(validation_errors()) { echo '<div class="alert alert-danger"><ul>'.validation_errors('<li>','</li>').'</ul></div>'; }?> 
  
  <form class="form-horizontal"  action="<?=ROOTURL.'gallery/save'?>" method="post"  enctype="multipart/form-data" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="heading">Heading:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="heading"  name="heading" value="<?= $userdata['heading']?>">
		<?= form_error('heading')?>
      </div>
    </div>
	
	
<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  var file = _("image").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  var action = _("action").value;
  formdata.append("action", action);
  formdata.append("image", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.open("POST", "<?= base_url('Ajaxfileupload/fileupload')?>");
  ajax.send(formdata);
}
function progressHandler(event){
 
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").style.display="block";

  _("progressBar").value = Math.round(percent);
  
}
function completeHandler(event){

  alert(event.target.responseText);
  var data = JSON.parse(event.target.responseText);

  if(data.offset==0)
   {
   _("progressBar").style.display="none";
   _("progressBar").value = 0;

   }
   if(data.offset==1)
   {

$("#uploadbtn").hide();
$("#image").hide();
$("#progressBar").hide();
   } 

   _("status").innerHTML = data.msg;
   _("imageupload").value = data.imageupload;
  $("#status").attr("class",data.class);
}

</script>


	
	<div class="form-group">
      <label class="control-label col-sm-2" for="address">Image :</label>
      <div class="col-sm-10">
	  <img src="<?php 
		echo ($userdata['image']=='')?base_url().'assets/defaultimg.jpg':base_url().'assets/uploads/'.$userdata['image']?>" style="height:100px; width:100px;" class="img-thumbnail">
        <input type="file" class="form-control" id="image"  name="image" />
         <input type="button" id="uploadbtn" value="Upload" onclick="uploadFile()" />

<progress id="progressBar" value="0" max="100" style="width:300px; display: none;"></progress>
<div id="status"></div>
		<input type="hidden" name="imageupload" id="imageupload"  value="">

		<input type="hidden" name="preimg" value="<?= $userdata['image']?>">


		<?= form_error('image')?>
      </div>
    </div>
	
	
	
	
	<input type="hidden" value="<?php echo $userdata['pk_gid'];?>" name="pk_gid">
	
   	<input type="hidden" value="<?php echo $action;?>" id="action" name="action">
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
  
<?php
}else
{
?>
 <h2>Gallery <a href="<?= ROOTURL.'ajaxfileupload/add'?>" class="btn btn-primary pull-right">
 Add Image
 </a></h2>
 
 
 <?php
if($error = $this->session->flashdata('mymsg'))
  echo '<br/> <br/>'.$error;
?>
 
<table class="table table-striped">
    <thead>
      <tr>
       
        <th>Heading</th>
        <th>Image</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	foreach($images as $img)
	{
	?>
      <tr>
        <td><?php echo '<img src="'.base_url().'assets/uploads/'.$img['image'].'" style="height:100px;width:100px;">';?></td>
        <td><?php echo $img['heading'];?></td>
		
		<td >
		<a  href="<?php echo base_url()."gallery/delete/".$img['pk_gid']; ?>" onclick="return confirm('Are u sure u to delete');">Delete</a>
		&nbsp;
		<a  href="<?php echo base_url()."gallery/edit/".$img['pk_gid']; ?>">Edit</a></td>
      </tr>
     <?php
	 }
	 ?>
    </tbody>
  </table>



<?php
}
?>  
  
</div>

</body>
</html>
