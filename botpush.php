<?php



require "vendor/autoload.php";
use LINE\LINEBot\MessageBuilder\Flex

$access_token = 'TZmVYh0Qhgcz5j3l+ObQL5wZBIokzhzyQ5m9+1OMI2Z/qrXqINozYwQhNvW0Lb/YA4i6x330LfWiTaQPiTT2a+KESHwoINU8h368g+NKQeFMFdq1rlICFBb5kgmIfgeS3nM+2h5Y6+mjkiGl6b3NCwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd9c965b73b66268d124bd5a587311fed';

$pushID = 'U93897309b140d46cb5c59ab439427cd9';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$message = FlexMessageBuilder::builder()
                ->setAltText('test')
                ->setContents(
                    BubbleContainerBuilder::builder()
                    ->setHeader(
                        BoxComponentBuilder::builder()
                        ->setLayout(ComponentLayout::VERTICAL)
                        ->setContents([
                            TextComponentBuilder::builder()
                                ->setText('test')
                                ->setAlign(ComponentAlign::CENTER)
                                ->setWrap(true)
                                ->setWeight(ComponentFontWeight::BOLD)
                                ->setColor('#17c950'),
                            TextComponentBuilder::builder()
                                ->setText('test')
                                ->setAlign(ComponentAlign::CENTER)
                                ->setWrap(true)
                                ->setWeight(ComponentFontWeight::BOLD)
                                ->setColor('#17c950'),
                        ])
                    )
                    ->setHero(
                        ImageComponentBuilder::builder()
                        ->setSize(ComponentImageSize::FULL)
                        ->setAspectRatio(ComponentImageAspectRatio::R20TO13)
                        ->setAspectMode(ComponentImageAspectMode::COVER)
                        ->setUrl('https://becatholic.ilhamriski.com/images/becatholic_top_banner.png')
                    )
                    ->setBody(
                        BoxComponentBuilder::builder()
                        ->setLayout(ComponentLayout::VERTICAL)
                        ->setSpacing(ComponentSpacing::SM)
                        ->setContents([
                            TextComponentBuilder::builder()
                                ->setText('📢  test')
                                ->setWrap(true)
                                ->setWeight(ComponentFontWeight::BOLD)
                                ->setSize(ComponentFontSize::LG),
                            SeparatorComponentBuilder::builder(),
                            BoxComponentBuilder::builder()
                                ->setLayout(ComponentLayout::BASELINE)
                                ->setContents([
                                    TextComponentBuilder::builder()
                                        ->setText('test test testsetsetset')
                                        ->setWrap(true)
                                ]),
                            BoxComponentBuilder::builder()
                                ->setLayout(ComponentLayout::VERTICAL)
                                ->setMargin(ComponentMargin::XXL)
                                ->setContents([
                                    SpacerComponentBuilder::builder(),
                                    ImageComponentBuilder::builder()
                                        ->setUrl('https://google.com/example.png')
                                        ->setAspectMode(ComponentImageAspectMode::COVER)
                                        ->setSize(ComponentImageSize::XL),
                                    TextComponentBuilder::builder()
                                        ->setText('Kamu bisa menambahkan via qrCode diatas, atau dengan menekan tombol Add Friends dibawah.')
                                        ->setColor('#aaaaaa')
                                        ->setWrap(true)
                                        ->setMargin(ComponentMargin::XXL)
                                        ->setSize(ComponentFontSize::XS)
                                ])
                        ])
                    )
                    ->setFooter(
                        BoxComponentBuilder::builder()
                        ->setLayout(ComponentLayout::VERTICAL)
                        ->setSpacing(ComponentSpacing::SM)
                        ->setContents([
                            ButtonComponentBuilder::builder()
                                ->setStyle(ComponentButtonStyle::PRIMARY)
                                ->setAction(
                                    new UriTemplateActionBuilder('👍 Add Friends', 'https://google.com')
                                ),
                            ButtonComponentBuilder::builder()
                                ->setStyle(ComponentButtonStyle::SECONDARY)
                                ->setAction(
                                    new UriTemplateActionBuilder('🌐 Website', 'https://google.com')
                            )
                        ])
                    )
                );


$response = $bot->pushMessage($pushID, $message);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







