<?php
$this->breadcrumbs = array(
    'Menus' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Menu', 'url' => array('index')),
    array('label' => 'Create Menu', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Menus</h1>

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
    'id' => 'menu-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        'image',
        'link',
        array(
            'name' => 'position',
            'value' => array($model, 'convertPosition'),
            'filter' => $model->getPositionArray(),
        ),
        array(
            'name' => 'gameId',
            'value' => '$data->gameId != 0? $data->game->name : ""',
            'filter' => CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'),
        ),
        array(
            'name' => 'parentMenuId',
            'value' => '$data->parentMenuId == 0 ? "-- None --" : $data->parentMenu->name',
            'filter' => CHtml::listData(Menu::model()->filterMenu(), 'menuId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('width' => '80px'),
            'template' => '{moveup} {movedown} {view} {update} {delete}',
            'buttons' => array(
                'moveup' => array(
                    'icon' => 'arrow-up',
                    'click' => "function(){
                                    $.fn.yiiGridView.update('menu-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.fn.yiiGridView.update('menu-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url' => 'Yii::app()->controller->createUrl("/general/central/menu/moveordinalup", array("id" => $data->menuId))',
                ),
                'movedown' => array(
                    'icon' => 'arrow-down',
                    'click' => "function(){
                                    $.fn.yiiGridView.update('menu-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.fn.yiiGridView.update('menu-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url' => 'Yii::app()->controller->createUrl("/general/central/menu/moveordinaldown", array("id" => $data->menuId))',
                ),
            ),
        ),
    ),
));
?>
