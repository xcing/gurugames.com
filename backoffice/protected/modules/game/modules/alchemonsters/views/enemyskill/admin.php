<h1>Manage Enemyskills</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'enemyskill-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        array(
            'name' => 'enemyId',
            'value' => '$data->enemy->nameEN',
            'filter' => CHtml::listData(Enemy::model()->findAll(array('order' => 'nameEN ASC')), 'monsterId', 'nameEN'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
