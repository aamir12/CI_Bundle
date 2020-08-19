<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crud</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
	    //add and edit
        if($action=='Add' || $action=='Edit')
        {

    ?>
       <form action="" method="post">
       	Name: <input type="text" name="studentname" id="studentname" value="<?=(!empty($userdata['studentname'])?$userdata['studentname']:'')?>">
       	 	<br>
       	Contact : <input type="text" name="contact" id="contact" value="<?=(!empty($userdata['contact'])?$userdata['contact']:'')?>">
       	<br>
       	Address: <textarea name="address" id="address" ><?=(!empty($userdata['address'])?$userdata['address']:'')?></textarea>
       	<br>

         <?php 
         $gender = (!empty($userdata['gender'])?$userdata['gender']:'');
         ?>
       	Gender:       		
       		<input type="radio" value="Male" name="gender" <?=(($gender=='Male')?'checked="checked"':'')?>>Male
       		<input type="radio" value="Female" name="gender" <?=(($gender=='Female')?'checked="checked"':'')?>>Female
        <br>
        
        Hobbies
        <?php
         $hobby = (!empty($userdata['hobbies'])?explode('@',$userdata['hobbies']):array());
        ?>

         <input type="checkbox" name="hobbies" value="Cricket" <?=(in_array('Cricket',$hobby)?'checked="checked"':'')?>>Cricket
       	<input type="checkbox" name="hobbies" value="Football" <?=(in_array('Football',$hobby)?'checked="checked"':'')?>>Football

       	<br>
       	<select name="category" id="category">
       	<?php 
         $category = (!empty($userdata['category'])?$userdata['category']:'');
        ?>
       		<option value="">Select</option>
       		<option value="OBC" <?=(($category=='OBC')?'selected="selected"':'')?>>OBC</option>
       		<option value="ST" <?=(($category=='ST')?'selected="selected"':'')?>>ST</option>
       		<option value="General" <?=(($category=='General')?'selected="selected"':'')?>>General</option>

       	</select>
        <br>	
        <input type="submit" name="save" value="save">
        <input type="hidden" name="id" value="<?=(!empty($userdata['pk_sid'])?$userdata['pk_sid']:'')?>">

       </form>
    <?php
        }else 
        {
         //view
    ?>
     <table>
     	<tr>
     		<td>Name</td>
     		<td>Contact</td>
     		<td>Hobbies</td>
     		<td>Gender</td>
     		<td>Action</td>
     	</tr>
     <?php
       foreach($allstudents as $std)
       {
       	?>

       	<tr>
     		<td><?=$std['studentname']?></td>
     		<td><?=$std['contact']?></td>
     		<td><?= str_replace('@', ',',$std['hobbies'])?></td>
     		<td><?=$std['gender']?></td>
     		<td><a href="<?='crud/edit/'.$std['pk_sid']?>">Edit</a> <br> <a href="<?='crud/delete/'.$std['pk_sid']?>">delete</a> </td>
     	</tr>

       	<?php
       }
     ?>

     </table>

        
    <?php    	
        }	
	?>
	
</body>
</html>