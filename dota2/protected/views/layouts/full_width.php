<html lang="th">
    <?php $this->renderPartial('/layouts/header');?>
    <body>
        <?php $this->renderPartial('/layouts/menu');?>
        <div>
            <?php echo $content; ?>
        </div>
        <?php $this->renderPartial('/layouts/footer2'); ?>
    </body>
</html>