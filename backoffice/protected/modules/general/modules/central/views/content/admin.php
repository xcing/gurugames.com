<?php
$this->breadcrumbs = array(
    'Contents' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Content', 'url' => array('index')),
    array('label' => 'Create Content', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('content-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Contents</h1>

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
    'id' => 'content-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => 'CHtml::image($data->image, $data->title, array("width"=>120))',
            'filter' => false,
        ),
        'shortDetail',
        /*array(
            'name' => 'Link',
            'value' =>  '$data->gameId != 0? "http://www.".$data->game->name.".gurugames.in.th/index.php?r=site/detail&contentId=" . $data->contentId : "http://www.gurugames.in.th/index.php?r=site/detail&contentId=" . $data->contentId',
            'filter' => false,
        ),*/
        array(
            'name' => 'userCreate',
            'value' => '$data->user->displayName',
            'filter' => CHtml::listData(User::model()->findAll(array('condition' => 'role = 1')), 'id', 'displayName'),
        ),
        'dateCreate',
        array(
            'name' => 'type',
            'value' => array($model, 'convertType'),
            'filter' => $model->getTypeArray(),
        ),
        array(
            'name' => 'pin',
            'type' => 'raw',
            'value' => '($data->pin == 1) ? "<i class=\'icon-pushpin\' style=\'color: red;\'> Pin</i>" : "<i class=\'icon-pushpin\' style=\'color: green;\'> Unpin</i>"',
            'filter' => $model->getPinArray(),
        ),
        array(
            'name' => 'active',
            'type' => 'raw',
            'value' => '($data->active == 1) ? "<i class=\'icon-ok-sign\' style=\'color: green;\'> Active</i>" : "<i class=\'icon-remove-sign\' style=\'color: red;\'> Inactive</i>"',
            'filter' => $model->getActiveArray(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
