<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 06/12/2016
 * Time: 04:10 PM
 */
//Mejor curl Lib Object
require_once 'vendor/autoload.php';
include "LoginPortal.php";

use Sunat\Auth\LoginPortal;

$cl = new LoginPortal();
$cl->Login("<user-sol>","<pass>");
