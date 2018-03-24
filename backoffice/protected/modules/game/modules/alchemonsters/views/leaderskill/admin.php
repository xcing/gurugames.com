<h1>Manage Leaderskills</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'leaderskill-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'detailEN',
        'detailTH',
        array(
            'name' => 'elementIdCondition',
            'value' => '$data->element->nameEN',
            'filter' => CHtml::listData(Element::model()->findAll(array('order' => 'nameEN ASC')), 'elementId', 'nameEN'),
        ),
        array(
            'name' => 'raceIdCondition',
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
