<?php
$this->breadcrumbs=array(
	'Record Labels'=>array('index'),
	$model->labelID,
);

$this->menu=array(
	array('label'=>'List RecordLabel', 'url'=>array('index')),
	array('label'=>'Create RecordLabel', 'url'=>array('create')),
	array('label'=>'Update RecordLabel', 'url'=>array('update', 'id'=>$model->labelID)),
	array('label'=>'Delete RecordLabel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->labelID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecordLabel', 'url'=>array('admin')),
);
?>

<h1>View RecordLabel #<?php echo $model->labelID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'labelID',
		'groupID',
	),
)); ?>
