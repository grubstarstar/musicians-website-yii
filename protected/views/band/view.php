<?php
$this->breadcrumbs=array(
	'Bands'=>array('index'),
	$model->group->name,
);

$this->menu=array(
	array('label'=>'List Band', 'url'=>array('index')),
	array('label'=>'Create Band', 'url'=>array('create')),
	array('label'=>'Update Band', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Band', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Band', 'url'=>array('admin')),
);

$this->renderPartial('_summary', array('model' => $model));

$new_song = new Song();

$this->widget('application.MWidgets.MPanel', array(
	'model_class' => 'Song',
	'models'      => $model->group->songs,
	'view'        => '/song/_songview',
	'empty_view'  => '/song/_songview_empty',
	'edit_form'   => array(
		'/song/_form' => array(
				'model' => $new_song,
				'group_id' => $model->group->id,
				'isAjax' => true
			)
		),
	'delete'	=> 'deleteSong'
	// dataprovider for form???
)); ?>

CALENDAR
<?php echo get_class(Yii::app()->request); ?></br>
<?php echo exec("hostname") . getmypid(); ?>
SONGS + RATINGS


<?php if($model->events): ?>
	<b>Events:</b>
	<ul>
<?php foreach ($model->events as $event): ?>
		<li><?php echo CHtml::encode($event->event_name); ?> </li>
<?php endforeach; ?>
	</ul>
<?php endif; ?>