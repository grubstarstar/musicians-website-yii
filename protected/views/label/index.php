<?php
$this->breadcrumbs=array(
	'Record Labels',
);

$this->menu=array(
	array('label'=>'Create RecordLabel', 'url'=>array('create')),
	array('label'=>'Manage RecordLabel', 'url'=>array('admin')),
);
?>

<h1>Record Labels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
