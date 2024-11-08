<?php
header('Access-Control-Allow-Origin: *');//autorisé à effectuer des requêtes depuis n'importe quel domaine vers votre API
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
   $getEtudiantList = GetEtudiantList();
} else {
   $data = [
    'status' => 405,
    'message' => $requestMethod . ' Method not Allowed'
   ];
   header('HTTP/1.0 405 Method Not Allowed');
   echo json_encode($data);
}

