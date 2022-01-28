<?php



require "vendor/autoload.php";
use LINE\LINEBot\MessageBuilder\Flex;
use LINE\LINEBot;
use LINE\LINEBot\Constant\Flex\ComponentLayout;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\Tests\LINEBot\Util\DummyHttpClient;
use PHPUnit\Framework\TestCase;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\BoxComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ButtonComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\IconComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ImageComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\TextComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\CarouselContainerBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\Constant\Flex\ComponentIconSize;
use LINE\LINEBot\Constant\Flex\ComponentImageSize;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectRatio;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectMode;
use LINE\LINEBot\Constant\Flex\ComponentFontSize;
use LINE\LINEBot\Constant\Flex\ComponentFontWeight;
use LINE\LINEBot\Constant\Flex\ComponentMargin;
use LINE\LINEBot\Constant\Flex\ComponentSpacing;
use LINE\LINEBot\Constant\Flex\ComponentButtonStyle;
use LINE\LINEBot\Constant\Flex\ComponentButtonHeight;
use LINE\LINEBot\Constant\Flex\ComponentSpaceSize;
use LINE\LINEBot\Constant\Flex\ComponentGravity;
use LINE\LINEBot\QuickReplyBuilder\ButtonBuilder\QuickReplyButtonBuilder;
use LINE\LINEBot\QuickReplyBuilder\QuickReplyMessageBuilder;
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


foreach ($stockList as $stockName){
  echo "$stockName<br>";
}
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
                  "margin": "xxl",
                  "type": "separator"
                },
                {
                  "contents": [
                    {
                      "contents": [
                        {
                          "type": "text",
                          "color": "#555555",
                          "size": "sm",
                          "text": "ITEMS"
                        },
                        {
                          "color": "#111111",
                          "align": "end",
                          "text": "3",
                          "size": "sm",
                          "type": "text"
                        }
                      ],
                      "layout": "horizontal",
                      "type": "box",
                      "margin": "xxl"
                    },
                    {
                      "type": "box",
                      "contents": [
                        {
                          "type": "text",
                          "size": "sm",
                          "color": "#555555",
                          "text": "TOTAL"
                        },
                        {
                          "text": "$7.31",
                          "align": "end",
                          "type": "text",
                          "size": "sm",
                          "color": "#111111"
                        }
                      ],
                      "layout": "horizontal"
                    },
                    {
                      "layout": "horizontal",
                      "contents": [
                        {
                          "color": "#555555",
                          "text": "CASH",
                          "type": "text",
                          "size": "sm"
                        },
                        {
                          "type": "text",
                          "align": "end",
                          "color": "#111111",
                          "text": "$8.0",
                          "size": "sm"
                        }
                      ],
                      "type": "box"
                    },
                    {
                      "layout": "horizontal",
                      "contents": [
                        {
                          "type": "text",
                          "text": "CHANGE",
                          "color": "#555555",
                          "size": "sm"
                        },
                        {
                          "type": "text",
                          "size": "sm",
                          "text": "$0.69",
                          "color": "#111111",
                          "align": "end"
                        }
                      ],
                      "type": "box"
                    }
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
                  "layout": "horizontal",
                  "contents": [
                    {
                      "type": "text",
                      "color": "#aaaaaa",
                      "text": "PAYMENT ID",
                      "size": "xs"
                    },
                    {
                      "text": "#743289384279",
                      "type": "text",
                      "color": "#aaaaaa",
                      "size": "xs",
                      "align": "end"
                    }
                  ],
                  "margin": "md",
                  "type": "box"
                },
                {
                  "layout": "vertical",
                  "type": "box",
                  "contents": [
                    {
                      "weight": "bold",
                      "type": "text",
                      "text": "Brown Cafe",
                      "size": "xl"
                    },
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
  $flexDataJsonDeCode = json_decode($flexDataJson,true);
  $datas['url'] = "https://api.line.me/v2/bot/message/push";
  $datas['token'] = $access_token;
  $datas['channelSecret'] = $channelSecret;
  $messages['to'] = $pushID;
  $messages['messages'][] = $flexDataJsonDeCode;
  $encodeJson = json_encode($messages);


  sentMessage($encodeJson,$datas);

?>







