<?php

class LanguageManager {

    public static $languageArray = array(
        'en' => 'อังกฤษ',
        'th' => 'ไทย',
        'cn' => 'จีน',
        'jp' => 'ญี่ปุ่น',
        'kr' => 'เกาหลี',
    );

    public static function getLanguageArray() {
        return self::$languageArray;
    }

    public static function getLanguageValue($data) {
        return self::$languageArray[$data];
    }

}