<?php
$this->breadcrumbs=array(
	'Monsters'=>array('index'),
	$model->monsterId=>array('view','id'=>$model->monsterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Monster','url'=>array('index')),
	array('label'=>'Create Monster','url'=>array('create')),
	array('label'=>'View Monster','url'=>array('view','id'=>$model->monsterId)),
	array('label'=>'Manage Monster','url'=>array('admin')),
);
?>

<h1>Update Monster <?php echo $model->monsterId; ?></h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allTalent' => $allTalent,
    'allTalentName' => $allTalentName,
));
?>