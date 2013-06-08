<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bandID'); ?>
		<?php echo $form->textField($model,'bandID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groupID'); ?>
		<?php echo $form->textField($model,'groupID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'labelID'); ?>
		<?php echo $form->textField($model,'labelID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->