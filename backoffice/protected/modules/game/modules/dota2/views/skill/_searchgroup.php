<div class="form-actions">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'product-group-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    Hero : 
    <?php echo CHtml::dropDownList('heroId', $heroId, CHtml::listData(Hero::model()->findAll(array('order' => 'name ASC')), 'heroId', 'name')); ?>
    &nbsp;&nbsp;&nbsp;
    
    <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>
</div>