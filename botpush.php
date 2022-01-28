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

$access_token = 'TZmVYh0Qhgcz5j3l+ObQL5wZBIokzhzyQ5m9+1OMI2Z/qrXqINozYwQhNvW0Lb/YA4i6x330LfWiTaQPiTT2a+KESHwoINU8h368g+NKQeFMFdq1rlICFBb5kgmIfgeS3nM+2h5Y6+mjkiGl6b3NCwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd9c965b73b66268d124bd5a587311fed';

$pushID = 'U93897309b140d46cb5c59ab439427cd9';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('15 พฤศจิกายน 62	Almond Pretzel	มูลค่า 46บาท	Auntie Anne’s บน GrabFood');

$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();


require 'sendMessage.php';

  $flexDataJson = '{
	  "type": "flex",
	  "altText": "Flex Message",
	  "contents": {
	    "type": "carousel",
	    "contents": [
	      {
	        "type": "bubble",
	        "hero": {
	          "type": "image",
	          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
	          "size": "full",
	          "aspectRatio": "20:13",
	          "aspectMode": "cover"
	        },
	        "body": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "text",
	              "text": "Arm Chair, White",
	              "size": "xl",
	              "weight": "bold",
	              "wrap": true
	            },
	            {
	              "type": "box",
	              "layout": "baseline",
	              "contents": [
	                {
	                  "type": "text",
	                  "text": "$49",
	                  "flex": 0,
	                  "size": "xl",
	                  "weight": "bold",
	                  "wrap": true
	                },
	                {
	                  "type": "text",
	                  "text": ".99",
	                  "flex": 0,
	                  "size": "sm",
	                  "weight": "bold",
	                  "wrap": true
	                }
	              ]
	            }
	          ]
	        },
	        "footer": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to Cart",
	                "uri": "https://linecorp.com"
	              },
	              "style": "primary"
	            },
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to whishlist",
	                "uri": "https://linecorp.com"
	              }
	            }
	          ]
	        }
	      },
	      {
	        "type": "bubble",
	        "hero": {
	          "type": "image",
	          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
	          "size": "full",
	          "aspectRatio": "20:13",
	          "aspectMode": "cover"
	        },
	        "body": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "text",
	              "text": "Metal Desk Lamp",
	              "size": "xl",
	              "weight": "bold",
	              "wrap": true
	            },
	            {
	              "type": "box",
	              "layout": "baseline",
	              "flex": 1,
	              "contents": [
	                {
	                  "type": "text",
	                  "text": "$11",
	                  "flex": 0,
	                  "size": "xl",
	                  "weight": "bold",
	                  "wrap": true
	                },
	                {
	                  "type": "text",
	                  "text": ".99",
	                  "flex": 0,
	                  "size": "sm",
	                  "weight": "bold",
	                  "wrap": true
	                }
	              ]
	            },
	            {
	              "type": "text",
	              "text": "Temporarily out of stock",
	              "flex": 0,
	              "margin": "md",
	              "size": "xxs",
	              "color": "#FF5551",
	              "wrap": true
	            }
	          ]
	        },
	        "footer": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to Cart",
	                "uri": "https://linecorp.com"
	              },
	              "flex": 2,
	              "color": "#AAAAAA",
	              "style": "primary"
	            },
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to wish list",
	                "uri": "https://linecorp.com"
	              }
	            }
	          ]
	        }
	      },
	      {
	        "type": "bubble",
	        "body": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "See more",
	                "uri": "https://linecorp.com"
	              },
	              "flex": 1,
	              "gravity": "center"
	            }
	          ]
	        }
	      }
	    ]
	  }
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







