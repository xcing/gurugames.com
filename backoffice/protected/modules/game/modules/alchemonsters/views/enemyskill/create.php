<?php
$this->breadcrumbs = array(
    'Enemyskills' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Enemyskill', 'url' => array('index')),
    array('label' => 'Manage Enemyskill', 'url' => array('admin')),
);
?>

<h1>Create Enemyskill</h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allCondition' => $allCondition,
    'allConditionName' => $allConditionName,
));
?>