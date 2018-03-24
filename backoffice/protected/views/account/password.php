<?php
$this->breadcrumbs = array(
    'My Account' => array('account/index'),
    'Change password'
);
?>
<h3>เปลี่ยนรหัสผ่าน</h3>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
}
?>
<?php
if ($key != 'success'):
    ?>
    <div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-password-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->labelEx($model, 'current_password'); ?>
        <?php echo $form->passwordField($model, 'current_password'); ?>



        <?php echo $form->labelEx($model, 'new_password'); ?>
        <?php echo $form->passwordField($model, 'new_password'); ?>
        <?php echo $form->error($model, 'new_password'); ?>

        <?php echo $form->labelEx($model, 'new_password_repeat'); ?>
        <?php echo $form->passwordField($model, 'new_password_repeat'); ?>
        <?php echo $form->error($model, 'new_password_repeat'); ?>



        <div class="form-actions">
            <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
    <?php
endif;
?>