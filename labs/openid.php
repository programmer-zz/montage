<?php

ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);

//$url = "https://www.google.com/accounts/OAuthGetRequestToken?scope=http%3A%2F%2Fpicasaweb.google.com%2Fdata%2F";

$url = "https://www.google.com/accounts/AuthSubTokenInfo";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);

/**
OAuth Consumer Key:  	 YOUR-DOMAIN.cn
OAuth Consumer Secret: 	0X1PWeXV1aUgaDcuy1KaZ8Yw 

Test your AuthSub registration:
https://www.google.com/accounts/AuthSubRequest?scope=http%3A%2F%2Fwww.google.com%2Fcalendar%2Ffeeds%2F&session=1&secure=0&next=http%3A%2F%2FYOUR-DOMAIN.cn%2Fsksite%2Fcall%2F


*/

//$header = array('Authorization: OAuth oauth_version="1.0", oauth_nonce="f151be9fea311894382ec1fe65c39fc0", oauth_timestamp="1245814595", oauth_consumer_key="YOUR-DOMAIN.cn", oauth_callback="http%3A%2F%2FYOUR-DOMAIN.cn%2Fsksite%2Fcall%2F", oauth_signature_method="RSA-SHA1", oauth_signature="NKSze%2FwJOAddD2Sk%2FS%2BysjICslRJF0UhBtE2i%2FvIni68kgNURqtxOJShvWeWYoHQPy8%2BAaShtgwIaJCR4sni1IIdnktGw%2B%2Bg6vUaqRaGdB%2BlOZjd7uB4kXn2n3mWvUjReJK9%2Fq9PPVvf%2B9YJylwvNgUAsAlIwgdtyZu2sI%2BpFnY%3D"');

$header = array('Authorization: AuthSub token="CMWI5f7rHhCMzuHr-P____8B"');
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

echo $data;

?>
