<?php declare(strict_types=1);

require_once 'vendor/autoload.php';
use \App\CryptoApi;

$client= new CryptoApi();
$cryptoInfo = $client->getInfo();
$display = $client->displayInfo($cryptoInfo);