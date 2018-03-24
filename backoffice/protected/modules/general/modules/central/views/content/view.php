<h1>View Content #<?php echo $model->contentId; ?></h1>

<a href="<?= Yii::app()->createUrl('general/central/content/update', array('id' => $model->contentId));?>">
    <button class="btn btn-primary">update</button>
</a>
<br /><br />

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'contentId',
        array(
            'name' => 'type',
            'value' => $model->getTypeValue($model->type),
        ),
        'title',
        'image',
        array(
            'name' => 'detail',
            'type' => 'raw',
            'value' => $model->detail,
        ),
        'shortDetail',
        array(
            'name' => 'gameId',
            'value' => $model->gameId != 0 ? $model->game->name : "",
        ),
        array(
            'name' => 'userCreate',
            'value' => $model->user->displayName,
        ),
        array(
            'name' => 'userUpdate',
            'value' => $model->user->displayName,
        ),
        'dateCreate',
        'dateUpdate',
        array(
            'name' => 'showType',
            'value' => $model->getShowTypeValue($model->showType),
        ),
        array(
            'name' => 'commentType',
            'value' => $model->getCommentTypeValue($model->commentType),
        ),
        array(
            'name' => 'pin',
            'value' => $model->getPinValue($model->pin),
        ),
        array(
            'name' => 'active',
            'value' => $model->getActiveValue($model->active),
        ),
    ),
));
?>
