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

  <h2><?php echo ($action=='add')?'Add':'Edit' ;?> Student <a href="<?= ROOTURL.'Student'?>" class="btn btn-primary pull-right">
 Back
 </a></h2>
  
   
  
  <?php if(validation_errors()) { echo '<div class="alert alert-danger"><ul>'. validation_errors('<li>','</li>').'</ul></div>'; }?> 
  
  <form class="form-horizontal" action="<?=ROOTURL.'Student/save'?>" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="studentname">Student Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="studentname"  name="studentname" value="<?= $userdata['studentname']?>">
		<?= form_error('studentname')?>
      </div>
    </div>
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="address">Address :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="address" value="<?= $userdata['address']?>"  name="address">
		<?= form_error('address')?>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="contact" value="<?= $userdata['contact'] ?>" name="contact">
		<?= form_error('contact')?>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="studentname">Gender:</label>
      <div class="col-sm-10">
        <div class="radio">
  <label><input type="radio" name="gender" value="Male" <?php echo ($userdata['gender']=='Male')?'checked="checked"':'';?>>Male</label>
</div>
<div class="radio">
  <label><input type="radio" name="gender" <?php echo ($userdata['gender']=='Female')?'checked="checked"':'';?> value="Female">Female</label>
</div>

<?= form_error('gender')?>
      </div>
    </div>
	
	<?php
	$hobbies = $userdata['hobbies'];
     if(!is_array($hobbies))
	  $hobbies = explode('@',$hobbies);

	?>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="hobbies">Hobbies:</label>
      <div class="col-sm-10">
        <div class="checkbox">
  <label><input type="checkbox" 
  <?php
  echo (in_array('Cricket',$hobbies))?'checked="checked"':'';
  ?>   name="hobbies[]" value="Cricket" >Cricket </label>
</div>
<div class="checkbox">
  <label><input type="checkbox"  <?php
  echo (in_array('Football',$hobbies))?'checked="checked"':'';
  ?>  name="hobbies[]" value="Football">Football </label>
</div>


<?= form_error('hobbies[]')?>
      </div>
    </div>
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="studentname">Category:</label>
      <div class="col-sm-10">
         <select class="form-control" id="category" name="category">
		 
		  <option value="" >Select Category </option>
		 
    <option value="General" <?php echo ($userdata['category']=='General')?'selected="selected"':'';?>>General </option>
    <option value="OBC" <?php echo ($userdata['category']=='OBC')?'selected="selected"':'';?>>OBC</option>
    <option value="ST"  <?php echo ($userdata['category']=='ST')?'selected="selected"':'';?>>ST</option>
    
  </select>
  
  <?= form_error('category')?>
      </div>
    </div>
	
	
	
	
	<input type="hidden" value="<?php echo $userdata['pk_sid'];?>" name="pk_sid">
	
   	<input type="hidden" value="<?php echo $action;?>" name="action">
    
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
 <h2>Students <a href="<?= ROOTURL.'Student/add'?>" class="btn btn-primary pull-right">
 Add Student
 </a></h2>
 
 
 <?php
if($error = $this->session->flashdata('mymsg'))
  echo '<br/> <br/>'.$error;
?>
 
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Contact</th>
        <th>Hobbies</th>
		<th>Gender</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	foreach($students as $std)
	{
	?>
      <tr>
        <td><?php echo $std['studentname'];?></td>
        <td><?php echo $std['contact'];?></td>
		<td><?php echo str_replace('@',',',$std['hobbies']);?></td>
		<td><?php echo $std['gender'];?></td>
		<td >
		<a  href="<?php echo base_url()."Student/delete/".$std['pk_sid']; ?>" onclick="return confirm('Are u sure u to delete');">Delete</a>
		&nbsp;
		<a  href="<?php echo base_url()."Student/edit/".$std['pk_sid']; ?>">Edit</a></td>
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
