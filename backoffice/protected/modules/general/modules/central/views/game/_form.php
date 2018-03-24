<script>
    var gameId = '<?php echo $model->gameId; ?>';

    function insert_platform() {
        var platformId = $("#platformId").val();
        var webDownload = $("#webDownload").val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createAbsoluteUrl('general/central/game/ajax_insert_platform'); ?>",
            data: {
                gameId: gameId,
                platformId: platformId,
                webDownload: webDownload,
            },
            success: function() {
                $('#platform-grid').yiiGridView('update');
            },
        });
    }
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'game-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'subdomainName', array('class' => 'span5', 'maxlength' => 20)); ?>

<label><?= $model->getAttributeLabel('lang'); ?></label>
<?php
echo CHtml::dropDownList('Game[lang]', $model->lang, LanguageManager::getLanguageArray());
?>

<?php echo $form->textFieldRow($model, 'gameImage', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php if (isset($platformDataProvider)) { ?>
    <label>Platform</label>
    <?php
    echo CHtml::dropDownList('platformId', '', CHtml::listData(Platform::model()->findAll(array('order' => 'name')), 'platformId', 'name'));
    ?>
    Web Download
    <input type="text" name="webDownload" id="webDownload" class="span3"/>
    <button type="button" class="btn btn-primary" onclick="insert_platform();">Add</button>

    <div style="width:600px;">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'platform-grid',
            'dataProvider' => $platformDataProvider,
            'columns' => array(
                array(
                    'name' => 'platformId',
                    'value' => '$data->platformId != ""? $data->platform->name : ""',
                ),
                'webDownload',
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("general/central/game/delete_platform", array("gameId"=>$data->gameId, "platformId"=>$data->platformId))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
<?php } ?>

<?php //echo $form->textFieldRow($model, 'bgImage', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php //echo $form->textFieldRow($model, 'themeColorMain', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php //echo $form->textFieldRow($model, 'themeColor1', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php //echo $form->textFieldRow($model, 'themeColor2', array('class' => 'span5', 'maxlength' => 10)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
