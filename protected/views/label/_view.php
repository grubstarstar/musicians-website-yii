<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('labelID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->labelID), array('view', 'id'=>$data->labelID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('groupID')); ?>:</b>
	<?php echo CHtml::encode($data->groupID); ?>
	<br />


</div>