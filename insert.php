<?php
header('Content-Type: applicaton/json');
header('Access-Control-Allow-Origin: *');

// method pass 

header('Access-Control-Allow-Methods: POST');

// security prpose method permissions

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// this json_decode() will convert the incoming json format data into arry that will be used in sql command in lower

$data = json_decode(file_get_contents ("php://input"), true);
 $name = $data['sname'];
$quantity = $data['squantity'];
$category = $data['scategory'];
$price = $data['sprice'];

include "config.php";

$sql=  "INSERT INTO items ( name, quantity, category, price) 
        VALUES ('{$name }', {$quantity}, '{$category}', '{$price}')";


if(mysqli_query($conn, $sql) ) {


        echo json_encode(array ('message' => 'Record Inserted Successfully!', 'Status' => true));

}

else{
        echo json_encode(array ('message' => 'Record not inserted', 'Status' => False));
    }
?>