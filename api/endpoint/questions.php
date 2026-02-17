<?php
require_once "../config.php";
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    $request_body = json_decode(file_get_contents("php://input"), true);

    if ($r = validate_body($request_body, ['year', 'subject', 'already_done'])) ResponseHandler::Send(400, "Bad Request: atribute {$r} is required");


    ResponseHandler::Send(200, "OK - SUCCESS", JsonHandler::GetQuery($request_body));
    break;
  default:
    ResponseHandler::Send(400, 'Invalid Method', null);
    break;
}

