<?php

class Pieces {

    public function GetTypeId($piecesId) {
        switch ($piecesId) {
            case 1:
            case 8:
            case 17:
            case 24:
                return 6;
                break;
            case 2:
            case 7:
            case 18:
            case 23:
                return 5;
                break;
            case 3:
            case 6:
                return 3;
                break;
            case 19:
            case 22:
                return 4;
                break;
            case 4:
            case 21:
                return 1;
                break;
            case 5:
            case 20:
                return 2;
                break;
            case 9:
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
            case 16:
                return 7;
                break;
            case 25:
            case 26:
            case 27:
            case 28:
            case 29:
            case 30:
            case 31:
            case 32:
                return 8;
                break;
        }
    }

}

?>
