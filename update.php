<?php
header('Content-Type: applicaton/json');
header('Access-Control-Allow-Origin: *');

// method pass 

header('Access-Control-Allow-Methods: PUT');

// security prpose method permissions

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// this json_decode() will convert the incoming json format data into arry that will be used in sql command in lower

$data = json_decode(file_get_contents ("php://input"), true);

    $id = $data['sid'];
    $name = $data['sname'];
    $quantity = $data['squantity'];
    $category = $data['scategory'];
    $price = $data['sprice'];

include "config.php";

$sql=  "UPDATE items SET 
        name = '{$name }', 
        quantity = '{$quantity}', 
        category = '{$category}',
        price = '{$price}'
        WHERE id = {$id}";

if(mysqli_query($conn, $sql)) {


        echo json_encode(array ('message' => 'Record Updated Successfully!', 'Status' => true));

}

else{
        echo json_encode(array ('message' => 'Record not Updated', 'Status' => False));
    }
?>