<div class="content page1">
    <div class="container_24">
        <div class="grid_24" style="margin:20px;">
            <h3>Screenshot</h3>
            <? foreach ($images as $image) { ?>
                <div class="grid_5" style="margin:10px;">
                    <a href="<?=Yii::app()->params['mainPath'];?>/images/upload/eos/screenshot/<?= $image; ?>" target="_blank">
                        <img src="<?=Yii::app()->params['mainPath'];?>/images/upload/eos/screenshot/<?= $image; ?>" alt="EOS Screenshot"/>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
</div>