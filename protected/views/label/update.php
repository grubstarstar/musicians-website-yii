<?php
$this->breadcrumbs=array(
	'Record Labels'=>array('index'),
	$model->labelID=>array('view','id'=>$model->labelID),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecordLabel', 'url'=>array('index')),
	array('label'=>'Create RecordLabel', 'url'=>array('create')),
	array('label'=>'View RecordLabel', 'url'=>array('view', 'id'=>$model->labelID)),
	array('label'=>'Manage RecordLabel', 'url'=>array('admin')),
);
?>

<h1>Update RecordLabel <?php echo $model->labelID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>