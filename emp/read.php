<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/emp.php';

$database = new Database();
$db = $database->getConnection();
 
$emp = new emp($db);

$emp->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $emp->read();

if($result->num_rows > 0){    
    $empRecords=array();
    $empRecords["emp"]=array(); 
	while ($emp = $result->fetch_assoc()) { 	
        extract($emp); 
        $empDetails=array(
            "id" => $id,
            "email" => $email,
            "phone" => $phone,
			"password" => $password,
            "confirm_password" => $confirm_password,            		
        ); 
       array_push($empRecords["emp"], $empDetails);
    }    
    http_response_code(200);     
    echo json_encode($empRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No Emp found.")
    );
} 