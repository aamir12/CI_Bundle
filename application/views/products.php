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
<div class="row">
<div class="col-md-6">

<h2 class="text-center bg-primary  well-sm ">Products </h2>
<?php foreach($products as $product)
{

echo form_open('shop/add',array('class'=>'form-horizontal','role'=>'form'));
?>
<div class="row well">

<div class="col-md-3">
<img src="<?=base_url().'assets/uploads/products/'.$product['image'] ?>"  class="img-responsive img-thumbnail " />
</div>
<div class="col-md-9">

  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <?= $product['name']?>
    </div>
  </div>
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="Price">Price:</label>
    <div class="col-sm-10">
      <?= $product['price']?>
    </div>
  </div>
  


<?php
if($product['option_name']!="")
{
echo '<div class="form-group">
    <label class="control-label col-sm-2" for="'.$product['option_name'].'">'.$product['option_name'].'</label>
    <div class="col-sm-10">';

echo '<select name="'.$product['option_name'].'" class="form-control">';
foreach($product['option_value'] as $op)
echo '<option value="'.$op.'">'.$op.' </option>';

echo '</select> </div>
  </div>';
}
echo form_hidden('id',$product['id']);
echo '<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">';

echo form_submit('action','Add to Cart', array('class'=>'btn btn-primary btn-sm'));
echo '</div>
  </div>';

?>



<?php
echo '</div> '.form_close().'</div>';

}
?>





</div>

<div class="col-md-6">
<h2 class="text-center bg-warning well-sm ">Cart </h2>
<table class="table table-bordered table-striped">
    <thead>
      <tr class="danger">
        <th>Name</th>
		<th>Option</th>
        <th>Price</th>
        <th>Quntity</th>
		
		<th>Subtotal</th>
    <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      
<?php

if($cart = $this->cart->contents())
{
foreach($cart as $item)
{
echo '<tr>
        <td>'.$item['name'].'</td>
		<td>';
/*  
  if (array_key_exists("options",$item))
  {  $str = '';
     foreach($item['options'] as $k=>$v)
      $str = $str.$k .':'.$v." <br/>";

    echo substr($str, 0, strlen($str) - 5);
   
  }
*/
  

if($this->cart->has_options($item['rowid']))
{
    $str = '';
  foreach($this->cart->product_options($item['rowid']) as $k=>$v)
    $str = $str.$k .':'.$v." <br/>";

    echo substr($str, 0, strlen($str) - 5);
   
}


     echo '</td>
        <td>$'.$item['price'].'</td>
        <td>'.$item['qty'].'</td>
		<td>$'.$item['subtotal'].'</td>

    <td class="text-center"><a href="shop/remove/'.$item['rowid'].'" class="btn btn-primary btn-xs">X</a></td>
      </tr>
    ';
}

echo '<tr class="danger">

<th colspan="4" class="text-right lead">Total </th>
<td class="lead">$'.$this->cart->total().'</td>
<td class="text-center"><a href="shop/clearall" >Empty Cart</a></td>
</tr>
';

}else
{

echo '<tr class="active"><th class="text-center" colspan="6">Your Cart is Empty</th></tr>';

}

?>

 </tbody>
</table>
  
</div>

</div>

</div>

</body>
</html>
