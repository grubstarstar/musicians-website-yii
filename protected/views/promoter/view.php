<?php
/* @var $this PromoterController */
/* @var $model Promoter */

$this->breadcrumbs=array(
	'Promoters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Promoter', 'url'=>array('index')),
	array('label'=>'Create Promoter', 'url'=>array('create')),
	array('label'=>'Update Promoter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Promoter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Promoter', 'url'=>array('admin')),
);
?>

<h1>View Promoter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_id',
	),
));

$new_event = new Event();

$this->widget('application.MWidgets.MPanel', array(
	'model_class' => 'Event',
	'models'      => $model->events,
	'view'        => '/event/_eventview',
	'empty_view'  => '/event/_view_empty',
	'edit_form'   => array(
		'/event/_form' => array(
				'model' => $new_event,
				'promoter_id' => $model->id,
				'isAjax' => true
			)
		),
	'delete'	=> 'deleteSong'
	// dataprovider for form???
));

?>
