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

$array = $portal->Login("ruc","user","password");
$urlfinal= $array[0];

//abrira el portal sunat sin necesidad de hacer login
echo $urlfinal;
//header("Location: " . $urlfinal);