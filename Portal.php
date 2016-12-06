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

    public function Run(){
        $this->Login("20100451931AZABRGAB", "3Q13CzHfP");
    }

    private function Login($user, $pass){
        //$this->client->post("https://e-menu.sunat.gob.pe/cl-ti-itmenu/AutenticaMenuInternet.htm", );
        $resp = $this->client->request('POST', 'https://e-menu.sunat.gob.pe/cl-ti-itmenu/AutenticaMenuInternet.htm', [
            'form_params' => [
                'username' => $user,
                'password' => $pass,
                'captcha' => '',
                'params' => urlencode('*&*&/cl-ti-itmenu/MenuInternet.htm&b64d26a8b5af091923b23b6407a1c1db41e733a6'),
                'exe' => ''
            ],
            'verify' => false, // Not Certificate Validate
            'allow_redirects' => false,
            'headers' => [
                'User-Agent' => 'testing/1.0'
            ]
        ]);
        //echo urlencode('*&*&/cl-ti-itmenu/MenuInternet.htm&b64d26a8b5af091923b23b6407a1c1db41e733a6');
        echo $resp->getBody();
        //var_dump($resp->getHeaders());
      /*  foreach ($resp->getHeaders() as $head){
            $val = $resp->getHeader($head);
            echo "$head : ";
            var_dump($val);
        }*/
    }
}