<?php
return [
    'name' => 'House Project',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require(dirname(__DIR__)) . '/config/db.php',
        'cache' => [
            'class' => 'yii\caching\FileCache',
            /* for memcache
            'class' => 'yii\caching\MemCache',
            'servers' => [
                [
                    'host' => 'server1',
                    'port' => '11211',
                    'weight' => 100
                ],
                [
                    'host' => 'server2',
                    'port' => '11211',
                    'weight' => 50
                ]
            ]
            */
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
//            'useFileTransport' => true,
            'useFileTransport' => false,

            'transport' => [
                'class' => 'Swift_SmtpTransport',
//                'host' => 'localhost',
                'host' => 'smtp.gmail.com', //ssl://smtp.yandex.com
//                'username' => 'username',
                'username' => 'afonin006@gmail.com',
                'password' => 'Va989126',
                'port' =>  '587',
                'encryption' => 'tls'
//                'port' =>  '465',
//                'encryption' => 'ssl'

            ],


        ],
    ],
];
