<?php
require_once('facebook-php-sdk-master/src/facebook.php'); 
//
class Post{
    var $facebook;
    var $mensaje;

    function __construct($secret,$mensaje='') {    
        $this->facebook = new Facebook(array(
                'appId' => '746062735448615',
                'secret' => $secret,
                'cookie' => false
        ));
        $this->mensaje=$mensaje;
    }

    public function publicarEnFacebook($token){
        $req =  array(
                'access_token' => $token,
                'message' => $this->mensaje);

        $res = $this->facebook->api('/359335437580378/feed', 'POST', $req);
        return $res;
    }
}