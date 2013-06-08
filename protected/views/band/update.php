<?php
$this->breadcrumbs=array(
	'Bands'=>array('index'),
	$band->bandID=>array('view','id'=>$band->bandID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Band', 'url'=>array('index')),
	array('label'=>'Create Band', 'url'=>array('create')),
	array('label'=>'View Band', 'url'=>array('view', 'id'=>$band->bandID)),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);
?>

<h1>Update Band <?php echo $band->bandID; ?></h1>

<?php echo $this->renderPartial('_form', array('group'=>$band->group,'band'=>$band,'label'=>$band->label)); ?>