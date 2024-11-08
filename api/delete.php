<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == 'DELETE') { 
        $DeleteEtudiant =  DeleteEtudiant($_GET);
        echo    $DeleteEtudiant;
} else {
   $data = [
    'status' => 405,
    'message' => $requestMethod . ' Method  not Allowed , You need to use the DELETE method.'
   ];
   header('HTTP/1.0 405 Method Not Allowed');
   echo json_encode($data);
}
?>
