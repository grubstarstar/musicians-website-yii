<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'record-label-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'groupID'); ?>
		<?php echo $form->textField($model,'groupID'); ?>
		<?php echo $form->error($model,'groupID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->