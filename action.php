<?php

if( isset($_GET['id']) ) {
  get_persons($_GET['id']);
} else {
  die("Solicitud no válida.");
}

function get_persons( $id ) {
 
  //Cambia por los detalles de tu base datos
  $dbserver = "localhost";
  $dbuser   = "root";
  $password = "";
  $dbname   = "bdp";
 
  $database = new mysqli($dbserver, $dbuser, $password, $dbname);

  if($database->connect_errno) {
    die("No se pudo conectar a la base de datos");
  }

  $jsondata = array();
 
  
    $jsondata["success"] = false;
    $jsondata["data"] = array(
       'message' => 'No se encontró ningún resultado.'
    );
 
  header('Content-type: application/json; charset=utf-8');
  echo json_encode($jsondata, JSON_FORCE_OBJECT);
 
  $database->close();
 
}

exit();

?>