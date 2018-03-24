<script type="text/javascript" src="<?= Yii::app()->baseUrl; ?>/js/ias/jquery-ias.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Infinite Ajax Scroll configuration
        jQuery.ias({
            container: '.wrap', // main container where data goes to append
            item: '.item', // single items
            pagination: '.nav', // page navigation
            next: '.nav a', // next page selector
            loader: '<div style="text-align:center;"><img src="images/web/ajax-loader.gif"/></div>', // loading gif
            history: false, 
            triggerPageThreshold: 100000 // show load more if scroll more than this
        });
    });
</script>
<div class="content detail">
    <div class="container_24">
        <div class="grid_24">
            <h2 style="margin-bottom:5px;float:left;">คลิปเด็ด</h2>
            <div class="clear"></div>
        </div>
        <div class="wrap">
            <?php foreach ($videoArticleDatas as $news) { ?>
                <div class="grid_8 item" id="item-<?= $news->contentId; ?>" style="padding:15px;">
                    <div class="news">
                        <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>">
                            <div class="img_border">
                                <div class="catagory">
                                    <?
                                    $relatecategory = $news->relatecontentcategory;
                                    
                                    foreach ($relatecategory as $category) {
                                        ?>
                                        <div class="textcategory"><?= $category->category->name; ?></div>
                                    <? } ?>
                                </div>
                                <div class="img_border2"></div>
                                <img src="http://img.youtube.com/vi/<?=  $news->image; ?>/0.jpg" alt="<?= $news->title; ?>" class="img_inner" style="width:100%;">
                            </div> 
                            <div class="text1">
                                <?= $news->title; ?>
                            </div>
                            <div class="newsshortdetail">
                                <?= $news->shortDetail; ?> ...
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($next)) { ?>
                <div class="nav">
                    <a href='<?php echo Yii::app()->createUrl('site/video', array('p' => $next)); ?>'>Next</a>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
        <br /><br />
    </div>
</div>
