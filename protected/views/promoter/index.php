<?php
/* @var $this PromoterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Promoters',
);

$this->menu=array(
	array('label'=>'Create Promoter', 'url'=>array('create')),
	array('label'=>'Manage Promoter', 'url'=>array('admin')),
);
?>

<h1>Promoters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
