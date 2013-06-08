<?php
/* @var $this EventController */
/* @var $data Event */

$bands = $event->bands;

?>

<div class="view">

	<b><?php echo CHtml::encode($event->getAttributeLabel('promoter')); ?>:</b>
	<?php echo CHtml::encode($event->promoter->group->name); ?>
	<br />

	<b><?php echo CHtml::encode($event->getAttributeLabel('event_name')); ?>:</b>
	<?php echo CHtml::encode($event->event_name); ?>
	<br />

	<b><?php echo CHtml::encode($event->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode($event->startFormatted); ?>
	<br />

	<b><?php echo CHtml::encode($event->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($event->endFormatted); ?>
	<br />

<?php if($bands): ?>
	<b>Artists:</b>
	<ul class="view_mode">
<?php foreach ($bands as $band): ?>
		<li><?php echo CHtml::encode($band->group->name); ?> </li>
<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php
	echo CHtml::activeDropDownList(
		$event, 'bands', CHtml::listData(Band::model()->findAll(), 'id', 'name'),
		array(
			'multiple' => 'multiple',
			'class' => 'edit_mode',
		));
?>

<?php echo CHtml::ajaxLink(
				// text
				"Remove Song",
				// url
				array('event/delete', 'id' => $event->id),
				// ajax options 
				array(
					'context'=>'js:this',
					'dataType'=>'JSON',
					'beforeSend'=>'function() {
						$(this).addClass("loading");
					}',
					'success'=>'function(data) {
						if(data.deleted) {
							$(this).closest(".item_container").slideUp();
						}
					}',
					'error'=>'function(jqXHR, textStatus, errorThrown) {
						alert(textStatus + " " + errorThrown);
					}',
					'complete'=>'function(jqXHR, textStatus) {
						$(this).removeClass("loading");
					}'

				),
				// html options
				array(
					'class'=>"edit_mode delete_button"
				)
			);
?>

</div>