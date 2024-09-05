# Convoy Webhook Platform PHP SDK

The Convoy Webhook Platform PHP SDK is a powerful tool that allows developers to easily integrate Convoy's webhook functionality into their PHP applications. With this SDK, you can effortlessly send and receive webhooks, handle events, and manage subscriptions.

## Features

- **Easy Integration**: The SDK provides a simple and intuitive interface for integrating Convoy's webhook functionality into your PHP applications.

- **Webhook Management**: With the SDK, you can easily send webhooks to external services and receive webhooks from Convoy.

- **Event Handling**: The SDK allows you to handle incoming webhook events and perform custom actions based on the event data.

- **Subscription Management**: You can manage your webhook subscriptions, including creating, updating, and deleting subscriptions.

## Installation

To install the Convoy Webhook Platform PHP SDK, simply run the following command:

```bash
composer require dagar/convoy
```

## Usage

To get started with the SDK, follow these steps:

1. Import the SDK into your PHP file:

```php
require_once 'vendor/autoload.php';
use Dagar\Convoy\Api;
```

2. Initialize the API class:

```php
$authToken = 'CO.yjkKPKAa4FYGJNqo.81uZ3tWu7cLHv6twgkNFZKWmnyCMfa4b7i58Z48FVJTX0WGR9mNfX878Ps1BsoHm';
$url = "https://api.convoy.com";
$orgID = "01J6Y7JN7JEAE8X94RW4W5SDPE";
$projectId = "01J6Y8RZAKBAH4D2Y8CQP6305G";

$api = new Api($authToken, $url);
```

3. Start sending and receiving webhooks:

```php

$resp = $api->Project()->Create('project_name', $orgID);
print_r($resp);

$resp = $api->Project()->List($orgID);
print_r($resp);

$resp = $api->Project($projectId)->Source()->List();
print_r($resp);

$resp = $api->Project($projectId)->Source()->Create('source_name');
print_r($resp);

$resp = $api->Project($projectId)->Endpoint()->List();
print_r($resp);

$resp = $api->Project($projectId)->Endpoint()->Create('webhook', "https://webhook.site/");
print_r($resp);

$resp = $api->Project($projectId)->Subscription()->List();
print_r($resp);

$resp = $api->Project($projectId)->Subscription()->Create('test', '01J6Y8RZAKBAH4D2Y8CQP6305G', '01J6Y8RZAKBAH4D2Y8CQP6305G');
print_r($resp);
```

For more detailed usage instructions and examples, please refer to the [documentation](https://docs.convoy.com/sdk/php).

## Contributing

We welcome contributions from the community! If you have any suggestions, bug reports, or feature requests, please open an issue on our [GitHub repository](https://github.com/convoy/webhook-sdk-php).

## License

This SDK is released under the [MIT License](https://opensource.org/licenses/MIT).
