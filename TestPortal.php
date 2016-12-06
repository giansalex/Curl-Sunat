<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 17/11/2016
 * Time: 11:46 AM
 */
require_once 'vendor/autoload.php';
require_once 'Portal.php';

use Sunat\Portal;
$portal = new Portal();
echo "Starting...<br/>";
$portal->Run();
