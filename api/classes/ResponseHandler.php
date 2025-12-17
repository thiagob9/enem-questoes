<?php

class ResponseHandler{
    static $Boilerplate = array(
        "status" => null,
        "message" => null,
        "data" => null
    );

    public static function Send($statusCode, $message, $data = null){
        
        if(!intval($statusCode)){
           throw new Error("Status code Invalid");
        }

        http_response_code($statusCode);

        $Boilerplate['status'] = $statusCode;
        $Boilerplate['message'] = $message;
        $Boilerplate['data'] = $data;
        
        die(json_encode($Boilerplate));
    }
}