<?php

return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=gurugames',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        'db_alchemonsters' => array(
            'connectionString' => 'mysql:host=localhost;dbname=alchemonsters',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
        'db_warrior' => array(
            'connectionString' => 'mysql:host=localhost;dbname=warrior',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
    ),
);
?>