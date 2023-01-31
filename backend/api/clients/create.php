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
include_once '../../models/clients.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog clients object
$clients = new clients($db);

// Get raw clientsed data
$data = json_decode(file_get_contents("php://input"));

$clients->firstname = $data->firstname;
$clients->lastname = $data->lastname;
$clients->proff = $data->proff;
$clients->age = $data->age;
$clients->reff = $data->reff;




// Create clients
if ($clients->create()) {
  echo json_encode(
    array('message' => 'Client created', 'response' => true)
  );
} else {
  echo json_encode(
    array('message' => 'Client not created', 'response' => false)
  );
}
