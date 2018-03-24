<?php
$this->breadcrumbs = array(
    'Articles' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Article', 'url' => array('index')),
    array('label' => 'Create Article', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('article-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>

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
    'id' => 'article-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'type',
            'value' => array($model, 'convertType'),
            'filter' => $model->getTypeArray(),
        ),
        array(
            'name' => 'contentId',
            'value' => '$data->contentId != ""? $data->content->title : ""',
            'filter' => CHtml::listData(Content::model()->findAll(array('order' => 'contentId DESC')), 'contentId', 'title'),
        ),
        array(
            'name' => 'gameId',
            'value' => '$data->gameId != 0? $data->game->name : ""',
            'filter' => CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'),
        ),
        array(
            'name' => 'active',
            'type' => 'raw',
            'value' => '($data->active == 1) ? "<i class=\'icon-ok-sign\' style=\'color: green;\'> Active</i>" : "<i class=\'icon-remove-sign\' style=\'color: red;\'> Inactive</i>"',
            'filter' => $model->getActiveArray(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('width' => '80px'),
            'template' => '{moveup} {movedown} {view} {update} {delete}',
            'buttons' => array(
                'moveup' => array(
                    'icon' => 'arrow-up',
                    'click' => "function(){
                                    $.fn.yiiGridView.update('article-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.fn.yiiGridView.update('article-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url' => 'Yii::app()->controller->createUrl("/general/central/article/moveordinalup", array("id" => $data->articleId))',
                ),
                'movedown' => array(
                    'icon' => 'arrow-down',
                    'click' => "function(){
                                    $.fn.yiiGridView.update('article-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.fn.yiiGridView.update('article-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url' => 'Yii::app()->controller->createUrl("/general/central/article/moveordinaldown", array("id" => $data->articleId))',
                ),
            ),
        ),
    ),
));
?>
