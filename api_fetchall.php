<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "database.php";

$sql="SELECT * FROM employee";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'no records fount.', 'status'=>false));
}

?>