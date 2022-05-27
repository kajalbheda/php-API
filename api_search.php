<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// $data=json_decode(file_get_contents("php://input"),true);

// $search_val=$data['search'];

$search_val=isset($_GET['search'])?$_GET['search']:die();

include "database.php";

$sql="SELECT * FROM employee where name LIKE '%{$search_val}%'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'no search found.', 'status'=>false));
}

?>