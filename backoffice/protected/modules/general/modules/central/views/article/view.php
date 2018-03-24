<?php
$this->breadcrumbs = array(
    'Articles' => array('index'),
    $model->articleId,
);

$this->menu = array(
    array('label' => 'List Article', 'url' => array('index')),
    array('label' => 'Create Article', 'url' => array('create')),
    array('label' => 'Update Article', 'url' => array('update', 'id' => $model->articleId)),
    array('label' => 'Delete Article', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->articleId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Article', 'url' => array('admin')),
);
?>

<h1>View Article #<?php echo $model->articleId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'articleId',
        'ordinal',
        array(
            'name' => 'type',
            'value' => $model->getTypeValue($model->type),
        ),
        array(
            'name' => 'contentId',
            'value' => $model->content->title,
        ),
        array(
            'name' => 'gameId',
            'value' => $model->game->name,
        ),
        array(
            'name' => 'showType',
            'value' => $model->getShowTypeValue($model->showType),
        ),
        array(
            'name' => 'commentType',
            'value' => $model->getCommentTypeValue($model->commentType),
        ),
        array(
            'name' => 'active',
            'value' => $model->getActiveValue($model->active),
        ),
    ),
));
?>
