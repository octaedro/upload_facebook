<?php
$ruta="../../";
//include($ruta.'includes/conexion.php');




require '../src/facebook.php';
/*echo '<div id="waitDiv" style="position:absolute;left:300;top:300;visibility:hidden">
    <table cellpadding="6" cellspacing="0"
border="1" bgcolor="#000000">
        <tr>
            <td align="center">
                <font color="#FFFFFF"
face="Verdana"
size="4">Espere...Conectandose Con Facebook...</font> 
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
var DHTML = (document.getElementById || document.all || document.layers);
function ap_getObj(name) {
if (document.getElementById)
{ return document.getElementById(name).style; }
else if (document.all)
{ return document.all[name].style; }
else if (document.layers)
{ return document.layers[name]; }
}
function ap_showWaitMessage(div,flag) {
if (!DHTML) return;
var x = ap_getObj(div); x.visibility = (flag) ? \'visible\':\'hidden\'
if(! document.getElementById) if(document.layers) x.left=280/2; return true; } ap_showWaitMessage(\'waitDiv\', 5);
</script>';*/
$permisitos = 'email, user_birthday, user_location, publish_stream, friends_birthday,user_likes, publish_actions';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
'appId'  => '746062735448615',
  'secret' => '',
  'channelUrl'=>'http://localhost/freelance/upload_facebook/facebook/examples/example.php',
  'req_perms' => $permisitos
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	 $uid = $facebook->getUser();  
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
	$user = $facebook->getUser();
} else {
  $loginUrl = $facebook->getLoginUrl(array('scope'=>$permisitos,'display'=>'popup'));
}
/*
$friends = $facebook->api("/me/friends?fields=id,name,birthday");
$friends = $facebook->api(array(
    "method"    => "fql.query",
    "query"     => "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())"
));
foreach( $friends as $f ) {
	
echo $f['uid']."-- ".$f['name']."-- </br>";
}
*/




$_SESSION["facebooklogin"]=$user;
//$_SESSION["faceusername"]=$user_profile['username'];
$_SESSION["facetimezone"]=$user_profile['timezone'];
$_SESSION["facename"]=$user_profile['name'];
$_SESSION["faceemail"]=$user_profile['email'];
$fecha = $user_profile['birthday'];
$dato = explode("/", $fecha);  
$Mes=$dato[0]; 
$Dia=$dato[1]; 
$aÃ±o=$dato[2]; 
$fecha=$aÃ±o."-".$Mes."-".$Dia;
$_SESSION["facefechanac"]=$fecha;
if($user_profile['gender']=="male"){
	$_SESSION["facesexo"]="Sr.";
}else{
	$_SESSION["facesexo"]="Sra.";
}



$_SESSION["facelugar"]=$user_profile['hometown']['name'];
$_SESSION["idLogin"]=$_SESSION["facebooklogin"];
	
if(!empty($user)){
	
	

//2do Video
	
}else{
//Conectarse a Facebook
echo "
<script language='JavaScript' type='text/javascript'> 
var pagina='$loginUrl'
function redireccionar() 
{
location.href=pagina
} 
redireccionar();

</script>Redireccionando a Facebook...";	
}

?>