<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dagar\Convoy\Api;

$authToken = 'CO.yjkKPKAa4FYGJNqo.81uZ3tWu7cLHv6twgkNFZKWmnyCMfa4b7i58Z48FVJTX0WGR9mNfX878Ps1BsoHm';
$url = "https://api.convoy.com";
$orgID = "01J6Y7JN7JEAE8X94RW4W5SDPE";
$projectId = "01J6Y8RZAKBAH4D2Y8CQP6305G";

$api = new Api($authToken, $url);

// $resp = $api->Project()->Create('project_name', $orgID);
// print_r($resp);
$resp = $api->Project()->List($orgID);
print_r($resp);
$resp = $api->Project($projectId)->Source()->List();
print_r($resp);
// $resp = $api->Project($projectId)->Source()->Create('source_name');
// print_r($resp);
$resp = $api->Project($projectId)->Endpoint()->List();
print_r($resp);
// $resp = $api->Project($projectId)->Endpoint()->Create('webhook', "https://webhook.site/");
// print_r($resp);
$resp = $api->Project($projectId)->Subscription()->List();
print_r($resp);
$resp = $api->Project($projectId)->Subscription()->Create('test', '01J6Y8RZAKBAH4D2Y8CQP6305G', '01J6Y8RZAKBAH4D2Y8CQP6305G');
print_r($resp);
