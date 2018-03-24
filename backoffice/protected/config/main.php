<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'ระบบจัดการข้อมูลภายใน เว็บไซต์กูรูเกม',
    // preloading 'log' component
    'preload' => array(
        'log',
    //'bootstrap',
    ),
    'charset' => 'UTF-8',
    // themes
    'theme' => 'bootstrap',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'application.components.controller.*',
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
        'rights',
        'game',
        'user',
        'general',
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            //'allowAutoLogin' => true,
            'class' => 'RWebUser',
        ),
        /*'session' => array(
            'savePath' => '../database', 
            'cookieParams' => array(
                'domain' => '.gurugames.in.th',
            ),
        ),*/
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'assignmentTable' => 'authassignment',
            'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'rightsTable' => 'rights',
        /*'authManager' => array(
            'class' => 'RDbAuthManager',
            'assignmentTable' => 'AuthAssignment',
            'itemTable' => 'AuthItem',
            'itemChildTable' => 'AuthItemChild',*/
        //'defaultRoles' => array('Guest'),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugamesi_gurugames',
            'emulatePrepare' => true,
            'username' => 'gurugamesi_admin',
            'password' => 'gurudota2',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        'db_dota2' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugamesi_dota2',
            'emulatePrepare' => true,
            'username' => 'gurugamesi_admin',
            'password' => 'gurudota2',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        'db_alchemonsters' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugamesi_alchemonsters',
            'emulatePrepare' => true,
            'username' => 'gurugamesi_admin',
            'password' => 'gurudota2',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        // uncomment the following to use a MySQL database
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info, trace, error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        //'curl' => array(
        //    'class' => 'application.extensions.curl.Curl',
        //)
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'pawanwit.s@chainsoft.co.th',
    ),
        //'theme' => 'twitter_moladmin_01',
);