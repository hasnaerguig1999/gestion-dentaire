<?php

// Headers 

header('Access-Control-Allow-Origin: *');
header('Content-Type: applecation/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

include_once '../../config/Database.php';
include_once '../../models/clients.php';

// instansiation database

$database = new Database();
$db = $database->connect();

// instansiation de login
$login = new clients($db);

$data = json_decode(file_get_contents("php://input"));

$login->reff = $data->reff;

$row = $login->loginAdmin();
if ($row) {
    echo json_encode(
        array("response" => true)
    );
} else {
    echo json_encode(
        array("response" => false)
    );
}