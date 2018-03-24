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
            <h2 style="font: 50px/50px 'thaisans_neuebold';">Heroes - ฮีโร่</h2>
        </div>
        <div class="grid_24" style="text-align:center;">
            <div class="grid_24 alpha omega">
                <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_str.png" style="float: left;"/>
                <div style="padding-left: 5px;height: 33px;vertical-align: middle;display: table-cell;font-weight: bold;">STRENGTH</div>
            </div>
            <div class="clear" style="margin-bottom:10px;"></div>
             
        
        <div class="grid_12 alpha">
          
            <!-- 1row of heroes-->
            <?   
            $i = 0;
            foreach ($allSTRrad as $key => $hero) {
                $i++;
                if($i == 1) 
                {
                    echo '<div class="grid_3 alpha hero">';
                }
                elseif($i == 4)
                {
                    echo '<div class="grid_3 omega hero">';

                    $i = 0;
                }
                else
                {
                       echo '<div class="grid_3 hero">';
                }

            ?>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" />
                <div class="darkwall"></div>
                <span class="heroname"><?=$hero->name;?></span>
            </a></div>


            <? if($i ==0)
            echo '<div class="clear"></div>';
             }?>
           
            <!-- end 1row of heroes-->
            

        </div>
<div class="grid_12 omega">
          
            <!-- 1row of heroes-->
          <?   
            $i = 0;
            foreach ($allSTRdire as $key => $hero) {
                $i++;
                if($i == 1) 
                {
                    echo '<div class="grid_3 alpha hero">';
                }
                elseif($i == 4)
                {
                    echo '<div class="grid_3 omega hero">';

                    $i = 0;
                }
                else
                {
                       echo '<div class="grid_3 hero">';
                }

            ?>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" />
                <div class="darkwall"></div>
                <span class="heroname"><?=$hero->name;?></span>
            </a></div>


            <? if($i ==0)
            echo '<div class="clear"></div>';
             }?>
            <!-- end 1row of heroes-->
           
          
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear" style="margin-bottom:20px;"></div>

        <div class="grid_24" style="text-align:center;">
             <div class="grid_24 alpha omega">
              <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_agi.png" style="float:left"; />
              <div style="padding-left: 5px;height: 33px;vertical-align: middle;display: table-cell;font-weight: bold;">AGILITY</div>
            </div>
            <div class="clear" style="margin-bottom:10px;"></div>
             
        
        <div class="grid_12 alpha">
         

            <!-- 1row of heroes-->
           <?   
            $i = 0;
            foreach ($allAGIrad as $key => $hero) {
                $i++;
                if($i == 1) 
                {
                    echo '<div class="grid_3 alpha hero">';
                }
                elseif($i == 4)
                {
                    echo '<div class="grid_3 omega hero">';

                    $i = 0;
                }
                else
                {
                       echo '<div class="grid_3 hero">';
                }

            ?>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" />
                <div class="darkwall"></div>
                <span class="heroname"><?=$hero->name;?></span>
            </a></div>


            <? if($i ==0)
            echo '<div class="clear"></div>';
             }?>
            <!-- end 1row of heroes-->
           

        </div>
<div class="grid_12 omega">
          
            <!-- 1row of heroes-->
           <?   
            $i = 0;
            foreach ($allAGIdire as $key => $hero) {
                $i++;
                if($i == 1) 
                {
                    echo '<div class="grid_3 alpha hero">';
                }
                elseif($i == 4)
                {
                    echo '<div class="grid_3 omega hero">';

                    $i = 0;
                }
                else
                {
                       echo '<div class="grid_3 hero">';
                }

            ?>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" />
                <div class="darkwall"></div>
                <span class="heroname"><?=$hero->name;?></span>
            </a></div>


            <? if($i ==0)
            echo '<div class="clear"></div>';
             }?>
            <!-- end 1row of heroes-->
           
          
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear" style="margin-bottom:20px;"></div>

        <div class="grid_24" style="text-align:center;">
             <div class="grid_24 alpha omega">
              <img src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_int.png"  style="float:left"; />
              <div style="padding-left: 5px;height: 33px;vertical-align: middle;display: table-cell;font-weight: bold;">INTELLIGENCE</div>
            </div>
            <div class="clear" style="margin-bottom:10px;"></div>
             
        
        <div class="grid_12 alpha">
         

            <!-- 1row of heroes-->
           <?   
            $i = 0;
            foreach ($allINTrad as $key => $hero) {
                $i++;
                if($i == 1) 
                {
                    echo '<div class="grid_3 alpha hero">';
                }
                elseif($i == 4)
                {
                    echo '<div class="grid_3 omega hero">';

                    $i = 0;
                }
                else
                {
                       echo '<div class="grid_3 hero">';
                }

            ?>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" />
                <div class="darkwall"></div>
                <span class="heroname"><?=$hero->name;?></span>
            </a></div>


            <? if($i ==0)
            echo '<div class="clear"></div>';
             }?>
            <!-- end 1row of heroes-->

        </div>
<div class="grid_12 omega">
          
            <!-- 1row of heroes-->
           <?   
            $i = 0;
            foreach ($allINTdire as $key => $hero) {
                $i++;
                if($i == 1) 
                {
                    echo '<div class="grid_3 alpha hero">';
                }
                elseif($i == 4)
                {
                    echo '<div class="grid_3 omega hero">';

                    $i = 0;
                }
                else
                {
                       echo '<div class="grid_3 hero">';
                }

            ?>
            <a href="<?= Yii::app()->createUrl('guide/heroes', array('id' => $hero->heroId)); ?>">
                <img src="<?=$hero->image;?>" />
                <div class="darkwall"></div>
                <span class="heroname"><?=$hero->name;?></span>
            </a></div>


            <? if($i ==0)
            echo '<div class="clear"></div>';
             }?>
            <!-- end 1row of heroes-->
          
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear" style="padding-bottom:40px;"></div>
        </div>
         </div>