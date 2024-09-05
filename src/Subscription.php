<?php

namespace Dagar\Convoy;

class Subscription {
   

    private $url = 'https://api.github.com/users/';

    private $authToken = '';
    private $projectID = 'your_project_id';

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

        $url = $this->url . '/api/v1/projects/' . $this->projectID . '/subscriptions';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Get($url, $headers);
    }

    public function Create( string $name,string $source_id ,string $endpoint_id  )
    {

        $body = [
            "name" => $name,
            "source_id" =>  $source_id,
            "endpoint_id" => $endpoint_id ,
            "function" => null,
            "filter_config" => [
                "event_types" => ["*"],
                "filter" => [
                    "headers" => null,
                    "body" => null
                ]
            ]
        ];

        $url = $this->url . '/api/v1/projects/' . $this->projectID . '/subscriptions';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Post($url, $headers, $body);
    }
}