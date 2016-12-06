<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 06/12/2016
 * Time: 04:03 PM
 */

namespace Sunat\Auth;
use Curl\Curl;

class LoginPortal
{
    private $urlAuth = "https://e-menu.sunat.gob.pe/cl-ti-itmenu/AutenticaMenuInternet.htm";
    public function Login($user, $password){
        $curl = new Curl();
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, false);
        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curl->setOpt(CURLOPT_HEADER, true);
        $curl->post($this->urlAuth,
            [
                'username' => $user,
                'password' => $password,
                'captcha' => '',
                'params' => "*&*&/cl-ti-itmenu/MenuInternet.htm&b64d26a8b5af091923b23b6407a1c1db41e733a6",
                'exe' => ''
            ]
        );
        if($curl->error){
            echo "Error : " . $curl->errorCode . " - " . $curl->errorMessage;
            return;
        }
        $location = $curl->responseHeaders['Location'];
        if($location != null) {
            //$curl->getResponseCookie('ITMENUSESSION')
            //var_dump($curl->responseCookies);
            $this->ToHome($location, $curl->responseCookies);
        }
        //var_dump($curl->response);
        //echo $curl->response;
    }

    private function ToHome($url, $cooks){
        $curl = new Curl();
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, false);
        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        //$curl->setOpt(CURLOPT_HEADER, true);
        foreach ($cooks as $key => $value){
            $curl->setCookie($key, $value);
        }
        $curl->get($url);
        if($curl->error){
            echo "Error : " . $curl->errorCode . " - " . $curl->errorMessage;
            return;
        }
        echo($curl->response);
    }
}