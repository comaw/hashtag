<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage'=>'en_US',
    'language' => 'ru',
    'charset' => 'UTF-8',
    'timeZone' => 'Europe/Kiev',
    'name' => \Yii::t('app', 'MyHashTags'),
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1']
        ],
    ],
    'components' => [
        'twitter' => [
            'class' => 'richweber\twitter\Twitter',
            'consumer_key' => '9YVNzpAjUX4ODNbvCZ2PDDsPk',
            'consumer_secret' => 'bhZh1NTkSC6yDJvxIh1llgTVpKXoovLGKhU9pKPxwPE1PAwsOH',
            'callback' => 'http://myhashtag.top/',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'php-shaman',
                'password' => '12microsoft12',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'formatter' => [
            'timeZone' => 'Europe/Kiev',
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'dd/MM/yyyy H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => '',
        ],
        'assetManager' => [
            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => null,
//                    'js' => ['js/jquery00.js']
//                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => ['css/d/bootstrap.min.css'],
                    'js' => ['js/bootstrap.min.js'],
                ],

            ],

        ],
        'i18n'=> [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'ru_RU',
                ]
            ],
        ],
        'request' => [
            'baseUrl' => ''
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname='.(($_SERVER['REMOTE_ADDR'] == '127.0.0.1')?'hashtag':'hashtag'),
            'username' => ($_SERVER['REMOTE_ADDR'] == '127.0.0.1')?'root':'hashtag',
            'password' => ($_SERVER['REMOTE_ADDR'] == '127.0.0.1')?'':'12hashtag12',
            'charset' => 'utf8',
            'tablePrefix' => 'nk_',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'baseUrl' => '/',
            'suffix' => '/',
            'rules' => [
                '' => 'site/index',
                'about' => 'site/about',
                'contact' => 'site/contact',
                'signup' => 'site/signup',
                'login' => 'site/login',
                'site/requestpasswordreset' => 'site/requestpasswordreset',
                'site/reset-password' => 'site/resetpassword',

                'hashtag' => 'hashtag/index',
//                'hashtag/view/<id:\d+>' => 'hashtag/view',
                'hashtag/<tag:\#[a-zA-Z0-9а-яА-Я_]+>/view' => 'hashtag/view',
                'сatalog' => 'сatalog/index',
                'rss' => 'site/rss',

                [
                    'pattern' => 'sitemap',
                    'route' => 'site/sitemap',
                    'suffix' => '.xml',
                ],


                '<controller:\w+>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>' => '<controller>/index',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
