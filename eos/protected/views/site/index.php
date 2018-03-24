<div class="slider_wrapper hidden-xs">
    <!-- <div id="camera_wrap" class="camera_wrap" style="display: block; margin-bottom: 74px; height: 412px;"><div class="camera_fakehover"><div class="camera_src camerastarted">
      <div data-src="images/slide.jpg"></div>
      <div data-src="images/slide1.jpg"></div>
      <div data-src="images/slide2.jpg"></div>
      <div data-src="images/slide3.jpg"></div>
    </div><div class="camera_target"><div class="cameraCont"><div class="cameraSlide cameraSlide_0 cameracurrent" style="visibility: visible; display: block; z-index: 999;"><img src="images/slide.jpg?1401423544325" class="imgLoaded" style="visibility: visible; height: 412px; margin-left: 0px; margin-top: 0px; position: absolute; width: 1010px;" data-alignment="" data-portrait="" width="1010" height="412"><div class="camerarelative" style="width: 1010px; height: 412px;"></div></div><div class="cameraSlide cameraSlide_1 cameranext" style="display: none; z-index: 1;"><img src="images/slide1.jpg?1401423545685" class="imgLoaded" data-alignment="" data-portrait="" width="1010" height="412" style="visibility: visible; height: 412px; margin-top: 0px; position: absolute; margin-left: 0px; width: 1010px;"><div class="camerarelative" style="width: 1010px; height: 412px;"></div></div><div class="cameraSlide cameraSlide_2" style="display: none; z-index: 1;"><img src="images/slide2.jpg?1401423555529" class="imgLoaded" data-alignment="" data-portrait="" width="1010" height="412" style="visibility: visible; height: 412px; margin-left: 0px; margin-top: 0px; position: absolute; width: 1010px;"><div class="camerarelative" style="width: 1010px; height: 412px;"></div></div><div class="cameraSlide cameraSlide_3" style="display: none; z-index: 1;"><img src="images/slide3.jpg?1401423564879" class="imgLoaded" data-alignment="" data-portrait="" width="1010" height="412" style="visibility: visible; height: 412px; margin-left: 0px; margin-top: 0px; position: absolute; width: 1010px;"><div class="camerarelative" style="width: 1010px; height: 412px;"></div></div><div class="cameraSlide cameraSlide_4 cameranext" style="z-index: 1; display: none;"><div class="camerarelative" style="width: 1010px; height: 412px;"></div></div></div></div><div class="camera_overlayer"></div><div class="camera_target_content"><div class="cameraContents"><div class="cameraContent cameracurrent" style="display: block;"></div><div class="cameraContent" style="display: none;"></div><div class="cameraContent" style="display: none;"></div><div class="cameraContent" style="display: none;"></div></div></div><div class="camera_bar" style="display: none; top: auto; height: 7px;"><span class="camera_bar_cont" style="opacity: 0.8; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px; background-color: rgb(34, 34, 34);"><span id="pie_0" style="opacity: 0.8; position: absolute; background-color: rgb(238, 238, 238); left: 0px; right: 0px; top: 2px; bottom: 2px; display: block;"></span></span></div><div class="camera_commands"><div class="camera_play" style="display: none;"></div><div class="camera_stop" style="display: block;"></div></div><div class="camera_prev"><span></span></div><div class="camera_next"><span></span></div></div><div class="camera_pag"><ul class="camera_pag_ul"><li class="pag_nav_0 cameracurrent" style="position:relative; z-index:1002"><span><span>0</span></span></li><li class="pag_nav_1" style="position:relative; z-index:1002"><span><span>1</span></span></li><li class="pag_nav_2" style="position:relative; z-index:1002"><span><span>2</span></span></li><li class="pag_nav_3" style="position:relative; z-index:1002"><span><span>3</span></span></li></ul></div><div class="camera_loader" style="display: none; visibility: visible;"></div></div>
    --></div>  
<div class="banner">
    <a href="#" class="b1 maxheight" style="height: 38px;"><div class="box_inner"><span>Character อาชีพภายในเกม</span></div></a>
    <a href="#" class="b2 maxheight" style="height: 38px;"><div class="box_inner"><span>Tips&Tricks แนะนำเทคนิคการเล่น</span></div></a>
    <a href="#" class="b3 maxheight" style="height: 38px;"><div class="box_inner"><span>Battle System ระบบการต่อสู้</span></div></a>
</div>
<!--=======content================================-->
<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
            <h2 style="margin-bottom:5px;">Latest Updates</h2><div class="fright"><a href="<?=Yii::app()->createUrl('site/news');?>" class="link1" style="font-size:15px;margin-bottom:15px;">อ่านข่าวทั้งหมด</a></div>
        </div>

        <?php foreach ($newsArticleDatas as $news) { ?>
            <div class="grid_6">
                <div class="img_border">
                    <img src="<?= $news->content->image != "" ? $news->content->image : "/images/noimage.png"; ?>" alt="<?= $news->content->title; ?>" class="img_inner">
                </div>
                <div class="text1">
                    <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>/<? echo str_replace(" ","-",$news->content->title); ?>">
                    <?= $news->content->title; ?></a>
                </div>
                <div style="width:230px;height:36px;overflow:hidden;position: relative;">
                    <?= $news->content->shortDetail; ?>
                </div>

                <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>/<? echo str_replace(" ","-",$news->content->title); ?>" class="btn">read more</a>
            </div>
        <?php } ?>
        <div class="clear"></div>
        
        <br /><br />
    </div>

    <div class="bottom_block">
        <div class="container_24">
            <div class="grid_24">
                <h2 style="margin-bottom:5px;">TIPS AND TRICKS</h2><div class="fright"><a href="<?=Yii::app()->createUrl('site/trick');?>" class="link1" style="font-size:15px;margin-bottom:15px;">อ่านเทคนิคทั้งหมด</a></div>
            </div>
            <?php foreach ($trickArticleDatas as $trick) { ?>
                <div class="grid_6">
                    <img src="<?= $trick->content->image; ?>" alt="<?= $trick->content->title; ?>" class="img_inner">
                    <div class="text1">
                        <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $trick->contentId)); ?>/<? echo str_replace(" ","-",$trick->content->title); ?>">
                            <?= $trick->content->title; ?></a>
                        </div>
                        <div style="width:230px;height:36px;overflow:hidden;position: relative;">
                            <?= $trick->content->shortDetail; ?>
                        </div>

                    <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $trick->contentId)); ?>/<? echo str_replace(" ","-",$trick->content->title); ?>" class="btn">read more</a>
                </div>
            <?php } ?>
            <div class="clear"></div>

        </div>
    </div>
</div>