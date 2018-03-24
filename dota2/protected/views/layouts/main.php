<html lang="th">
    <?php $this->renderPartial('/layouts/header');?>
    <body class="page1">
        <?php $this->renderPartial('/layouts/menu');?>
        <div class="main">
            <?php echo $content; ?>
            <?php $this->renderPartial('/layouts/footer'); ?>
        </div>
        <?php $this->renderPartial('/layouts/footer2'); ?>
    </body>
</html>