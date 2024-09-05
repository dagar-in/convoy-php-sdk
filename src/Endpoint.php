<?php

namespace Dagar\Convoy;

class Endpoint
{

    private $url = 'https://api.github.com/users/';

    private $authToken = '';
    private $projectID = 'your_project_id';

    public function __construct($authToken, $projectID, $url = "",)
    {
        $this->authToken = $authToken;
        $this->projectID = $projectID;
        if ($url) {
            $this->url = $url;
        }
    }

    public function List()
    {

        $url = $this->url . '/api/v1/projects/' . $this->projectID . '/endpoints';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Get($url, $headers);
    }

    public function Create(string $name, string $destinationUrl, array $options = [])
    {

        $body = [
            "name" => $name,
            "url" => $destinationUrl,
            "support_email" => $options['support_email'] ?? null,
            "slack_webhook_url" => $options['slack_webhook_url'] ?? null,
            "secret" => $options['secret'] ?? null,
            "http_timeout" => $options['http_timeout'] ?? null,
            "description" => $options['description'] ?? null,
            "owner_id" =>  $options['owner_id'] ?? null,
            "rate_limit" =>  $options['rate_limit'] ?? null,
            "rate_limit_duration" => $options['rate_limit_duration'] ?? null,
            "advanced_signatures" => $options['advanced_signatures'] ?? null,
        ];

        $url = $this->url . '/api/v1/projects/' . $this->projectID . '/endpoints';
        $headers = [
            'Authorization: Bearer ' . $this->authToken
        ];

        return HttpClient::Post($url, $headers, $body);
    }
}
