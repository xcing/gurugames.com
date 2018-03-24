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
</style>
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
            <h2 style="font: 50px/50px 'thaisans_neuebold';">Guide - แนวทางการเล่น</h2>
        </div>
        <div class="clear" style="margin-bottom:20px;"></div>
        <div class="grid_24" style="text-align:center;">
            <form action="http://dota2.gurugames.in.th/index.php?r=guide/builds" method="POST">
            <select name="stat" onchange="document.getElementById('herofilter').selectedIndex = 0;this.form.submit()">
              <option value="0" <? echo ($currentStat == '0' ? ' selected="selected"' : ''); ?>>Stat หลัก</option>
              <option value="1" <? echo ($currentStat == '1' ? ' selected="selected"' : '');  ?>>STR</option>
              <option value="2" <? echo ($currentStat == '2' ? ' selected="selected"' : '');  ?>>AGI</option>
              <option value="3" <? echo ($currentStat == '3' ? ' selected="selected"' : '');  ?>>INT</option>
            </select>
            
            <select name="role" onchange="document.getElementById('herofilter').selectedIndex = 0;this.form.submit()">
                <option value="0" <? echo ($currentStat == '0' ? ' selected="selected"' : ''); ?>>หน้าที่</option>
            <? 
                foreach ($allrole as $key => $value) {
                    ?>
                    <option value="<?=$value->roleId;?>" <? echo ($currentRole == $value->roleId ? ' selected="selected"' : ''); ?>><?=$value->name;?></option>
                    <?
                }

            ?>
            </select>
            <select name="hero" id="herofilter" onchange="this.form.submit()">
                <option value="0" <? echo ($currentHero == '0' ? ' selected="selected"' : ''); ?>>ฮีโร่</option>
            <? 
                foreach ($allhero as $key => $value) {
                    ?>
                    <option value="<?=$value->heroId;?>" <? echo ($currentHero == $value->heroId ? ' selected="selected"' : ''); ?>><?=$value->name;?></option>
                    <?
                }

            ?>
            </select>
            </form>
        </div>
        <div class="clear" style="margin-bottom:20px;"></div>
        <div class="grid_24" style="text-align:center;">
            <? 
            $i = 0;
            foreach ($guidehero as $key => $value) {
                $i++;
                if($i == 1){
                    echo '<div class="grid_8 alpha build" style="position:relative;">';
                }
                elseif($i == 3){
                    echo '<div class="grid_8 omega build" style="position:relative;">';
                    
                }
                else{
                    echo '<div class="grid_8 build" style="position:relative;">';
                }
                ?>
                    <a href="<?= Yii::app()->createUrl('guide/builds', array('id' => $value->guideHeroId)); ?>">
                        <? if($value->hero->type == 1)
                            echo '<img src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_str.png" style="z-index:1;position:absolute;width:25px;top:5px;left:5px;"/>';
                            elseif($value->hero->type == 2)
                                echo '<img src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_agi.png" style="z-index:1;position:absolute;width:25px;top:5px;left:5px;"/>';
                            else
                                echo '<img src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_int.png" style="z-index:1;position:absolute;width:25px;top:5px;left:5px;"/>';
                            ?>

                    <img src="<?=Hero::model()->findByPk($value->heroId)->image;?>" class="herobuildimage"/>
                    <div class="textbuild" ><?=Hero::model()->findByPk($value->heroId)->name;?><br>สาย : <?=$value->name;?></div>
                    </a>
                </div>
                <? if($i == 3){
                        echo '<div class="clear" style="margin-bottom:10px;"></div>';
                        $i = 0;
                    }
                ?>
            <?}?>
            
            
       
        </div>
</div></div>