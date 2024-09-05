<?php

namespace Dagar\Convoy;

class Api
{
   
    private $url = 'https://api.github.com/users/';

    private $authToken = '';

    public function __construct($authToken, $url = "")
    {
        $this->authToken = $authToken;
        if ($url) {
            $this->url = $url;
        }
    }

    public function Project(string $projectID = "") {
        $instance = new Project($this->authToken, $this->url);
        if ($projectID) {
            $instance->SelectProject($projectID);
        }
        return $instance;
    }
}