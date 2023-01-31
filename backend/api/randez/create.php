<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  }
  if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") return true;

  include_once '../../config/Database.php';
  include_once '../../models/randez.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $randez = new randez($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $randez->CRN = $data->CRN;
  $randez->RDV = $data->RDV;
  $randez->reff = $data->reff;
  

  // Create randez
  if($randez->create()) {
    echo json_encode(
      array('message' => 'randez vous Created','response'=>true)
    );
  } else {
    echo json_encode(
      array('message' => 'randez vous Not Created' , 'response'=>false)
    );
  }
