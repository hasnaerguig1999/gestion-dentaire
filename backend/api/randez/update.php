<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/randez.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $randez = new randez($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $randez->id = $data->id;
  $randez->CRN= $data->CRN;
  $randez->RDV= $data->RDV;

  // Update post
  if($randez->update()) {
    echo json_encode(
      array('message' => 'randez Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'randez not updated')
    );
  }
