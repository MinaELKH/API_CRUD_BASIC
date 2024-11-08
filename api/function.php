<?php
 require_once("../includ/dbconnect.php");
  global $conn ; 

  /**
   *             cette fonction permet l affichage de tous les etudiants depuis une base de données
   *                                 et renvoie les résultats au format JSON
   */
 function GetEtudiantList() {
  global $conn;
    $query = "SELECT * FROM etudiant";
    $query_run = mysqli_query($conn, $query);

  if ($query_run) {
     if (mysqli_num_rows($query_run) > 0) {

        $res = mysqli_fetch_all($query_run , MYSQLI_ASSOC);
        $data = [
            'status' => 200,
            'message' => "liste des etudiants",
            "listetudiant"=> $res, 
           ];
           header("HTTP/1.0 200  Found request");
           echo json_encode($data) ;
     }
     else {
    $data = [
        'status' => 404,
        'message' => " NO Found request",
       ];
    header("HTTP/1.0 404  NO Found request");
    echo json_encode($data) ;
     }
 } else {   
    $data = [
        'status' => 500,
        'message' => " Internal Server Error",
       ];
    header("HTTP/1.0 500 Internal Server Error");
    echo json_encode($data) ;
 }

}

  /**
   *             cette fonction permet l'insertion d'un  etudiant a la base de donnee 
   */
function CreateEtudiant($inputsEtudiant) { 
    global $conn ; 
    $name= mysqli_real_escape_string($conn  , $inputsEtudiant['name'] );
    $age= mysqli_real_escape_string($conn  , $inputsEtudiant['age'] );
    
   if (!empty($age) || !empty($name)) {
    $query = "INSERT INTO etudiant (name, age) VALUES ('$name', '$age')";
        $query_run = mysqli_query($conn , $query);
            if ($query_run){
                $data = [
                    'status'=> 201,
                    'message'=> 'l etudiant est insere',
                ] ;
                header("HTTP/1.0 201 created") ;
                return  json_encode($data) ;
                }  
            else {  
                $data = [
                    'status'=> 500,
                    'message'=> 'l etudiant pas insere',
                ] ;
                header("HTTP/1.0 500 created") ;
                return  json_encode($data) ;}
    } else {
        $data = [
            "status"=> 422,
            "message"=> "Remplissez les champs",
        ] ;
        header("HTTP/1.0 422 Unprocessable Entity");
        return  json_encode($data) ;
    }
}
   /**
   *             cette fonction permet la modification d'un etudiant
   */
function UpdateEtudiant($inputsEtudiant , $inputId) { 
    global $conn ; 


    if (!empty($inputId))  { 
        $id = mysqli_real_escape_string($conn, $inputId['id']);
        $name = mysqli_real_escape_string($conn, $inputsEtudiant['name']);
        $age = mysqli_real_escape_string($conn, $inputsEtudiant['age']);
 
   
    if (!empty($age) ||!empty($name)) {
        $query = "UPDATE etudiant SET name = '$name', age = '$age' WHERE id = '$id'";

            $query_run = mysqli_query($conn , $query);
                if ($query_run){

                    $data = [
                        'status'=> 201,
                        'message'=> 'l etudiant est modifie',
                    ] ;
                    header("HTTP/1.0 201 created") ;
                    return  json_encode($data) ;

                    }  
                else {  
                    $data = [
                        'status'=> 500,
                        'message'=> 'l etudiant  pas modifie',
                    ] ;
                    header("HTTP/1.0 500  created") ;
                    return  json_encode($data) ;}
        } else {
            $data = [
                "status"=> 422,
                "message"=> "Remplissez les champs",
            ] ;
            header("HTTP/1.0 422 Unprocessable Entity");
            return  json_encode($data) ;

        }
    }
    else {
        $data = [
            "status"=> 422,
            "message"=> "choississez un ID ",
        ] ;
        header("HTTP/1.0 422 Unprocessable Entity");
        return  json_encode($data) ;


         }

}
    /**
   *             cette fonction permet l'affichage d'un etudiant 
   */

function GetEtudiantByID($getId){
    global $conn;
    $id = $_GET["id"];
    if (!empty($id))    {
        $id = mysqli_real_escape_string($conn, $id);
        $query = "select * from etudiant where id = '$id'";
        $query_run = mysqli_query($conn , $query);
        if ($query_run){
            $res = mysqli_fetch_all($query_run , MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => "l'etudiants",
                "listetudiant"=> $res, 
               ];
               header("HTTP/1.0 200  success request");
               echo json_encode($data) ;
         } else {
            $data = ["status"=> 500,"message"=> "ERROR Request SQL", ] ;
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data) ;
         }
   }else{ 
    $data = [
        "status" => 422,
        "message"=> "ID  not found in URL",
    ] ;
    header("HTTP/1.0 422 Unprosessable Entity") ;   
    return json_encode($data) ;
    }
}
    /**
   *             cette fonction permet la supprission d'un etudiant 
   */
function DeleteEtudiant($getId){   
    global $conn;
    $id = $_GET["id"];

    if (!empty($id)) {

        $id = mysqli_real_escape_string($conn, $id);
        $query = "DELETE from etudiant where id ='$id'";
        $query_run = mysqli_query($conn , $query);
            if ($query_run){
                $data= ["status"=> 204,"message"=> "Etudiant est supprime", ] ;
                header("HTTP/1.0 204 ");   
                return json_encode($data) ;
            }else{
                $data = ["status"=> 500,"message"=> "ERROR Request SQL" ] ;
                header("HTPP/1.0 500  Internal Server Error");
                return json_encode($data) ;
            }
    }else {
        $data = ["status"=> 422,"message"=> "ID not found"] ;
        header("HTTP/1.0 422 Unprosessable Entity") ;   
        return json_encode($data) ;
    }
}
?>