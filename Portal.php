<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 17/11/2016
 * Time: 10:49 AM
 */

namespace Sunat;

use GuzzleHttp\Client;

class Portal
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(['cookies' => true]);
    }

    public function Login($ruc, $user, $pass)
    {
        $resp = $this->client->request('POST', 'https://api-seguridad.sunat.gob.pe/v1/clientessol/4f3b88b3-d9d6-402a-b85d-6a0bc857746a/oauth2/j_security_check', [
            'form_params' => [
                'tipo' => 2,
                'dni' => "",
                'custom_ruc' => $ruc,
                'j_username' => $user,
                'j_password' => $pass,
                'captcha' => '',
                'originalUrl' => 'https://e-menu.sunat.gob.pe/cl-ti-itmenu/AutenticaMenuInternet.htm',
                'state' => 'rO0ABXNyABFqYXZhLnV0aWwuSGFzaE1hcAUH2sHDFmDRAwACRgAKbG9hZEZhY3RvckkACXRocmVzaG9sZHhwP0AAAAAAAAx3CAAAABAAAAADdAAEZXhlY3B0AAZwYXJhbXN0AEsqJiomL2NsLXRpLWl0bWVudS9NZW51SW50ZXJuZXQuaHRtJmI2NGQyNmE4YjVhZjA5MTkyM2IyM2I2NDA3YTFjMWRiNDFlNzMzYTZ0AANleGVweA=='
            ],
            'verify' => false, // Not Certificate Validate
            'allow_redirects' => false,

        ]);

        $location = $resp->getHeaders()['Location'][0];
        $cookieJar = $this->client->getConfig('cookies');
        $cookieArray = $cookieJar->toArray();
        return array($location, $cookieArray);
    }

}
