<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/clients.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $clients = new clients($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $clients->id = $data->id;

  $clients->firstname = $data->firstname;
  $clients->lastname = $data->lastname;
  $clients->proff = $data->proff;
  $clients->age = $data->age;
  $clients->age = $data->age;

  // Update post
  if($clients->update()) {
    echo json_encode(
      array('message' => 'clients Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'clients Not Updated')
    );
  }

