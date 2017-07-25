<?php
$access_token = 'eLygcjtgV5BdGQz9TH0NQIhlAmpw2PADLDaGZBqB/dmijA15WLFoDtCTPphR5K2miCNXHDUuf/l2KhaMxpFpADYl9xucIaOe8HMdY+z9ZW8622MTp8x1zBRxr1hInGh/QBgDdiDvYFjlmqmj6ktG2gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
