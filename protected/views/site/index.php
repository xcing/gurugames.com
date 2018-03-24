
<div class="flexslider" >
    <ul class="slides">
        <?php foreach ($bannerMainDatas as $banner) { ?>
            <li>
                <?php if ($banner->link == null) { ?>
                    <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $banner->content->contentId)); ?>" alt="">
                    <?php } else {
                        ?>
                        <a href="<?= $banner->link; ?>" >
                        <?php } ?>
                        <img src="<?= Yii::app()->params['imagePath'] . $banner->image; ?>" alt="<?= $banner->content->title; ?>" />
                        <div class="catagory">
                            <?php
                            $relatecategory = $banner->content->relatecontentcategory;
                            foreach ($relatecategory as $category) {
                                ?>
                                <div class="textcategory"><?= $category->category->name; ?></div>
                            <? } ?>
                        </div>
                    </a>
            </li>
        <?php } ?>
    </ul>
</div>
<?
if ($bannerSide1->link != "")
    $link1 = $bannerSide1->link;
else
    $link1 = Yii::app()->createUrl('site/detail', array('contentId' => $bannerSide1->content->contentId));
if ($bannerSide2->link != "")
    $link2 = $bannerSide2->link;
else
    $link2 = Yii::app()->createUrl('site/detail', array('contentId' => $bannerSide2->content->contentId));
if ($bannerSide3->link != "")
    $link3 = $bannerSide3->link;
else
    $link3 = Yii::app()->createUrl('site/detail', array('contentId' => $bannerSide3->content->contentId));
?>
<div class="banner">
    <a href="<?= $link1; ?>" class="b1 maxheight">
        <div class="catagory">
            <?
            $relatecategory = $bannerSide1->content->relatecontentcategory;

            foreach ($relatecategory as $category) {
                ?>
                <div class="textcategory"><?= $category->category->name; ?></div>
            <? } ?>
        </div>
        <div class="box_inner"><span><?= $bannerSide1->content->title; ?></span></div>
    </a>
    <a href="<?= $link2; ?>" class="b2 maxheight">
        <div class="catagory">
            <?
            $relatecategory = $bannerSide2->content->relatecontentcategory;

            foreach ($relatecategory as $category) {
                ?>
                <div class="textcategory"><?= $category->category->name; ?></div>
            <? } ?></div>
        <div class="box_inner"><span><?= $bannerSide2->content->title; ?></span></div>
    </a>
    <a href="<?= $link3; ?>" class="b3 maxheight">
        <div class="catagory">
            <?
            $relatecategory = $bannerSide3->content->relatecontentcategory;

            foreach ($relatecategory as $category) {
                ?>
                <div class="textcategory"><?= $category->category->name; ?></div>
            <? } ?></div>
        <div class="box_inner"><span><?= $bannerSide3->content->title; ?></span></div>
    </a>
</div>
<style>
    .b1 {

        background: url(<?= $bannerSide1->image; ?>) 0 0 no-repeat;
    }
    .b2 {
        background: url(<?= $bannerSide2->image; ?>) 0 0 no-repeat;
    }
    .b3 {
        background: url(<?= $bannerSide3->image; ?>) 0 0 no-repeat;
    }
</style>
<!--=======content================================-->

<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
            <h2 style="margin-bottom:5px;float:left;">ข่าวล่าสุด</h2>
            <div class="fright" style="margin: 7px 0px -10px 10px;">
                <a href="<?= Yii::app()->createUrl('site/news'); ?>" class="btn">ดูข่าวทั้งหมด</a>
            </div>
            <div class="clear"></div>
        </div>

        <?php
        $i = 0;
        foreach ($newsArticleDatas as $news) {
            ?>
            <div class="grid_8" style="padding:15px;"><div class="news">
                    <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $news->contentId)); ?>">
                        <div class="img_border">
                            <div class="catagory">
                                <?
                                $relatecategory = $news->relatecontentcategory;

                                foreach ($relatecategory as $category) {
                                    ?>
                                    <div class="textcategory"><?= $category->category->name; ?></div>
                                <? } ?></div>
                            <div class="img_border2"></div>
                            <img src="<?= Yii::app()->params['imagePath'] . $news->image; ?>" alt="<?= $news->title; ?>" class="img_inner" style="width:100%;">
                        </div> 

                        <div class="text1">
                            <?= $news->title; ?>
                        </div>
                        <div class="newsshortdetail">
                            <?= $news->shortDetail; ?> ...
                        </div>
                    </a>
                </div></div>

        <?php } ?>
        <div class="clear"></div>

        <br /><br />
    </div>

    <div class="bottom_block">
        <div class="container_24">
            <div class="grid_24">
                <h2 style="margin-bottom:5px;float:left;">รีวิว</h2>
                <div class="fright" style="margin: 7px 0px -10px 10px;">
                    <a href="<?= Yii::app()->createUrl('site/review'); ?>" class="btn">ดูรีวิวทั้งหมด</a>
                </div>

            </div>
            <div class="clear"></div>
            <div class="grid_12" style="margin-bottom:10px">
                <div class="flexslider" >
                    <ul class="slides">
                        <?php foreach ($bannerDatas as $banner) { ?>
                            <li class="bannerreview">
                                <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $banner->contentId)); ?>">
                                    <img src="<?= Yii::app()->params['imagePath'] . $banner->image; ?>"  alt="<?= $banner->content->title; ?>"/>
                                    <div class="catagory">
                                        <?
                                        $relatecategory = $banner->content->relatecontentcategory;

                                        foreach ($relatecategory as $category) {
                                            ?>
                                            <div class="textcategory"><?= $category->category->name; ?></div>
                                        <? } ?></div>

                                </a>
                                <div class="flex-caption" style="width:100%;padding: 12px;height: 74px;"><?= $banner->content->title; ?></div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="grid_12">
                <?php foreach ($reviewArticleDatas as $review) { ?>
                    <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $review->contentId)); ?>">
                        <div class="review" style="margin-bottom:5px;position:relative;">
                            <div class="grid_5 alpha"><div class="screenreview">
                                </div><div class="catagory">
                                    <?
                                    $relatecategory = $review->relatecontentcategory;

                                    foreach ($relatecategory as $category) {
                                        ?>
                                        <div class="textcategory"><?= $category->category->name; ?></div>
                                    <? } ?></div>
                                <img src="<?= Yii::app()->params['imagePath'] . $review->image; ?>" alt="<?= $review->title; ?>" class="imgsidereview" />
                            </div>
                            <div class="grid_7 omega titlesidereview">

                                <?= $review->title; ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </a>
                <?php } ?>

            </div>

            <div class="clear"></div>

        </div>
    </div>

    <div class="bottom_block">
        <div class="container_24">
            <div class="grid_24">
                <h2 style="margin-bottom:5px;float:left;">ทริปและเทคนิค</h2>
                <div class="fright" style="margin: 7px 0px -10px 10px;">
                    <a href="<?= Yii::app()->createUrl('site/article'); ?>" class="btn">ดูบทความทั้งหมด</a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <?php
            $i = 0;
            foreach ($trickArticleDatas as $trick) {
                $i++;
                ?><a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $trick->contentId)); ?>" class="trick">
                    <div class="grid_12" style="background-color:black;

                         position: relative;
                         margin-right: 0px;margin-left: 0px;">
                        <div class="catagory">
                            <?
                            $relatecategory = $trick->relatecontentcategory;

                            foreach ($relatecategory as $category) {
                                ?>
                                <div class="textcategory"><?= $category->category->name; ?></div>
                            <? } ?></div>

                        <img src="<?= Yii::app()->params['imagePath'] . $trick->image; ?>" alt="<?= $trick->title; ?>" class="article">
                        <div class="tricktitle" >

                            <?= $trick->title; ?>
                        </div>


                                        <!-- <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $trick->contentId)); ?>" class="btn">read more</a> -->
                    </div></a>
                <?php if ($i % 2 == 0) { ?>
                    <div class="clear"></div>
                    <?
                }
            }
            ?>


        </div>
    </div>

