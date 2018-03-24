<?php

class CalculateData {
    public static function GetPriceBuyCard($card)
    {
        $modelCard = Card::model()->findByPk($card['cardId']);
        $price = ($modelCard->rare * $modelCard->rare * 1000) + ($card['level'] * $modelCard->rare * 500) + ($card['star'] * $modelCard->rare * 1000);
        return $price;
    }
    public static function GetPriceSellCard($card)
    {
        $price = self::GetPriceBuyCard($card) / 5;
        return $price;
    }
    public static function GetExpSacrificeCard($card)
    {
        $exp = self::GetPriceBuyCard($card) / 10;
        return $exp;
    }
    public static function GetCostSacrificeCard($card)
    {
        $cost = self::GetPriceBuyCard($card) / 10;
        return $cost;
    }
}
?>
