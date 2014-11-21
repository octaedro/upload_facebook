<?php
require_once('post.php'); 
$mensaje = 'Un wallpaper http://fernandomarichal.com/api/upload_facebook/ben10.jpg';
$un_post = new Post($mensaje);
var_dump($un_post);
$ret = $un_post->publicarEnFacebook();
var_dump($ret);