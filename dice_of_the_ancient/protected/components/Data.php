<?php

class Data {

    private static $areaArray = array(
        1 => array(
            0 => 'Forest',
            1 => 'ป่าทมิฬ',
            2 => '生命值',
        ),
        2 => array(
            0 => 'Mountain',
            1 => 'ภูเขา',
            2 => '生命值',
        ),
    );

    public static function getAreaJson() {
        return json_encode(self::$areaArray);
    }

}

?>