<div class="content page1">
    <div class="container_24">
        <div class="grid_24" style="margin:20px;">
            <h3>Tips & Tricks</h3>
            <? foreach ($trickArticleDatas as $data) { ?>
                <div class="grid_24" style="margin:5px;">
                    <div class="grid_5" style="margin-right:5px;">
                        <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $data->contentId)); ?>">
                            <img src="<?= $data->content->image; ?>" alt="<?= $data->content->title; ?>"/>
                        </a>
                    </div>
                    <div class="grid_18">
                        <a href="<?= Yii::app()->createUrl('site/detail', array('contentId' => $data->contentId)); ?>">
                            <h1><?= $data->content->title; ?></h1>
                        </a>
                        <div><?= $data->content->shortDetail; ?></div>
                    </div>
                </div>
                <div class="clear"></div>
            <? } ?>
        </div>
    </div>
</div>