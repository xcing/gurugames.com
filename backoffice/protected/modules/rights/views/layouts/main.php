<?php $this->beginContent(Rights::module()->appLayout); ?>
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <h4><span class="color-orange"><img src="<?php echo Yii::app()->baseUrl ?>/images/logo.png"/>Rights</span></h4>
        </div>
    </div>
    <div class="row-fluid">
        <div class="content-navbar">
            <?php
            $this->renderPartial('/layouts/menu');
            ?>
        </div>
        <div id="rights" class="container-fluid">
            <?php if ($this->id !== 'install'): ?>

                <div id="menu">

                    <?php $this->renderPartial('/_menu'); ?>

                </div>

            <?php endif; ?>

            <?php $this->renderPartial('/_flash'); ?>

            <?php echo $content; ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>