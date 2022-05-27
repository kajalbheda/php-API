<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');

$data=json_decode(file_get_contents("php://input"),true);

$emp_name=$data['ename'];
$emp_email=$data['eemail'];
$emp_age=$data['eage'];
$emp_desig=$data['edesignation'];

include "database.php";

$sql="INSERT INTO employee (name, email, age, designation) VALUES ('{$emp_name}', '{$emp_email}', '{$emp_age}', '{$emp_desig}');";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Emploee record inserted.', 'status'=>true));
}
else{
    echo json_encode(array('message'=>'Emploee record Not inserted.', 'status'=>false));
}

?>