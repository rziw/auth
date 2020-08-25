<?php
namespace Usecase;

use Firebase\JWT\JWT;

class TokenHandler
{
    private $token;
    private $expiration;

    public function createToken()
    {
        $secret_key = env('APP_JWT_KEY');
        $issuer_claim = "localhost";
        $issue_date_claim = time();
        $not_before_claim = $issue_date_claim + 3; //not before in seconds
        $this->expiration = $issue_date_claim + 900; // expire time in seconds, 15min here
        $payload = array(
            "iss" => $issuer_claim,
            "iat" => $issue_date_claim,
            "nbf" => $not_before_claim,
            "exp" => $this->expiration,
            "data" => array(
                "username" => $_POST['username']
            ));

        http_response_code(200);

        $this->token = JWT::encode($payload, $secret_key);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }
}