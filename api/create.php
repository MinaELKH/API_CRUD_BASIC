<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "POST") {
   $inputData=json_decode(file_get_contents("php://input") , true);
       if(empty($inputData)) {
                   $createEtudiant =  CreateEtudiant($_POST);
       } else {
                 $createEtudiant =  CreateEtudiant($inputData);
       }
       echo $createEtudiant;

  
} else {
   $data = [
    'status' => 405,
    'message' => $requestMethod . ' Method  not Allowed , You need to use the POST method.'
   ];
   header('HTTP/1.0 405 Method Not Allowed');
   echo json_encode($data);
}
?>
