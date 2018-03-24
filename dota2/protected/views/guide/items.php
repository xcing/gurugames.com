<div class="content page1" style="padding:20px;">
    <h2 style="font: 50px/50px 'thaisans_neuebold';margin-bottom:0px;padding-top:0px;">ข้อมูลเกม DOTA2</h2>
</div>
<style>
    .b1 {

        background: url(../images/dota2-heroes.jpg) 0 0 no-repeat;
    }
    .b2 {
        background: url(../images/dota2-items.jpg) 0 0 no-repeat;
    }
    .b3 {
        background: url(../images/dota2-build.jpg) 0 0 no-repeat;
    }
    .itemInfo {
      display: none;
    }
     .popover{
        max-width:500px;
   
    }

    
</style>
<script type="text/javascript">
$( document ).ready(function() {
        $('.item').each(function() {
        var $this = $(this);
        $this.popover({
          trigger: 'hover',
          placement: 'auto',
          html: true,
          container: 'body',
          content: $this.find('.itemInfo').html()  
        });
    });
});

  
</script>
<div class="banner">
    <a href="<?= Yii::app()->createUrl('guide/heroes'); ?>" class="b1 maxheight">
        <div class="box_inner"><span style="font: 30px/30px 'thaisans_neuebold';">ฮีโร่</span></div>
    </a>
    <a href="<?= Yii::app()->createUrl('guide/items'); ?>" class="b2 maxheight">
        <div class="box_inner"><span style="font: 30px/30px 'thaisans_neuebold';">ไอเท็ม</span></div>
    </a>
    <a href="<?= Yii::app()->createUrl('guide/builds'); ?>" class="b3 maxheight">
        <div class="box_inner"><span style="font: 30px/30px 'thaisans_neuebold';">แนวทางการเล่น</span></div>
    </a>
</div>
<div class="bottom_block">
    <div class="container_24">
        <div class="grid_24" style="text-align:center;">
            <h2 style="font: 50px/50px 'thaisans_neuebold';">Items - ไอเท็ม</h2>
        </div>
        
        <div class="clear" style="margin-bottom:10px;"></div>
        <div class="grid_3 prefix_1 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_consumables.png">
            
                <?
                    foreach ($itemConsumables as $key => $value) {
                      ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                    }
                ?>
           
        </div>
       <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_attributes.png">
            <?
                foreach ($itemAttributes1 as $key => $value) {
                  ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_attributes.png">
            <?
                foreach ($itemAttributes2 as $key => $value) {
                 ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_attributes.png">
            <?
                foreach ($itemAttributes3 as $key => $value) {
                  ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_common.png">
            <?
                foreach ($itemCommon as $key => $value) {
                   ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                               <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_support.png">
            <?
                foreach ($itemSupport1 as $key => $value) {
                   ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_support.png">
            <?
                foreach ($itemSupport2 as $key => $value) {
                   ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_weapons.png">
            <?
                foreach ($itemWeapon1 as $key => $value) {
                   ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_weapons.png">
            <?
                foreach ($itemWeapon2 as $key => $value) {
                 ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_2 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_artifacts.png">
            <?
                foreach ($itemArtifacts as $key => $value) {
                    ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
        <div class="grid_3 suffix_1 itemcol" style="text-align:center;">
            <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/itemcat_secret.png">
            <?
                foreach ($itemSecret as $key => $value) {
                   ?>
                        <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>"><div class="item">
                            <img src="<?=$value->image;?>"  alt="<?=$value->name;?>"/>
                       
                            <div class="itemInfo">
                                <div style="float:left;">
                                    <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                                </div>
                                <div  style="float:left;margin-left:15px;">
                                    <span style="font-weight:bold;font-size:18px;color:green"><?=$value->name;?></span><br>
                                    <div style="margin-top:5px;"><img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png"/> <?=$value->price;?></div>
                                </div>
                                <div style="clear: both;margin-bottom:5px;"></div>
                                <? if((trim($value->informationTH)!="-") &&(trim($value->informationTH)!="") ){?>
                                <div style="font: 25px/30px 'thaisans_neuebold';background-color:#000000;padding:5px;color:#cfcfcf;">
                                     <?=nl2br($value->informationTH);?>
                                </div><?}?>
                                <? if((trim($value->bonus)!="-") &&(trim($value->bonus)!="") ){?>
                              <div  style="font: 25px/30px 'thaisans_neuebold';background-color:#CF0606;padding:5px;color:white;">
                                     <?=nl2br($value->bonus);?>
                                </div>
                                <?}?>
                                <? if((trim($value->detailTH)!="-") &&(trim($value->detailTH)!="") ){?>
                               <div style="font-size:14px;font-weight:bold;padding:5px;">
                                     <?=nl2br($value->detailTH);?>
                                
                                </div><?}?>
                                <? if((trim($value->material)!="-") &&(trim($value->material)!="") ){?>
                                <div style="font-size:14px;font-weight:bold;padding:5px;font: 25px/30px 'thaisans_neuebold';">
                                     <span style="color:green">ส่วนผสม</span><br>
                                     <?
                                        $materials = explode( ',', $value->material );
                                        foreach ($materials as $key => $value1) {
                                            if($value->itemId != $value1){
                                                ?><img src="<?=Item::model()->findByPk($value1)->image;?>" style="margin-right:10px;"/><?
                                            }
                                            else
                                            {
                                            echo '<img src="http://www.gurugames.in.th/images/upload/guidedota2/Items/recipe_lg.png" />';
                                            }
                                        }
                                     ?>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </a>
                    <? 
                }
            ?>
        </div>
</div> </div>