<?php

class Encryption {
    private static $key = 'lkDrQf8J7+92#nbtLm58aLlk30Nst3rr';
    private static $iv = '741V52h4eeYy67#cs!9hjv8G00rUGa3e';
    
    public static function decryptRJ256($string_to_decrypt) {
        $string_to_decrypt = base64_decode($string_to_decrypt);
        $rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, self::$key, $string_to_decrypt, MCRYPT_MODE_CBC, self::$iv);
        $rtn = rtrim($rtn, "\0\4");
        return($rtn);
    }

    public static function encryptRJ256($string_to_encrypt) {
        $rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, self::$key, $string_to_encrypt, MCRYPT_MODE_CBC, self::$iv);
        $rtn = base64_encode($rtn);
        return($rtn);
    }

}

?>
