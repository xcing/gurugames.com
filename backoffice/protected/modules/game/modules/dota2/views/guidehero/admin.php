<?php
$this->breadcrumbs = array(
    'Guideheroes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Guidehero', 'url' => array('index')),
    array('label' => 'Create Guidehero', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('guidehero-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Guideheroes</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'guidehero-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array(
            'name' => 'heroId',
            'type' => 'raw',
            'value' => 'CHtml::image(Yii::app()->request->BaseUrl.$data->hero->image, $data->name, array("width"=>100))',
            'filter' => CHtml::listData(Hero::model()->findAll(array('order' => 'name ASC')), 'heroId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
