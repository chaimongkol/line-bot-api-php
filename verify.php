<?php
$access_token = 'B5K+LK728NyRrAJhByOZlHCwmiveLxwqs8zXrsZdPeQbXvm609xosboPJqiRzxICbuN1FqqiSnh+Nx4mx4OITNr8bTXIjFGrbB9bUtnCYH8FXpQ3GBoGlylhTNPMHToQ2uTVWLfNBWnYFq6AXzgIpgdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
