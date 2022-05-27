<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');

$data=json_decode(file_get_contents("php://input"),true);

$emp_id=$data['eid'];

include "database.php";

$sql="DELETE FROM employee where id={$emp_id}";


if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Employee Deleted Successfully!.', 'status'=>true));

}
else{
    echo json_encode(array('message'=>'Employess not deleted Successfully!', 'status'=>false));
}

?>