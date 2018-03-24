<div class="form-actions">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'product-group-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    Type : 
    <?php echo CHtml::dropDownList('type', $type, Hero::model()->getTypeArray()); ?>
    &nbsp;&nbsp;&nbsp;
    
    Side : 
    <?php echo CHtml::dropDownList('side', $side, Hero::model()->getSideArray()); ?>
    &nbsp;&nbsp;&nbsp;
    
    <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>
</div>