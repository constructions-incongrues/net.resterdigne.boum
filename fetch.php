<?php
require_once(__DIR__.'/vendor/autoload.php');

use FilippoToso\QwantUnofficialAPI\Client as QwantClient;

// Create the client
$client = new QwantClient('en_US');

// Get a list of suggested searches
$results = $client->images('castaner');
var_dump($results);
