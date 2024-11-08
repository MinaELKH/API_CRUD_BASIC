<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
//include(function.php);
include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
  
   $etudiant = getEtudiantByID( $getId );
   echo json_encode($etudiant); // Utilisation de json_encode pour retourner un tableau au format JSON
} else {
   $data = [
    'status' => 405,
    'message' => $requestMethod . ' Method not Allowed  you need to use GET METHOD'
   ];
   header('HTTP/1.0 405 Method Not Allowed');
   echo json_encode($data);
}
?>
