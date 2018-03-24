<?php

class ThemeData {
    private static $data = array(
        1 => array( //game id
            1 => array( //theme id
                'name' => 'Default',
                'price' => 0,
            ),
            2 => array(
                'name' => 'black & white',
                'price' => 0,
            ),
            3 => array(
                'name' => 'White marble',
                'price' => 15000,
            ),
            4 => array(
                'name' => 'Black marble',
                'price' => 15000,
            ),
            5 => array(
                'name' => 'Metallic',
                'price' => 25000,
            ),
        ),
    );
    
    public static function getData($gameId, $themeId) {
        return self::$data[$gameId][$themeId];
    }

}

?>