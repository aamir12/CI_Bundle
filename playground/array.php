<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array</title>
    <style type="text/css">
      ol{
          display:flex;
          flex-direction:row;
          flex-flow:wrap;
          justify-content:space-between;
          
      }

      li{
        border: solid 1px #000;
        padding: 10px;
        flex: 1;
        margin: 10px;
      }
    </style>
</head>

<?php 
  
  function  show($data){
      echo "<pre>";
       print_r($data);
      echo "</pre>";
  }

  function heading($title){
    echo '<h4>'.$title.'</h4>';
  }
?>
<body>
   <h2>Array Functions</h2>
    <ol>
       <li>
          <h3>Array Filter (array_filter)</h3>
          <?php
             function even($var){
                return $var%2==0;
             }
             $array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
             $array2 = [1,2,3,4,5];
             heading('Associative Array');
             show($array1);
             heading('Result');
             show(array_filter($array1,'even'));
            
             $array3 = [
              ['id'=>1,'age'=>28,'name'=>'Aamir','city'=>'Bhopal'],
              ['id'=>2,'age'=>30,'name'=>'Tahir','city'=>'Betul'],
              ['id'=>3,'age'=>25,'name'=>'Azhar','city'=>'Mumbai'],
              ['id'=>4,'age'=>27,'name'=>'Girjesh','city'=>'Bhopal'],
              ['id'=>5,'age'=>23,'name'=>'Ajay','city'=>'Bhopal'],
             ];

             heading('Array of array');
             show($array3);
             heading('Result');
             show(array_filter($array3,function($user){
                return $user['city'] =='Bhopal' && $user['age']>23;
             }));

             $array4 = [
                [
                   'name' => 'T shirt',
                   'options' => [
                       'size'=>'XL',
                       'color' => 'Red'
                    ]
                ],
                [
                    'name' => 'Trouser'
                ],
                [
                    'name' => 'Black shirt',
                    'options' => [
                        'size'=>'XL',
                        'color' => 'Red'
                     ]
                ],

             ];

             heading('Array of array');
             show($array4);
             $filter = ['color'=>'Red','size'=>'XL'];
             $name = 'Black shirt'; 
             show(array_filter($array4,function($product) use ($filter,$name){
                if(isset($product['options'])){
                    return (
                        count(array_diff($product['options'],$filter))==0 &&
                        $product['name']==$name);
                }
               
             }));
          ?>
       </li>
       <li>
         <h3>Array Map (array_map)</h3>
         <?php 
           $array1 = [
            ['id'=>1,'age'=>28,'name'=>'Aamir','city'=>'Bhopal'],
            ['id'=>2,'age'=>30,'name'=>'Tahir','city'=>'Betul'],
            ['id'=>3,'age'=>25,'name'=>'Azhar','city'=>'Mumbai'],
            ['id'=>4,'age'=>27,'name'=>'Girjesh','city'=>'Bhopal'],
            ['id'=>5,'age'=>23,'name'=>'Ajay','city'=>'Bhopal'],
           ];

            heading('Array of array');
            show($array1);
            heading('Result');
            //extract particular field of array;
            //add extra field;
            //manupulate existing field;
            show(array_map(function($user){
                //$user['class']='First year'; //add extra
                return $user['name']; //extract particular value;
               // $user['age'] =  $user['age']*2; //manupulate
                //return $user;
            },$array1));
         ?>
       </li>

       <li>
         <h3>Search in array (in_array) | array.includes(value)</h3>
         <h3>Unique Array (array_unique) | [...new Set(array)]</h3>
         <h3>Array Difference (array_diff) | use filter</h3>
         <h3>Array Value (array_values) | Object.values(obj)</h3>
         <h3>Array Keys (array_keys ) | Object.keys(obj)</h3>
         <h3>Array Key exist (array_key_exists) | object.hasOwnProperty(key)</h3>
         <h3>Array Search (array_search) | <small> findIndex uses callback function or indexOf </small></h3>

         
       </li>
    </ol>
    
    

</body>
</html>