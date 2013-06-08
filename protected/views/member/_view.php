<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('memberID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->memberID), array('view', 'id'=>$data->memberID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($data->fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pswrd')); ?>:</b>
	<?php echo CHtml::encode($data->pswrd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profilePicURL')); ?>:</b>
	<?php echo CHtml::encode($data->profilePicURL); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('keepMe_hash')); ?>:</b>
	<?php echo CHtml::encode($data->keepMe_hash); ?>
	<br />

	*/ ?>

</div>