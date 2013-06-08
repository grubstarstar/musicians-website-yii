<div class="form">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
 
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary(array($group)); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($group,'name'); ?>
		<?php echo CHtml::activeTextField($group,'name'); ?>
		<?php echo CHtml::error($group,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($group,'profilePic'); ?>
		<?php echo CHtml::activeFileField($group,'profilePic'); ?>
		<?php echo CHtml::error($group,'profilePic'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activelabelEx($group,'website_url'); ?>
		<?php echo CHtml::activetextField($group,'website_url'); ?>
		<?php echo CHtml::error($group,'website_url'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activelabelEx($group,'about'); ?>
		<?php echo CHtml::activeTextArea($group,'about'); ?>
		<?php echo CHtml::error($group,'about'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activelabelEx($band,'label_id'); ?>
		<?php echo CHtml::activeDropDownList(
			$band,'label_id',
			CHtml::ListData(Label::model()->findAll(), 'id', 'group.name'),
			array('prompt'=>'--NONE--')
		); ?>
		<?php echo CHtml::error($band,'label_id'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($group->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->