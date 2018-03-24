<h1>Manage Monsters</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'monster-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        array(
            'name' => 'rare',
            'value' => array($model, 'convertRare'),
            'filter' => $model->getRareArray(),
        ),
        array(
            'name' => 'elementId',
            'value' => '$data->element->nameEN',
            'filter' => CHtml::listData(Element::model()->findAll(array('order' => 'nameEN ASC')), 'elementId', 'nameEN'),
        ),
        array(
            'name' => 'raceId',
            'value' => '$data->race->nameEN',
            'filter' => CHtml::listData(Race::model()->findAll(array('order' => 'nameEN ASC')), 'raceId', 'nameEN'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
