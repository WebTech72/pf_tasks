<?php
header('Content-Type: applicaton/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// this json_decode() will convert the incoming json format data into arry that will be used in sql command in lower

$data = json_decode(file_get_contents ("php://input"), true);
$specific_id = $data['sid'];
include "config.php";
$sql=  "DELETE FROM items WHERE id = {$specific_id}";


if(mysqli_query($conn, $sql) ) {


echo json_encode(array ('message' => 'Record Deleted Successfully!', 'Status' => true));


}
else{
    echo json_encode(array ('message' => 'Sorry! Record not deleted', 'Status' => False));
}
?>