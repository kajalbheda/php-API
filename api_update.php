<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');

$data=json_decode(file_get_contents("php://input"),true);

$emp_id=$data['eid'];
$emp_name=$data['ename'];
$emp_email=$data['eemail'];
$emp_age=$data['eage'];
$emp_desig=$data['edesignation'];

include "database.php";

echo $sql="UPDATE employee SET name='{$emp_name}', email='{$emp_email}',age='{$emp_age}', designation='{$emp_desig}' WHERE id='{$emp_id}'";



if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Emploee record Updated.', 'status'=>true));
}
else{
    echo json_encode(array('message'=>'Emploee record Not Updated.', 'status'=>false));
}

?>