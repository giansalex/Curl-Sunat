<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 17/11/2016
 * Time: 09:07 AM
 */
require_once 'vendor/autoload.php';
use Httpful\Request;

$uri = 'https://example.net/person.xml';

$response = Request::get($uri)->send();

echo $response->body;