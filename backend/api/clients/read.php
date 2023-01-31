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

  // Blog clients query
  $result = $clients->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any clientss
  if($num > 0) {
    // clients array
    $clients_arr = array();
    // $clientss_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $clients_item = array(
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'proff' => $proff,
        'age' => $age,
        'reff' => $reff,
        'CRN' => $CRN,
        'RDV' => $RDV
      );

      // Push to "data"
      array_push($clients_arr, $clients_item);
      // array_push($clientss_arr['data'], $clients_item);
    }

    // Turn to JSON & output
    echo json_encode($clients_arr);

  } else {
    // No clientss
    echo json_encode(
      array('message' => 'No clients Found')
    );
  }
