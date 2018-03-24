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
        'db_dice' => array(
            'connectionString' => 'mysql:host=localhost;dbname=dice',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
        ),
    ),
);
?>