<!--     <div class="bottom_block">
        <div class="container_24">
            <div class="grid_24">
                <h2 style="margin-bottom:5px;float:left;">บทความอ่านเพลิน</h2>
                <div class="fright" style="margin: 7px 0px -10px 10px;">
                    <a href="<?= Yii::app()->createUrl('site/article'); ?>" class="btn">ดูบทความทั้งหมด</a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <?php
            $i = 0;
            foreach ($trickArticleDatas as $trick) {
                $i++;
                ?><a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $trick->contentId)); ?>" class="trick">
                    <div style="border-color: #e5e6e9 #dfe0e4 #d0d1d5;
                         -webkit-border-radius: 3px;border: 1px solid;">
                        <div class="grid_8" style="background-color:black;

                             position: relative;
                             margin-right: 0px;margin-left: 0px;height: 150px;">
                            <div class="catagory">
                                <?
                                $relatecategory = $trick->relatecontentcategory;

                                foreach ($relatecategory as $category) {
                                    ?>
                                    <div class="textcategory"><?= $category->category->name; ?></div>
                                <? } ?></div>

                            <img src="<?= Yii::app()->params['imagePath'] . $trick->image; ?>" alt="<?= $trick->title; ?>" class="article" style="height: 150px;">


                                        <!-- <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $trick->contentId)); ?>" class="btn">read more</a> -->
                        <!--  </div>
                        <div class="grid_16" >
                            <div class="titlesidereview" style="padding-bottom: 5px;height:auto;"><?= $trick->title; ?></div><div style="padding: 10px;padding-top:5px"><?= $trick->shortDetail; ?>... </div>
                        </div
                </a>
                <?php ?>
                <div class="clear"></div></div>
        <? } ?>


    </div>
</div> -->

<div class="bottom_block">
    <div class="container_24">
        <div class="grid_24">
            <h2 style="margin-bottom:5px;float:left;">คลิปเด็ด</h2>
            <div class="fright" style="margin: 7px 0px -10px 10px;">
                <a href="<?= Yii::app()->createUrl('site/video'); ?>" class="btn">ดูคลิปเด็ดทั้งหมด</a>
            </div>

        </div>
        <div class="clear"></div>
        <?php
        $i = 0;
        foreach ($videoArticleDatas as $video) {
            $i++;
            ?>

            <div class="grid_8" style="margin:1px 1px 0px 0px;background-color: black;position:relative">
                <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $video->contentId)); ?>" class="videolink">
                    <div class="titlevideo"> <?= $video->title; ?></div>
                    <div class="catagory">
                        <?
                        $relatecategory = $video->relatecontentcategory;

                        foreach ($relatecategory as $category) {
                            ?>
                            <div class="textcategory"><?= $category->category->name; ?></div>
                        <? } ?></div>
                    <img src="http://img.youtube.com/vi/<?= Yii::app()->params['imagePath'] . $video->image; ?>/0.jpg" alt="<?= $video->title; ?>" style="margin-bottom:1px;" class="videoimg">
                    <img src="images/youtube-play-button-png-transparent.png" style="width:100px;position:absolute;top:35%;left:35%;" class="youtubeplay" />
                </a>
            </div>

            <?php
            if ($i == 3) {
                echo '<div class="clear"></div>';
            }
        }
        ?>
        <div class="clear"></div>

    </div>
</div>
</div>
