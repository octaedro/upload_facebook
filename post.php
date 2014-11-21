<?php
require_once('facebook-php-sdk-master/src/facebook.php'); 

class Post{
    var $facebook;
    var $mensaje;

    function __construct($mensaje='') {    
        $this->facebook = new Facebook(array(
                'appId' => '746062735448615',
                'secret' => '2af9092b09fe697e006cbbbd965c202d',
                'cookie' => false
        ));
        $this->mensaje=$mensaje;
    }

    public function publicarEnFacebook(){
        $req =  array(
                'access_token' => 'e15a5de77332a2b7e0497f97a40e0199',
                'message' => $this->mensaje);

        $res = $this->facebook->api('/359335437580378/feed', 'POST', $req);
        return $res;
    }
}