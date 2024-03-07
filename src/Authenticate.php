<?php

class Authenticate
{
        public function __construct(private User $user)
    {
    }


    public function authenticateAccessToken(): bool
    {
        if (!preg_match("/^Bearer\s+(.*)$/", $_SERVER["HTTP_AUTHORIZATION"], $matches)) {
            http_response_code(400);
            echo json_encode(["message" => "incomplete authorization header"]);
            return false;
        }

        $plain_text = base64_decode($matches[1], true);

        if ($plain_text === false) {

            http_response_code(400);
            echo json_encode(["message" => "invalid authorization header"]);
            return false;
        }

        $data = json_decode($plain_text, true);

    

        if ($data === null) {

            http_response_code(400);
            echo json_encode(["message" => "invalid JSON"]);
            return false;
        }

        return true;
    }
 

}
