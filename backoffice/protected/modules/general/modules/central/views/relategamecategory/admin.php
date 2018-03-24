<?php
$this->breadcrumbs = array(
    'Relate Game Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List RelateGameCategory', 'url' => array('index')),
    array('label' => 'Create RelateGameCategory', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('relate-game-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Relate Game Categories</h1>

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
    'id' => 'relate-game-category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'gameId',
            'value' => '$data->gameId != 0? $data->game->name : ""',
            'filter' => CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'),
        ),
        array(
            'name' => 'categoryId',
            'value' => '$data->category->name',
            'filter' => CHtml::listData(Category::model()->findAll(array('order' => 'categoryId DESC')), 'categoryId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
