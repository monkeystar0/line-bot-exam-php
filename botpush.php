<?php



require "vendor/autoload.php";

$access_token = 'TZmVYh0Qhgcz5j3l+ObQL5wZBIokzhzyQ5m9+1OMI2Z/qrXqINozYwQhNvW0Lb/YA4i6x330LfWiTaQPiTT2a+KESHwoINU8h368g+NKQeFMFdq1rlICFBb5kgmIfgeS3nM+2h5Y6+mjkiGl6b3NCwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd9c965b73b66268d124bd5a587311fed';

$pushID = 'U93897309b140d46cb5c59ab439427cd9';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('15 พฤศจิกายน 62	Almond Pretzel	มูลค่า 46บาท	Auntie Anne’s บน GrabFood');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







