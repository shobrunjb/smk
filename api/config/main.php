<?php
 
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
 
return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'   // here is our v1 modules
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/country',   // our country api rule,
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/test',
                ],
                [
                    'class'=>'yii\rest\UrlRule',  //<-- this is the standard rule class
                    'controller'=>'v1/pelanggaran',    // <-- which controller   "contacts/{rule}"        
                    'extraPatterns'=>[
                        'GET hello' => 'hello',
                        'POST post-pelanggaran' => 'post-pelanggaran',
                        'POST post-peringatan' => 'post-peringatan',
                        'POST post-laporan-masyarakat' => 'post-laporan-masyarakat',
                        'GET get-list-pelanggaran' => 'get-list-pelanggaran',
                        'GET get-list-peringatan' => 'get-list-peringatan', 
                        'GET get-list-pelanggaran-by-petugas' => 'get-list-pelanggaran-by-petugas',
                        'GET get-list-peringatan-by-petugas' => 'get-list-peringatan-by-petugas',
                        'GET get-pelanggaran-by-id' => 'get-pelanggaran-by-id',
                        'GET cek-pelanggaran' => 'cek-pelanggaran',
                        'GET get-list-laporan-masyarakat' => 'get-list-laporan-masyarakat',
                        'GET get-pelanggaran-field' => 'get-pelanggaran-field',
                        'GET get-about-app' => 'get-about-app',
                        'GET get-dashboard-count-by-petugas' => 'get-dashboard-count-by-petugas',
                        'POST update-pelanggaran' => 'update-pelanggaran',
                        'POST update-peringatan' => 'update-peringatan',
                    ],  // <-- I add a custom rule  
                    'tokens' => [

                        '{ids}' => '<ids:\\w+>',

                    ]

                ],
                [
                    'class'=>'yii\rest\UrlRule',  //<-- this is the standard rule class
                    'controller'=>'v1/default',    // <-- which controller   "contacts/{rule}"        
                    'extraPatterns'=>[
                        'GET loginget' => 'loginget',
                        'POST login' => 'login',
                        'POST sign-in' => 'sign-in',
                        'GET hello' => 'hello',
                        'POST login-petugas' => 'login-petugas',
                        'POST update-profil-user' => 'update-profil-user',
                        'POST change-password-user' => 'change-password-user',
                    ],  // <-- I add a custom rule  
                    'tokens' => [
                        '{ids}' => '<ids:\\w+>',
                    ]

                ],
            ],
        ]
    ],
    'params' => $params,
];