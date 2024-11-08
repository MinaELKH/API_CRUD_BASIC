<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == 'PUT') {
   $inputData=json_decode(file_get_contents("php://input") ,  true);
     if(empty($inputData)) {
      $updateEtudiant =  UpdateEtudiant($_POST , $_GET);    
       } else {
        $updateEtudiant =  UpdateEtudiant($inputData , $_GET);
       }
       echo    $updateEtudiant;
} else {
   $data = [
    'status' => 405,
    'message' => $requestMethod . ' Method  not Allowed , You need to use the PUT method.'
   ];
   header('HTTP/1.0 405 Method Not Allowed');
   echo json_encode($data);
}
?>
