<?php



require "vendor/autoload.php";
use LINE\LINEBot\MessageBuilder\Flex;
use LINE\LINEBot;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use Firebase\FirebaseLib;
require 'sendMessage.php';

$access_token = 'TZmVYh0Qhgcz5j3l+ObQL5wZBIokzhzyQ5m9+1OMI2Z/qrXqINozYwQhNvW0Lb/YA4i6x330LfWiTaQPiTT2a+KESHwoINU8h368g+NKQeFMFdq1rlICFBb5kgmIfgeS3nM+2h5Y6+mjkiGl6b3NCwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd9c965b73b66268d124bd5a587311fed';

$pushID = 'U93897309b140d46cb5c59ab439427cd9';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('15 พฤศจิกายน 62	Almond Pretzel	มูลค่า 46บาท	Auntie Anne’s บน GrabFood');

// $response = $bot->pushMessage($pushID, $textMessageBuilder);

// echo $response->getHTTPStatus() . ' ' . $response->getRawBody();


const URL = 'https://jupiter-aa7f0.firebaseio.com/';
const TOKEN = 'zz5fK2rMIm9TNZfi6zzSIMAz6uUE8ntDSaNpe5x7';
const PATH = '/stock';

$firebase = new FirebaseLib(URL, TOKEN);

// Reading the stored string
$stockList = $firebase->get(PATH);
$stockListModel = json_decode($stockList, true);
$dateTime = new DateTime();
$timezone = new DateTimeZone('Asia/Bangkok');
$datetime->setTimezone($timezone);
$dateStr = $dateTime->format('Y-m-d H:i:s');

$messageStockBuild = "";

foreach ($stockListModel as $key => $value){
  //echo "$value<br>";
  $messageStockBuild = $messageStockBuild.'
  {
    "contents": [
      {
        "type": "text",
        "color": "#555555",
        "size": "sm",
        "text": "'.$key.'"
      },
      {
        "color": "#111111",
        "align": "end",
        "text": "'.$value.'",
        "size": "md",
        "weight": "bold",
        "type": "text"
      }
    ],
    "layout": "horizontal",
    "type": "box"
  }';
  if ($key != array_key_last($stockListModel)){
    $messageStockBuild = $messageStockBuild.",";
  }
}
//echo $messageStockBuild;
  $flexDataJson = '{
          "altText": "Flex Message",
          "contents": {
            "styles": {
              "footer": {
                "separator": true
              }
            },
            "type": "bubble",
            "body": {
              "contents": [
                {
                  "text": "JUPITER INTELLIGENT AGENT",
                  "weight": "bold",
                  "size": "sm",
                  "color": "#1DB446",
                  "type": "text"
                },
                {
                  "type": "text",
                  "size": "xxl",
                  "text": "Stock Fetching",
                  "margin": "md",
                  "weight": "bold"
                },
                {
                  "type": "text",
                  "size": "md",
                  "color":"#b85000",
                  "text": "Date retrieve:",
                  "margin": "md"
                },
                {
                  "type": "text",
                  "size": "md",
                  "color":"#b85000",
                  "text": "'.$dateStr.'",
                  "margin": "md"
                },
                {
                  "margin": "xxl",
                  "type": "separator"
                },
                {
                  "contents": [
                    '.$messageStockBuild.'
                  ],
                  "type": "box",
                  "spacing": "sm",
                  "margin": "xxl",
                  "layout": "vertical"
                },
                {
                  "margin": "xxl",
                  "type": "separator"
                },
                {
                  "layout": "vertical",
                  "type": "box",
                  "contents": [
                    {
                      "type": "box",
                      "layout": "baseline",
                      "margin": "md",
                      "contents": [
                        {
                          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                          "type": "icon",
                          "size": "sm"
                        },
                        {
                          "type": "icon",
                          "size": "sm",
                          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
                        },
                        {
                          "type": "icon",
                          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                          "size": "sm"
                        },
                        {
                          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png",
                          "type": "icon",
                          "size": "sm"
                        }
                      ]
                    }
                  ]
                }
              ],
              "layout": "vertical",
              "type": "box"
            },
            "hero": {
              "size": "full",
              "aspectMode": "cover",
              "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png",
              "aspectRatio": "20:13",
              "type": "image",
              "action": {
                "type": "uri",
                "uri": "http://linecorp.com/"
              }
            }
          },
          "type": "flex"
        }';
  //echo $flexDataJson;
  $flexDataJsonDeCode = json_decode($flexDataJson,true);
  $datas['url'] = "https://api.line.me/v2/bot/message/push";
  $datas['token'] = $access_token;
  $datas['channelSecret'] = $channelSecret;
  $messages['to'] = $pushID;
  $messages['messages'][] = $flexDataJsonDeCode;
  $encodeJson = json_encode($messages);


  sentMessage($encodeJson,$datas);

?>







