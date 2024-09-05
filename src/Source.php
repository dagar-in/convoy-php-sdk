<?php

namespace Dagar\Convoy;

class Source
{

    private $url = 'https://api.github.com/users/';

    private $authToken = '';
    private $projectID = '';

    public function __construct($authToken, $projectID ,$url = "", )
    {
        $this->authToken = $authToken;
        $this->projectID = $projectID;
        if ($url) {
            $this->url = $url;
        }
    }

    public function List()
    {

        $url = $this->url . '/api/v1/projects/' . $this->projectID . '/sources';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Get($url, $headers);
    }

    public function Create(string $name)
    {

        $body = [
            "name" => $name,
            "is_disabled" => true,
            "type" => "http",
            "body_function" => null,
            "header_function" => null,
            "custom_response" => [
                "body" => "",
                "content_type" => ""
            ],
            "idempotency_keys" => null,
            "verifier" => [
                "type" => "noop",
                "noop" => []
            ],
            "provider" => ""
        ];

        $url = $this->url . '/api/v1/projects/' . $this->projectID  . '/sources';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Post($url, $headers, $body);
    }
}
