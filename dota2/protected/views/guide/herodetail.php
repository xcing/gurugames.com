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
</style>
<script type="text/javascript">
function jump(h){
    var url = location.href;               //Save down the URL without hash.
    location.href = "#"+h;                 //Go to the target element.
    history.replaceState(null,null,url);   //Don't like hashes. Changing it back.
}​
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
            <h2 style="font: 50px/50px 'thaisans_neuebold';"><?=$model->name;?></h2><br>
            <? // echo strtoupper(Hero::model()->getTypeValue($model->type)); ?>
            <img src="<?=$model->image;?>" style="border: 1px solid #A9A9A9;" /><br><br>
            <span style="font-weight:bold;"><? echo ($model->atkType == 1 ? 'โจมตีระยะใกล้' : 'โจมตีระยะไกล');?></span>

    <?php
    if ($roles != null) {
        $roles = explode(',', $roles);
        foreach ($roles as $role) {
            echo " - ".$allRoleName[$role];
        }
    }
    ?>
        </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        <div class="grid_24" style="text-align:center;">
            <h2 style="font: 25px/25px 'thaisans_neuebold';padding-top: 0px !important;border-bottom: 1px solid #5b6a7f;">แนะนำแนวทางการเล่น - คลิกด้านล่างเพื่อดูรายละเอียด</h2>
            <? if(count($allGuide) < 1) echo "ยังไม่มี (กำลังทำการอัพเดท)";?>
        </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        <?
        $i = 0;
            foreach ($allGuide as $key => $guide) { $i++;

                if($i == 3)
                {
                    $i =0;
                }
               ?>
                <a href="<?= Yii::app()->createUrl('guide/builds', array('id' => $guide->guideHeroId)); ?>" class="guidelink">
                    <div class="grid_8">
                       <? 
                            $now = strtotime(date("Y-m-d H:i:s"));
                            $one_week_ago = strtotime("-7 day",$now);
 
                            if( strtotime($guide->dateUpdated) >= $one_week_ago ) {
                            echo '<img src="images/new10_e0.gif" />';
                            } ?>
                    <?=$guide->name;?>
                </div></a>
               <?
            if($i ==0)
            echo '<div class="clear"></div>';}
        ?>
       
       <div class="clear" style="margin-bottom:20px;"></div>
 
        <div class="grid_24" style="text-align:center;">
            <h2 style="font: 25px/25px 'thaisans_neuebold';padding-top: 0px !important;border-bottom: 1px solid #5b6a7f;">รายละเอียดโดยรวม</h2>
        </div>
        <div class="clear" style="margin-bottom:10px;"></div>
<!-- skill-->
        <div class="grid_8" >
             <div class="grid_8 alpha omega" style="text-align:center;">
           <img  src="<?=$model->imageFull;?>" style="width:100%;max-width:310px;";/>
       </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        <div class="grid_4 alpha" >
            <span style="font-weight:bold;">HP:</span> <?=$model->hp;?><br>
           <span style="font-weight:bold;">Mana:</span> <?=$model->mana;?><br>
           <span style="font-weight:bold;">STR:</span> <?=$model->str;?><br>
           <span style="font-weight:bold;">AGI:</span> <?=$model->agi;?><br>
           <span style="font-weight:bold;">INT:</span> <?=$model->int;?><br>
       </div>
       <div class="grid_4 omega" >
           <span style="font-weight:bold;">ATK:</span> <?=$model->atk;?><br>
           <span style="font-weight:bold;">Armor:</span> <?=$model->armor;?><br>
           <span style="font-weight:bold;">Move Speed:</span> <?=$model->moveSpd;?><br>
           <span style="font-weight:bold;">Sight Range:</span> <?=$model->sightRange;?><br>
           <span style="font-weight:bold;">ATK Range:</span> <?=$model->atkRange;?><br>
           <span style="font-weight:bold;">Missle Speed:</span> <?=$model->missileSpd;?><br>
       </div>
       <div class="clear" style="margin-bottom:10px;"></div>
        
            <div class="grid_8 alpha omega" style="text-align:center;">
          ค่าด้านบนเป็นค่าพื้นฐานจากเลเวล 1
       </div>
        <div class="clear" style="margin-bottom:10px;"></div>
        </div>
         <div class="grid_16">
            <? foreach ($model->skill as $key => $value) {?>
            <a href="#<?=$value->name;?>">
            <div class="grid_3 alpha" >
            <img src="<?=$value->image;?>" />
              
          
            </div>
            <div class="grid_13 omega">
                 <span style="font-size:18px;font-weight:bold;"><?=$value->name;?></span><br>
                 <?=$value->detailTH;?>
            </div>
            <div class="clear" style="margin-bottom:5px;"></div></a>
             <? }?>
            
        </div>
         <div class="clear" style="margin-bottom:20px;" ></div>

          <div class="grid_24" style="text-align:center;border-bottom: 1px solid #5b6a7f;">
            <h2 style="font: 25px/25px 'thaisans_neuebold';padding-top: 0px !important">รายละเอียด Skill</h2>
        </div>
        <div class="clear" style="margin-bottom:10px;"></div>
         <!--skill detail-->
         <? foreach ($model->skill as $key => $value) {?>
         <a name="<?=$value->name;?>" ></a>
         <div class="grid_24" style="border-bottom: 1px solid #5b6a7f;padding-bottom:20px;">
            <div class="grid_4 alpha" style="text-align:center;">
             <img src="<?=$value->image;?>" style="width: 100%;max-width:150px;"/>
            </div>
            <div class="grid_12">
                 <span style="font-size:18px;font-weight:bold;"><?=$value->name;?></span><br>
                 <?=$value->detailTH;?>
            </div>
            <div class="grid_8 omega">
                มานาที่ใช้: <?=$value->mana;?><br>
                คูลดาวน์: <?=$value->cooldown;?>
            </div>
            <div class="clear"  style="margin-bottom:10px;"></div>
             <div class="grid_12 alpha">
                
                <? if(isset($value->noteLeft)) echo nl2br($value->noteLeft);?>
             </div>
             <div class="grid_12 omega">
                <? if(isset($value->noteRight)) echo nl2br($value->noteRight);?>
             </div>
             <div class="clear"  style="margin-bottom:10px;"></div>
             <? if(trim($value->youtube) != ""){?>
             <div class="grid_24 alpha omega">
                <div class="responsive-container"><iframe allowfullscreen="" frameborder="0" height="580" src="//www.youtube.com/embed/<?=$value->youtube;?>" width="750"></iframe></div>
             </div>
             <div class="clear" ></div>
             <? }?>
         </div>
          <div class="clear" style="margin-bottom:20px;"></div>
          <? }?>
    </div>
</div>