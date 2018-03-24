<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Gurugames',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        
    ),
    //'id' => 'gurugames',
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /*'session' => array(
             'class'=>'CHttpSession',
              //'savePath' => 'D:\xampp\htdocs\gurugames\database',  //change session path to same folder if not using php default session
              'cookieMode' => 'allow',
              'cookieParams' => array(
              'domain' => '.gurugames.in.th',
              ), 
        ),*/
        // uncomment the following to enable URLs in path-format
        /*'urlManager' => array(
         'urlFormat' => 'path',
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
          ), 
        ),*/
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugamesi_gurugames',
            'emulatePrepare' => true,
            'username' => 'gurugamesi_admin',
            'password' => 'gurudota2',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        'db_warrior' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugamesi_warrior',
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