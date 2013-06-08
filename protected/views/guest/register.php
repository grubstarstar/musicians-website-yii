<?php $this->pageTitle=Yii::app()->name; ?>

<p>Please register as a member before you <?php echo $action ?> a <?php echo $group ?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
	
	<div class="row">
        <?php echo $form->label($model,'fname'); ?>
        <?php echo $form->textField($model,'fname'); ?>
		<?php echo $form->error($model,'fname'); ?>
    </div>
	
    <div class="row">
        <?php echo $form->label($model,'lname'); ?>
        <?php echo $form->textField($model,'lname'); ?>
		<?php echo $form->error($model,'lname'); ?>
    </div>
	
    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
    </div>
	
	<div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
    </div>
	
	<div class="row">
        <?php echo CHtml::passwordField('confirm password'); ?>
    </div>
	
	<?php echo CHtml::hiddenField('group', $group); ?>
	<?php echo CHtml::hiddenField('action', $action); ?>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div>