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

 <h2>Students </h2>
 
 
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
		
      </tr>
     <?php
	 }
	 ?>
	 
	 
    </tbody>
  </table>
<?= $this->pagination->create_links() ?>


 
  
</div>

</body>
</html>
