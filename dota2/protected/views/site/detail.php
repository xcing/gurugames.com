<div class="content detail">
    <div class="container_24">
        <div class="grid_24">
                    <div style="vertical-align:middle;border-bottom: 1px solid #5b6a7f;border-color: #e5e6e9 #dfe0e4 #d0d1d5;margin-bottom:10px;padding-bottom:5px"><h2 style="margin-bottom:15px" class="detailtitle"><?= $contentData->title; ?></h2>
                <img src="<?= $user->displayImage; ?>" style="border: 1px solid #D1D1D1;
float: left;
border-radius: 500px;
height: 40px;
width: 40px;"> 
                <div style="padding-left:5px;height: 40px;
vertical-align: middle;
display: table-cell;"> <span style="font-weight:bold;"><?= $user->displayName; ?></span> <img src="images/time.png" style="height:18px;padding-left:5px;" /> <?= DateTimeManager::DateThai($contentData->dateCreate); ?> 
                <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fgurugames.in.th%2Findex.php%3Fr%3Dsite%2Fdetail%26contentId%3D<?= $contentData->contentId; ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=463910590321509" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;width: 170px;margin-left:10px" allowTransparency="true"></iframe>
            </div></div>
         </div>
         <div class="clear"></div>
        <div class="grid_19">
           
            <?php if ($contentData->type == 3) { ?>
              
                    <div class="grid_5 alpha">
                        <div class="iconGame">
                            <img src="<?= $contentData->game->gameImage; ?>" style="min-width:175px;max-width: 175px;"/>
                            <span class="mask"></span>
                        </div>
                    </div>
                    <div class="grid_14 omega">
                        <div style="color:#cf0606;font-size:22px;margin:5px 0px 10px 0px;"><?= $contentData->game->name; ?></div>
                        <div style="margin-bottom:10px;">ภาษา : <?= LanguageManager::getLanguageValue($contentData->game->lang); ?></div>
                        <?php foreach ($platformData as $platform) { ?>
                            <?php if ($platform->platformId == 3) { ?>
                                <a href="<?= $platform->webDownload; ?>" target="_blank" style="margin-right:20px;">
                                    <img src="<?= Yii::app()->baseUrl; ?>/images/web/available_on_appstore.png" width="150px;"/>
                                </a>
                            <?php } else if ($platform->platformId == 4) { ?>
                                <a href="<?= $platform->webDownload; ?>" target="_blank">
                                    <img src="<?= Yii::app()->baseUrl; ?>/images/web/available_on_playstore.jpg" width="150px;"/>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="clear" style="margin-bottom:10px;"></div>
                
            <?php } ?>
            <?= $contentData->detail; ?><br>
            <div class="grid_5 alpha" style="padding: 5px;">
            <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fgurugames.in.th%2Findex.php%3Fr%3Dsite%2Fdetail%26contentId%3D<?= $contentData->contentId; ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=463910590321509" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;width: 170px;" allowTransparency="true"></iframe>
            </div>
            <div class="grid_14 omega" style="padding: 5px;">
            <span style="margin-left:5px;line-height:30px;"><b style="background-color: #CF0606;font: normal 12px/22px Arial, Helvetica, sans-serif;padding:5px;color:white;margin-right:10px;font-weight:bold;">TAGS: </b>
                <?php
                $i = 0;
                foreach ($relatetagDatas as $tagData) {
                    ?>
                    <a href="#" class="tagcontent"><?= $tagData->tag->name; ?></a>
                    <?php
                    $i++;
                }
                ?>
            </span>
            </div>
            <div class="clear" style="margin-bottom:10px;"></div>
            <br><br>
            <div class="author">
                <div class="grid_3 alpha" style="margin:5px 0px 5px 0px;text-align:center">
                    <div style="margin-bottom:5px">
                        <img src="<?= $user->displayImage; ?>" style="width:100px;border: 1px solid #D1D1D1">
                    </div>
                    <!-- <div style="text-align:center">
                    <? foreach ($relateusergameDatas as $key => $value) { ?>
                                <img src="<?= $value->game->iconPath; ?>" title="<?= $value->game->name; ?>" style="width:25px"/>
                    <? } ?>
                    </div> -->
                </div>
                <div class="grid_15 omega" style="min-height:100px;margin:5px 0px 5px 10px;">
                    <div style="margin-bottom:5px"><span style="font-weight:bold;">ผู้เขียน: <a href="#" style="color:#cf0606"><?= $user->displayName; ?></a></span></div>
                    <span ><?= $user->signature; ?></span>
                </div>
                <div class="clear"></div>
            </div>
            <h2 style="margin-bottom:5px;">Comments แสดงความเห็น</h2>
            <!--  <div class="grid_24 commentbox">
            <?php if ((Yii::app()->user->isGuest)) { ?>
                         <div style="display:inline;vertical-align:middle;">ไม่สามารถแสดงความเห็นได้ คุณยังไม่ได้เป็นสมาชิกกับเรา?   <a href="http://gurugames.in.th/index.php?r=site/login"><button>Login</button></a>  หรือ  <a href="<?= Yii::app()->createUrl('site/register'); ?>"><button>Register</button></a></div><?php } else {
                ?>
                         <form method="POST" action='<?= Yii::app()->createUrl('site/addcomment'); ?>' >
                             <textarea style="width:100%;height:100px;margin-bottom:5px;resize:none;" maxlength="500" id="detail" name="detail"></textarea>
                             <input type="hidden" id="contentId" name="contentId" value="<?= $contentData->contentId; ?>" />
                             <input type="hidden" id="userId" name="userId" value="5" />
                             <button type="submit">ส่งความเห็น</button> 
                         </form>    
                         <div style="display:inline;vertical-align:middle;">โดย : <?= Yii::app()->user->username; ?> <a href="<?= Yii::app()->createUrl('site/logout'); ?>"><button>Log out</button></a></div>
            <?php } ?>
            <?php
            foreach (Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
            }
            ?>
             </div>
             <div class="clear"></div>
            <?
            foreach ($commentDatas as $key => $value) {
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
                <? foreach ($relateusergameDatas as $relateusergame) { ?>
                                     <img src="<?= $relateusergame->game->iconPath; ?>" title="<?= $relateusergame->game->name; ?>" style="width:25px"/>
                <? } ?>
                         </div>
     
                         <div class="grid_20" style="min-height:100px;margin:5px 0px 5px 10px;">
                             <span>โดย: <a href="#"><?= $value->user->displayName; ?></a></span><br>
                             <span><?= $value->detail; ?></span>
                         </div>
                         <div class="clear"></div>
     
                     </div>
                     <div class="clear"></div>
            <? }
            ?> -->
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'gurugames'; // required: replace example with your forum shortname

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script');
                    dsq.type = 'text/javascript';
                    dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        </div>
        <div class="grid_5">
            <? if(count($relateArticleDatas) > 0 ){?>
            <div style="padding: 5px;
                 background: #fff;
                 border: 1px solid;
                 border-color: #e5e6e9 #dfe0e4 #d0d1d5;
                 -webkit-border-radius: 3px;margin-bottom:10px;">
                <h2 style="color:white;background-color:#CF0606;padding:10px;text-align:center;font-size:20px">เรื่องที่เกี่ยวข้อง</h2>
                <ul>
                    <?php foreach ($relateArticleDatas as $news) { ?>
                        <li class="lastestnews"><a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->content->contentId)); ?>">
                                <img src="<?=  $news->content->image; ?>" alt="<?= $news->content->title; ?>" class="img_inner" style="width:100%;">
                                <div style="width:100%;"><?= $news->content->title; ?></div></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <? if(count($lastestArticleDatas) > 0 ){?>
            <div style="padding: 5px;
                 background: #fff;
                 border: 1px solid;
                 border-color: #e5e6e9 #dfe0e4 #d0d1d5;
                 -webkit-border-radius: 3px;">
                <h2 style="color:white;background-color:#CF0606;padding:10px;text-align:center;font-size:20px">เรื่องอื่นๆล่าสุด</h2>
                <ul>
                    <?php foreach ($lastestArticleDatas as $news) { ?>
                        <li class="lastestnews"><a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>">
                                <img src="<?=  $news->image; ?>" alt="<?= $news->title; ?>" class="img_inner" style="width:100%;">
                                <div style="width:100%;"><?= $news->title; ?></div></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
        <div class="clear" style="padding-bottom:20px;"></div>


    </div>
    <!-- <div class="bottom_block" style="margin-top:10px;">
        <div class="container_24">


            <div class="grid_8">
            </div>
            
            <div class="clear"></div>
        </div>
    </div> -->
</div>
