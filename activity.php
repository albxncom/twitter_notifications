<?php
include 'simple_html_dom.php';
$ch = curl_init();
$sTarget = "https://mobile.twitter.com/i/connect";
curl_setopt($ch, CURLOPT_URL, $sTarget);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookiejar.txt");
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookiejar.txt');
curl_setopt($ch, CURLOPT_REFERER, "https://twitter.com/");
$html = str_get_html(curl_exec($ch));

$tweets = $html->find("div.timeline table");

for($i=0;$i<5;$i++){
	$tweet = $tweets[$i];
	$patt = array(
		0=>"/\s+/",
		1=>"/@ .*/"
	);
	$repl = array(
		0=>" ",
		1=>""
	);

	//tweet header (who, did what)
	$tweetheader = trim(preg_replace($patt, $repl, $tweet->find(".user-info")[0]->plaintext));
	
	echo "\e[0;34m\e[1m".$tweetheader."\e[0m";

 	echo "\n";

 	//tweet content 
	echo trim(preg_replace("/\s+/", " ", $tweet->find(".tweet-container")[0]->plaintext));

	echo "\n\n";
}
?>