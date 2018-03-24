<div class="content page1">
    <div class="container_24">
        <div class="grid_24" style="margin:20px;">
            <h3>Wallpaper</h3>
            <? foreach ($images as $image) { ?>
                <div class="grid_9" style="margin:30px 50px;">
                    <a href="<?=Yii::app()->params['mainPath'];?>/images/upload/eos/wallpaper/<?= $image; ?>" target="_blank">
                        <img src="<?=Yii::app()->params['mainPath'];?>/images/upload/eos/wallpaper/<?= $image; ?>" alt="EOS Wallpaper"/>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
</div>