<?php
header('Content-Type: applicaton/json');
header('Acess-Control-Allow-Origin: *');

include "config.php";

$sql=  "SELECT * FROM items";
$result = mysqli_query($conn, $sql) 
or
die("SQL query failed!");

if(mysqli_num_rows($result) > 0) {

// combine associative arry conversion  for json format

$output=mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($output);

}
else{
    echo json_encode(array ('message' => 'No Record Found', 'Status' => False));
}
?>