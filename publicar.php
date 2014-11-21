<?php
//
require_once('post.php'); 
$secret = $_GET['secret'];
$token = $_GET['token'];
$mensaje = 'Un wallpaper http://fernandomarichal.com/api/upload_facebook/ben10.jpg';
$un_post = new Post($secret,$mensaje);
//var_dump($un_post);
$ret = $un_post->publicarEnFacebook();
var_dump($ret);