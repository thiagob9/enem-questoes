<?php
require_once "../config.php";
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

switch ($_SERVER['REQUEST_METHOD']) {
  case "GET":
    $response = array(
      "subjects" => [...SUBJECTS],
      "years" => []
    );

    for ($i = MIN_YEAR; $i <= MAX_YEAR; $i++) {
      array_push($response['years'], $i);
    }

    ResponseHandler::Send(200, "OK - SUCCESS", $response);
    break;
  default:
    ResponseHandler::Send(400, "Invalid Method: {$_SERVER['REQUEST_METHOD']}");
    break;
}
