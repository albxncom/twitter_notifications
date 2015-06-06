<?php
/* got this from stackoverflow. thanks dude */

$username = "USERNAME";
$password = "PASSWORD";




$ch = curl_init();
$sTarget = "https://twitter.com/";
curl_setopt($ch, CURLOPT_URL, $sTarget);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookiejar.txt");
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookiejar.txt');
curl_setopt($ch, CURLOPT_REFERER, "https://twitter.com/");
$html = curl_exec($ch);
# parse authenticity_token out of html response
preg_match('/<input type="hidden" value="([a-zA-Z0-9]*)" name="authenticity_token"\/>/', $html, $match);
$authenticity_token = $match[1];


# set post data
$sPost = "remember_me=1&session[username_or_email]=$username&session[password]=$password&return_to_ssl=true&scribe_log=&redirect_after_login=%2F&authenticity_token=$authenticity_token";

# second call is a post and performs login
$sTarget = "https://twitter.com/sessions";
curl_setopt($ch, CURLOPT_URL, $sTarget);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $sPost);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
curl_exec($ch);
curl_close($ch);
?>