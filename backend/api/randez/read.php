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

  // Instantiate randez object
  $randez = new randez($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  // echo $data->reff;
  $randez->reff = $data->reff;

  // randez read query
  $result = $randez->read();
  
  
  // Get row count
  $num = $result->rowCount();

  // Check if any randez
  if($num > 0) {
        // Cat array
        $RDV_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $RDV_item = array(
            'id' => $id,
            'CRN' => $CRN,
            'RDV' => $RDV

            // 'name' => $name
          );

          // Push to "data"
          array_push($RDV_arr, $RDV_item);
        }

        // Turn to JSON & output
        echo json_encode($RDV_arr);

  } else {
        // No randez
        echo json_encode(
          array('message' => 'No randez Found')
        );
  }
