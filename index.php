<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 17/11/2016
 * Time: 08:49 AM
 */
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://httpbin.org',
    // You can set any number of default request options.
    'timeout'  => 2.0,
    'cookies' => true
]);

$response = $client->get('ip');
//header('Content-Type: application/json');
//echo $response->getBody();
echo $response->getHeader('Content-Length')[0];