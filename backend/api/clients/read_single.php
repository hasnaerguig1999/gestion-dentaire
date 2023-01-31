<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/clients.php';

  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog clients object
  $clients = new clients($db);

  // Get ID
  $clients->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get clients
  $clients->read_single();

 
  // Create array
  $clients_arr = array(
      'id' => $clients->id,
      'firstname' =>$clients->firstname,
      'lastname' => $clients->lastname,
      'proff' => $clients->proff,
      'age' => $clients->age,
      'reff' => $clients->reff,
      'CRN' => $clients->CRN,
      'RDV' => $clients->RDV
  );

  // Make JSON
  print_r(json_encode($clients_arr));