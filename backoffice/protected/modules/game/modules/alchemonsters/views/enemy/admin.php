<h1>Manage Enemies</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'enemy-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        'nameTH',
        'hp',
        'atk',
        'def',
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
