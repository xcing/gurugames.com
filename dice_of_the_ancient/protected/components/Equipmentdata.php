<?php

class Equipmentdata {

    public static function calculateEnhanceOre($rare, $lv) {
        return ($lv + 1) * 10 * $rare;
    }

    public static function calculateFullEnhanceOre($rare, $lv, $userLv) {
        $amount = 0;
        for ($j = ($lv + 1); $j <= $userLv; $j++) {
            $amount += $j * 10 * $rare;
        }
        return $amount;
    }

    public static function calculateFuseEquipment($rare, $lv) {
        $amount = 0;
        if ($lv > 0) {
            for ($j = 0; $j < $lv; $j++) {
                $amount += ($j + 1) * 10 * $rare;
            }
            $amount += $rare * $rare * 10;
        } else {
            $amount = $rare * $rare * 10;
        }
        return ($amount / 2);
    }

    public static function calculateSellEquipment($rare) {
        return ($rare * $rare * $rare * 500);
    }
    
    public static function calculateUnlockGemSlot($rare, $position){
        return ($rare * $rare * 1000 * $position);
    }
    
    public static function calculateSellGem($rare) {
        return ($rare * $rare * 500);
    }

}