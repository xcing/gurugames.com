<?php $this->beginContent('//layouts/main'); ?>
<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <h4><span class="color-orange"></span></h4>
        </div>
    </div>
    <div class="content-body">
        <div class="container-fluid">
            <?php echo $content; ?>
        </div>   
    </div>
</div>
<?php $this->endContent(); ?>