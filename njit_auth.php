<?php

//Form Variables
$username = $_POST['username'];
$password = $_POST['password'];
$uu_id = "0xACA021";
$url = "https://cp4.njit.edu/cp/home/login";
$postdata = "user=".$username."pass=".$password."uuid=".$uu_id; 
$cookie="cookie.txt"; 

$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
curl_setopt ($ch, CURLOPT_REFERER, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query(array(
"user" => $username,
"pass" => $password,
"uuid" => "0xACA021"
))); 
curl_setopt ($ch, CURLOPT_POST, 1); 
$result = curl_exec ($ch); 

$pos = strpos($result, "loginok.html");

if ($pos === false)
{
	echo "authentication failure!";
}
else
{
	echo "authentication sucess! <br /><br /> token at position $pos";
}

curl_close($ch);

?>
<br /><br /><a href="http://127.0.0.1/login_system/login.html">Back to login</a>
