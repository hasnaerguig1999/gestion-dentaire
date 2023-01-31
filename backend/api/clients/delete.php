<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/clients.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog clients object
  $clients = new clients($db);

  // Get raw clientsed data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to delete
  $clients->id = $_GET['id'];

  // Delete clients
  if($clients->delete()) {
    echo json_encode(
      array('message' => 'client Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'client Not Deleted')
    );
  }

