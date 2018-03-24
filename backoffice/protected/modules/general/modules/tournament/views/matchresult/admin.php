<h1>Manage Matchresults</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'matchresult-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'result',
        'matchId',
        'screenshot',
        'game',
        'dateCreated',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
