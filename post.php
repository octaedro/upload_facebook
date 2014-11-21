<?php
require_once('facebook-php-sdk-master/src/facebook.php'); 

class Post{
    var $facebook;
    var $mensaje;

    function __construct($mensaje='') {    
        $this->facebook = new Facebook(array(
                'appId' => '1580335795522369',
                'secret' => 'be0c5019405583e17d8d0e9fe7c495ed',
                'cookie' => false
        ));
        $this->mensaje=$mensaje;
    }

    public function publicarEnFacebook(){
        $req =  array(
                'access_token' => 'e414c7ecee6cc9f6f1f3ad6b7b67fdad',
                'message' => $this->mensaje);

        $res = $this->facebook->api('/Juegos-de-Ben10/359335437580378/feed', 'POST', $req);
        return $res;
    }
}