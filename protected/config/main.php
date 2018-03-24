<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Gurugames กูรูเกมส์- แหล่งรวมข่าวสาร และข้อมูลเกม',
    // preloading 'log' component
    'preload' => array('log'),
    'charset' => 'UTF-8',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.yii-mail.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'ext.gii_backoffice', // Gii Template Collection
                'bootstrap.gii',
            ),
        ),
    ),
    //'id' => 'gurugames',
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /*'cache' => array(
            'class' => 'CMemCache',
            'servers' => array(
                array(
                    'host' => 'server1',
                    'port' => 11211,
                    'weight' => 60,
                ),
                array(
                    'host' => 'server2',
                    'port' => 11211,
                    'weight' => 40,
                ),
            ),
        ),*/
        /*'session' => array(
            'class' => 'CHttpSession',
            //'savePath' => 'D:\xampp\htdocs\gurugames\database',
            'cookieMode' => 'allow',
            'cookieParams' => array(
                'domain' => '.gurugames.in.th',
            ),
        ),*/
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'viewPath' => 'application.views.site',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
        /* 'urlFormat' => 'path',
          //'showScriptName' => false,
          //'caseSensitive' => false,
          'rules' => array(
          //'http://eos.gurugames.in.th/' => 'eos/default/index',

          //'http://<module:\w+>.<hostname:[^\/]+>/' => '<module>/',
          //'http://<module:\w+>.<hostname:[^\/]+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
          //'http://<module:\w+>.<hostname:[^\/]+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
          //'http://<module:\w+>.<hostname:[^\/]+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',

          //'http://<module:\w+>.gurugames.in.th/' => '<module>/default',
          //'http://<module:\w+>.gurugames.in.th/<controller:\w+>' => '<module>/<controller>/',
          //'http://<module:\w+>.gurugames.in.th/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
          //'http://<module:\w+>.gurugames.in.th/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',

          //'<controller:\w+>/<id:\d+>' => '<controller>/view',
          //   '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
          //  '<controller:\w+>/<action:\w+>'
          ), */
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugamesi_gurugames',
            'emulatePrepare' => true,
            'username' => 'gurugamesi_admin',
            'password' => 'gurudota2',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
);