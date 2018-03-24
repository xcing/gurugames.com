<div class="content page1">
    <div class="container_24">
        <div class="grid_19">
            <div style="vertical-align:middle;border-bottom: 1px solid #5b6a7f;margin-bottom:10px;padding-bottom:5px"><h2 style="margin-bottom:5px"><?=$contentData->title;?></h2>
                เมื่อวันที่ <?=DateTimeManager::DateThai($contentData->dateCreate);?> 
                <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Feos.gurugames.local%2Fsite%2Fdetail%2FcontentId%2F<?=$contentData->contentId;?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=463910590321509" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;width: 170px;margin-left:10px" allowTransparency="true"></iframe>
                <span style="margin-left:5px;">Tag: 
                    <?php $i =0;
                    foreach ($relatetagDatas as $tagData) { ?>
                    <?=$i == 0 ?  "" :  ", ";?><a href="#"><?=$tagData->tag->name;?></a>
                     <?php $i++;} ?>
                </span>
            </div>
            <?=$contentData->detail;?><br>
            <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Feos.gurugames.local%2Fsite%2Fdetail%2FcontentId%2F<?=$contentData->contentId;?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=463910590321509" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;width: 170px;" allowTransparency="true"></iframe>
            <span style="margin-left:5px;">Tag: 
                <?php $i =0;
                foreach ($relatetagDatas as $tagData) { ?>
                <?=$i == 0 ?  "" :  ", ";?><a href="#"><?=$tagData->tag->name;?></a>
                 <?php $i++;} ?>
            </span>
            <br><br>
        </div>
        <div class="grid_5">
            <h2>ข่าวล่าสุด</h2>
            <ul>
                <?php foreach ($newsArticleDatas as $news) { ?>
            	<li><a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>/<? echo str_replace(" ","-",$news->content->title); ?>">
                    <?= $news->content->title; ?></a></li>
            	 <?php } ?>


            </ul>
            <h2>บทความล่าสุด</h2>
            <ul>
            <?php foreach ($trickArticleDatas as $news) { ?>
                <li><a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>/<? echo str_replace(" ","-",$news->content->title); ?>">
                    <?= $news->content->title; ?></a></li>
                 <?php } ?>
             </ul>
        </div>
        <div class="clear"></div>
        <div class="author">

                <div class="grid_3" style="margin:5px 0px 5px 0px;text-align:center">
                    <div style="margin-bottom:5px">
                        <img src="<?=$user->displayImage;?>" style="width:100px;border: 1px solid #D1D1D1">
                    </div>
                    <div style="text-align:center">
                        <? foreach ($relateusergameDatas as $key => $value) {?>
                            <img src="<?=$value->game->iconPath;?>" title="<?=$value->game->name;?>" style="width:25px"/>
                        <?}?>

                    </div>
                </div>

                <div class="grid_20" style="min-height:100px;margin:5px 0px 5px 10px;">
                    <div style="margin-bottom:5px"><span>ผู้เขียน: <a href="#" style="color:#cf0606"><?=$user->displayName;?></a></span></div>
                    <span ><?=$user->signature;?></span>
                </div>
                <div class="clear"></div>


            </div>

    </div>
    <div class="bottom_block">
        <div class="container_24">
            <h2 style="margin-bottom:5px;">Comments แสดงความเห็น</h2>
            <div class="grid_24 commentbox">
            
            <?php if((Yii::app()->user->isGuest)){ ?>
                    <div style="display:inline;vertical-align:middle;">ไม่สามารถแสดงความเห็นได้ คุณยังไม่ได้เป็นสมาชิกกับเรา?   <a href="http://gurugames.local/index.php?r=site/login"><button>Login</button></a>  หรือ  <a href="<?= Yii::app()->createUrl('site/register');?>"><button>Register</button></a></div><?php }
                else { ?>
                    
               
            


            <form method="POST" action='<?=Yii::app()->createUrl('site/addcomment'); ?>' >
                <textarea style="width:100%;height:100px;margin-bottom:5px;resize:none;" maxlength="500" id="detail" name="detail"></textarea>
                <input type="hidden" id="contentId" name="contentId" value="<?=$contentData->contentId;?>" />
                <input type="hidden" id="userId" name="userId" value="5" />
                <button type="submit">ส่งความเห็น</button> 
            </form>    
                <div style="display:inline;vertical-align:middle;">โดย : <?=Yii::app()->user->username;?> <a href="<?= Yii::app()->createUrl('site/logout');?>"><button>Log out</button></a></div>
            
            <?php } ?>
            <?php
    foreach (Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
    }
    ?>
             </div>
             <div class="clear"></div>
<? foreach ($commentDatas as $key => $value) { 
    $relateusergameDatas = RelateUserGame::model()->findAllByAttributes(
                array(
            'userId' => $value->user->id,
                ), array(
            'order' => 'updatedDate DESC',
            'limit' => 3,
        ));
    ?>

                <div class="grid_24 commentbox">
                    <div class="grid_3" style="margin:5px 0px 5px 0px;text-align:center">
                        <div style="margin-bottom:10px">
                            <img src="/images/game-controller.png" style="width:100px;border: 1px solid #D1D1D1">
                        </div>
                        <? foreach ($relateusergameDatas as $relateusergame) {?>
                            <img src="<?=$relateusergame->game->iconPath;?>" title="<?=$relateusergame->game->name;?>" style="width:25px"/>
                        <?}?>
                    </div>

                    <div class="grid_20" style="min-height:100px;margin:5px 0px 5px 10px;">
                        <span>โดย: <a href="#"><?=$value->user->displayName;?></a></span><br>
                        <span><?=$value->detail;?></span>
                    </div>
                    <div class="clear"></div>
                    
                </div>
                <div class="clear"></div>
<? }

?>
            
          
            <div class="clear"></div>

        </div>
    </div>
</div>
