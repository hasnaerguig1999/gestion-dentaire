<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: *');

  include_once '../../config/Database.php';
  include_once '../../models/randez.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog category object
  $randez = new randez($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  $randez->RDV = $data->RDV;

  $randez_arr = array();

  $result = $randez->checkRDV();

  $num = $result->rowCount();

  // Get post
  if($num > 0){
    // echo $num;
    // die();
    // $i=0;
  while ( $row = $result->fetch(PDO::FETCH_ASSOC)) 
    array_push($randez_arr, $row["CRN"]);

  echo json_encode(
        array('data'=>$randez_arr,'response' => true)
      );
  }
  else{
      echo json_encode(
          array('response' => false)
        );

  }