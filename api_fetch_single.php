<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data=json_decode(file_get_contents("php://input"),true);

$emp_id=$data['eid'];

include "database.php";

$sql="SELECT * FROM employee where id={$emp_id}";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'no records fount.', 'status'=>false));
}

?>