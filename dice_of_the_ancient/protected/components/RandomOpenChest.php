<?php

class RandomOpenChest {

    public function RandomWarrior($chestType){
        if($chestType == 1){
            $data = array(
                'isSoul' => 1,
                'warriorId' => 8,
                'amount' => 5,
            );
            return $data;
        }
        else if($chestType == 2){
            $data = array(
                'isSoul' => 2,
                'warriorId' => 7,
                'amount' => 1,
            );
            return $data;
        }
        else if($chestType == 3){
            $data = array(
                'isSoul' => array(
                    1,2,1,1,2,2,1,1,1,2
                ),
                'amount' => array(
                    5,1,5,5,1,1,5,5,5,1
                ),
                'warriorId' => array(
                    8,8,2,1,2,7,8,7,1,2
                ),
            );
            return $data;
        }
    }
}
?>
