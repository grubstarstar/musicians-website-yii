<?php
$this->breadcrumbs=array(
	'Record Labels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RecordLabel', 'url'=>array('index')),
	array('label'=>'Manage RecordLabel', 'url'=>array('admin')),
);
?>

<h1>Create RecordLabel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>