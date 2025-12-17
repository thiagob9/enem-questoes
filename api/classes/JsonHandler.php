<?php

class JsonHandler{
    public function __construct() {
    }

    public static function Read($path){
        if(!file_exists($path)){
            ResponseHandler::Send(404, "The path doesn't exist", null);
        }

        $data = json_decode(file_get_contents($path), true);

        return $data ? $data : null;
    }

    public static function GetQuery($amount, $subject = null, $year = null){
        if(!intval($amount) || intval($amount) < MIN_QUESTION){
            ResponseHandler::Send(400, 'Invalid Amount');
        }

        if($subject && !in_array($subject, SUBJECTS)){
            ResponseHandler::Send(400, 'Invalid Subject');
        }

        if(($year && !intval($year)) || 
            intval($year) < MIN_YEAR || 
            intval($year) > MAX_YEAR){
            ResponseHandler::Send(400, 'Invalid Year');
        }

        $response = [];

        if($subject && $year){
            $path = BASE_URL_QUESTIONS . $year . "/questions/" . $subject . "/";
            $questions = JsonHandler::ShowDirs($path);
            $amountQuestions = count($questions);
            if($amountQuestions < $amount){
                $amount = $amountQuestions;
            }

            $chosensIndex = [];
            for($i = 1; $i < $amount; $i++){
                do{
                    $index = random_int(0, $amountQuestions-1);
                }while(in_array($index, $chosensIndex));
                
                array_push($chosensIndex, $index);

                array_push($response, JsonHandler::Read($path . $questions[$index]."/details.json"));
            }
        }

        return $response;
    }

    static private function ShowDirs($path){
        if(preg_match("/windows/i", php_uname("s"), $matchs)){
            exec("cd {$path} & dir /a:d", $output);
            return $output;
        }
        exec("cd {$path} && ls -d */", $output);
        return $output;
    }
}