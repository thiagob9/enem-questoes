<?php
require_once "../config.php";
header("Content-Type: application/json");

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $subject = null;
        $year = null;
        $amount = 181;
        if(isset($_GET['subject'])){
            $subject = $_GET['subject'];
        }

        if(isset($_GET['year'])){
            $year = $_GET['year'];
        }

        if(isset($_GET['amount'])){
            $amount = $_GET['amount'];
        }

        $response = JsonHandler::GetQuery($amount, $subject, $year);
        ResponseHandler::Send(200, 'OK - Success', $response);
    break;
    default:
        ResponseHandler::Send(400, 'Invalid Method', null);
    break;
}