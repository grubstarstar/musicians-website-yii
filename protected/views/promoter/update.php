<?php
/* @var $this PromoterController */
/* @var $model Promoter */

$this->breadcrumbs=array(
	'Promoters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Promoter', 'url'=>array('index')),
	array('label'=>'Create Promoter', 'url'=>array('create')),
	array('label'=>'View Promoter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Promoter', 'url'=>array('admin')),
);
?>

<h1>Update Promoter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>