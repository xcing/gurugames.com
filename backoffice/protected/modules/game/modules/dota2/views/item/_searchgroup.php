<div class="form-actions">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'product-group-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    Location : 
    <?php echo CHtml::dropDownList('location', $location, Item::model()->getLocationArray()); ?>
    &nbsp;&nbsp;&nbsp;
    
    <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>
</div>