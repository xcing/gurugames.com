<div class="content page1" style="padding:20px;">
    <h2 style="font: 50px/50px 'thaisans_neuebold';margin-bottom:0px;padding-top:0px;float:left;margin-right:20px;">ข้อมูลเกม </h2><img src="images/1_dota-2-screenshot-48.jpg"><span style="line-height:70px;margin-left:20px;">ขอบคุณข้อมูลฮีโร่และไอเท็มจาก <a href="dota2.com" style="color:#cf0606;" rel="nofollow" >dota2.com</a> ,<b>VALVE</b> และ eclub thailand</span>
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
            <h2 style="font: 50px/50px 'thaisans_neuebold';">แนวทางการเล่น <?=$hero->name;?> <br>สาย <?=$guidehero->name;?></h2><br>
            
                <!-- <br><br> -->
           <!--  <span style="font-weight:bold;"><? echo ($hero->atkType == 1 ? 'โจมตีระยะใกล้' : 'โจมตีระยะไกล');?></span> -->

                <?php

                //print_r($roles);
                /*if ($roles != null) {
                    $roles = explode(',', $roles);
                    foreach ($roles as $role) {
                        echo " - ".$allRoleName[$role];
                    }
                }*/
                ?>
        </div>
        <div class="clear" style="margin-bottom:10px;"></div>
            <div class="grid_7 alpha prefix_1" style="text-align:center;font-weight:bold;">  <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" style="border: 1px solid #A9A9A9;" /><br>คลิกเพื่อดูข้อมูลฮีโร่
            </a>
            </div>
            <div class="grid_4 prefix_1" style="text-align:left;">
                <span style="font-weight:bold;">HP:</span> <?=$hero->hp;?><br>
               <span style="font-weight:bold;">Mana:</span> <?=$hero->mana;?><br>
               <span style="font-weight:bold;">STR:</span> <?=$hero->str;?><br>
               <span style="font-weight:bold;">AGI:</span> <?=$hero->agi;?><br>
               <span style="font-weight:bold;">INT:</span> <?=$hero->int;?><br>
           </div>
           <div class="grid_5" style="text-align:left;">
               <span style="font-weight:bold;">ATK:</span> <?=$hero->atk;?><br>
               <span style="font-weight:bold;">Armor:</span> <?=$hero->armor;?><br>
               <span style="font-weight:bold;">Move Speed:</span> <?=$hero->moveSpd;?><br>
               <span style="font-weight:bold;">Sight Range:</span> <?=$hero->sightRange;?><br>
               <span style="font-weight:bold;">ATK Range:</span> <?=$hero->atkRange;?><br>
               <span style="font-weight:bold;">Missle Speed:</span> <?=$hero->missileSpd;?><br>
           </div>
           <div class="grid_6 omega"  style="text-align:center;font-weight:bold;">
              ข้อมูลด้านซ้ายเป็น<br>ค่าพื้นฐานจากเลเวล 1
           </div>
           <div class="clear" style="margin-bottom:10px;"></div>
        <div class="grid_24" >
            <h2 style="font: 50px/50px 'thaisans_neuebold';">การซื้้อไอเท็ม</h2><br>

         </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        <div class="grid_8" >
        <h2 style="font: 30px/30px 'thaisans_neuebold';padding-top:0px !important;">ไอเท็มเริ่มต้น</h2><br>
            <? foreach ($startItem as $key => $value) {
                ?>
                <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>">
                <div class="item" style="display: inline-block;margin-bottom:5px;"><img src="<?=$value->image;?>" />
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
                </div></div>
                </a>
                <?
            } ?><br><br><br>
            </div>
            <div class="grid_8" >
            <h2 style="font: 30px/30px 'thaisans_neuebold';padding-top:0px !important;">ไอเท็มต้นเกม</h2><br>
            <? if(isset($earlyItem)){
                foreach ($earlyItem as $key => $value) {
                ?>
                <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>">
                <div class="item" style="display: inline-block;margin-bottom:5px;"><img src="<?=$value->image;?>" />
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
                </div></div>
                </a>
                <?
            } }?><br><br><br>
            </div>
            <div class="grid_8" >
            <h2 style="font: 30px/30px 'thaisans_neuebold';padding-top:0px !important;">ไอเท็มหลัก</h2><br>
            <? foreach ($coreItem as $key => $value) {
                ?>
                <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>">
                <div class="item" style="display: inline-block;margin-bottom:5px;"><img src="<?=$value->image;?>" />
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
                </div></div>
                </a>
                <?
            } ?><br></div>
            <div class="clear" style="margin-bottom:5px;"></div>
            <div class="grid_8" >
            <h2 style="font: 30px/30px 'thaisans_neuebold';padding-top:0px !important;">ไอเท็มท้ายเกม</h2><br>
            <? 
                if(isset($lateItem)){
                foreach ($lateItem as $key => $value) {
                ?>
                <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>">
                <div class="item" style="display: inline-block;margin-bottom:5px;"><img src="<?=$value->image;?>" />
                <div class="itemInfo">
                    <div style="float:left;">
                        <img src="<?=$value->image;?>"  alt="<?=$value->name;?>" />
                    </div>
                    <div style="float:left;margin-left:15px;">
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
                </div></div>
                </a>
                <?
            }} ?><br></div>
            <div class="grid_8" >
            <h2 style="font: 30px/30px 'thaisans_neuebold';padding-top:0px !important;">ไอเท็มตามสถาณการณ์</h2><br>
            <? foreach ($dynamicItem as $key => $value) {
                ?>
                <a href="<?= Yii::app()->createUrl('guide/items', array('id' => $value->itemId)); ?>">
                <div class="item" style="display: inline-block;margin-bottom:5px;"><img src="<?=$value->image;?>" />
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
                </div></div>
                </a>
                <?
            } ?><br></div>
        <div class="clear" style="margin-bottom:5px;"></div>
        <div class="grid_24" style="float:left;">
            <h2 style="font: 50px/50px 'thaisans_neuebold';">การอัพสกิล</h2>คลิกที่สกิลเพื่อดูรายละเอียดสกิลของฮีโร่<br><br>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>#<?=$hero->skill[0]->name;?>"/>
                <div class="skillbuildname"><span><?=$hero->skill[0]->name;?></span></div>
                <img src="<?=$hero->skill[0]->image;?>" class="skillbuildimage">
            </a>
            <? 
                for ($i=0; $i < 25; $i++) { 

                    if($skills[$i] == 1)
                        echo '<div class="activeskillbuild">'.($i+1).'</div>';
                    else
                        echo '<div class="inactiveskillbuild"></div>';

                }
            ?><div class="clear" style="margin-bottom:5px;"></div>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>#<?=$hero->skill[1]->name;?>"/>
            <div class="skillbuildname"><span><?=$hero->skill[1]->name;?></span></div>
            </a>
            <img src="<?=$hero->skill[1]->image;?>" class="skillbuildimage">
            <? 
                for ($i=0; $i < 25; $i++) { 
                    if($skills[$i] == 2)
                        echo '<div class="activeskillbuild">'.($i+1).'</div>';
                    else
                        echo '<div class="inactiveskillbuild"></div>';
                }
            ?><div class="clear" style="margin-bottom:5px;"></div>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>#<?=$hero->skill[2]->name;?>"/>
            <div class="skillbuildname"><span><?=$hero->skill[2]->name;?></span></div>
            </a>
            <img src="<?=$hero->skill[2]->image;?>" class="skillbuildimage">
            <? 
                for ($i=0; $i < 25; $i++) { 
                    if($skills[$i] == 3)
                        echo '<div class="activeskillbuild">'.($i+1).'</div>';
                    else
                        echo '<div class="inactiveskillbuild"></div>';
                }
            ?><div class="clear" style="margin-bottom:5px;"></div>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>#<?=$hero->skill[3]->name;?>"/>
            <div class="skillbuildname"><span><?=$hero->skill[3]->name;?></span></div>
            </a>
            <img src="<?=$hero->skill[3]->image;?>" class="skillbuildimage">
            <? 
                for ($i=0; $i < 25; $i++) { 
                    if($skills[$i] == 4)
                        echo '<div class="activeskillbuild">'.($i+1).'</div>';
                    else
                        echo '<div class="inactiveskillbuild"></div>';
                }
            ?><div class="clear" style="margin-bottom:5px;"></div>
            <div class="skillbuildname"><span>STATS</span></div>
            <img src="http://www.gurugames.in.th/images/upload/guidedota2/skills/Attribute_Bonus_icon.png" class="skillbuildimage">
            <? 
                for ($i=0; $i < 25; $i++) { 
                    if($skills[$i] == 5)
                        echo '<div class="activeskillbuild">'.($i+1).'</div>';
                    else
                        echo '<div class="inactiveskillbuild"></div>';
                }
            ?><div class="clear" style="margin-bottom:5px;"></div>
         </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        <? if(trim($guidehero->detail) != ""){?>
        <div class="grid_24">
            <h2 style="font: 50px/50px 'thaisans_neuebold';">รายละเอียดเพิ่มเติม</h2><br>
            <div style="padding-left:20px;"><?=$guidehero->detail;?></div>
         </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        <? }?>
</div></div>