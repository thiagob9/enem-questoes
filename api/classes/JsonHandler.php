<?php

class JsonHandler{
    public function __construct() {
    }

    private static function Read($path){
        if(!file_exists($path)){
            ResponseHandler::Send(404, "The path doesn't exist", null);
        }

        return json_decode(file_get_contents($path), true);
    }

    public static function GetQuery($request_body){
        $year = intval($request_body['year']);
        $subject = $request_body['subject'];
        $already_done = $request_body['already_done'];
        
        if($year > MAX_YEAR || $year < MIN_YEAR){
            ResponseHandler::Send(400, "Year must be between ".MIN_YEAR." and ".MAX_YEAR, null);
        }

        if(!in_array($subject, SUBJECTS)){
            ResponseHandler::Send(400, "Invalid subject", null);    
        }
        $dir = JsonHandler::ShowDir("../../data/{$year}/questions/{$subject}");
        $dir_len = count($dir);
        // DO ALREADY DONE
        return JsonHandler::Read("../../data/{$year}/questions/{$subject}/{$dir[random_int(0, $dir_len - 1)]}/details.json");
    }

    public static function ShowDir($path){
        if(preg_match("/windows/i", php_uname("s"), $matchs)){
            exec("cd {$path} & dir /a:d", $output);
            return $output;
        }
        exec("cd {$path} && ls -d */", $output);
        return $output;
    }
}