<?php
require_once('facebook-php-sdk-master/src/facebook.php'); 

class Post{
    var $facebook;
    var $mensaje;

    function __construct($mensaje='') {    
        $this->facebook = new Facebook(array(
                'appId' => '309429605865586',
                'secret' => 'afc3d8fc3897bcf3a5c32ffd4cca2fd7',
                'cookie' => false
        ));
        $this->mensaje=$mensaje;
    }

    public function publicarEnFacebook(){
        $req =  array(
                'access_token' => 'eb95bec79eb3374da339c70dadf2f816',
                'message' => $this->mensaje);

        $res = $this->facebook->api('/mihoroscopodiario2/feed', 'POST', $req);
        return $res;
    }
}