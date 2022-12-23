<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/emp.php';
 
$database = new Database();
$db = $database->getConnection();
 
$emp = new emp($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->email) && !empty($phone) &&
!empty($data->password) && !empty($confirm_password) && !empty($id)
&& !empty($fname) && !empty($lname) && !empty($role)){    

    $emp->email = $data->email;
    $emp->phone = $data->phone;
    $emp->password = $data->password;
    $emp->confirm_password = $data->confirm_password;
    $emp->fname = $data->fname;	
    $emp->lname = $data->lname;	
    $emp->role = $data->role;		
    
    if($emp->create()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Emp was created."));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to create Emp."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to create Emp. Data is incomplete."));
}
?>