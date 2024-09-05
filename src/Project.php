<?php

namespace Dagar\Convoy;

class Project
{

    private $url = 'https://api.github.com/users/';

    private $authToken = '';

    private $projectID = 'your_project_id';

    public function __construct(string  $authToken, string $url = "")
    {
        $this->authToken = $authToken;
        if ($url) {
            $this->url = $url;
        }
    }

    public function SelectProject(string $projectID)
    {
        $this->projectID = $projectID;

        return $this;
    }

    public function Source()
    {
        return new Source($this->authToken, $this->projectID, $this->url);
    }

    public function Endpoint()
    {
        return new Endpoint($this->authToken,$this->projectID, $this->url);
    }

    public function Subscription()
    {
        return new Subscription($this->authToken, $this->projectID, $this->url);
    }

    public function List(string $orgID) {

        $url = $this->url . '/ui/organisations/'. $orgID .'/projects';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Get($url, $headers);

    }

    public function Create(string $name,  string  $orgID)
    {

        $body = [
            "name" => $name,
            "config" => [
                "strategy" => [
                    "duration" => 3,
                    "retry_count" => 3,
                    "type" => "linear"
                ]
            ],
            "type" => "incoming"
        ];

        $url = $this->url . '/ui/organisations/'. $orgID .'/projects';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Post($url, $headers, $body);
    }
}
