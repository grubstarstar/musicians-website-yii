<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */

Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>true,
	'action'=> $model->isNewRecord ? array('event/create') : array('event/update', 'id'=>$model->id),
	'method'=>'post',
	//'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'promoter_id',array('value'=>$promoter_id)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_name'); ?>
		<?php echo $form->textField($model,'event_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'event_name'); ?>
	</div>

	<!--div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->dateField($model,'from'); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->dateField($model,'to'); ?>
		<?php echo $form->error($model,'to'); ?>
	</div-->

<?php
	$this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'from', //attribute name
        'mode'=>'datetime', //use "time","date" or "datetime" (default)
        'options'=>array() // jquery plugin options
    ));

    $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'to', //attribute name
        'mode'=>'datetime', //use "time","date" or "datetime" (default)
        'options'=>array() // jquery plugin options
    ));
?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->