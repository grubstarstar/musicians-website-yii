<?php $this->pageTitle=Yii::app()->name; ?>

<p>If you already are a member, please sign in. Otherwise register yourself as solo artist, start a new band, promoter, or record label group. You can also request to join any other group</p>
<ul>
	<h1>Solo Artists</h1>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'solo', 'action'=>'create')); ?>">Start as a solo artist</a></li>
</ul>
<ul>
	<h1>Bands</h1>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'band', 'action'=>'create')); ?>">Start a band</a></li>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'band', 'action'=>'join')); ?>">Join an existing band</a></li>
</ul>
<ul>
	<h1>Promoters</h1>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'promoter', 'action'=>'create')); ?>">Start as a music promoter</a></li>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'promoter', 'action'=>'join')); ?>">Join an existing promoter</a></li>
</ul>
<ul>
	<h1>Producers</h1>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'producer', 'action'=>'create')); ?>">Start a producer</a></li>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'producer', 'action'=>'join')); ?>">Join an existing producer</a></li>
</ul>
<ul>
	<h1>Record Labels</h1>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'recordLabel', 'action'=>'create')); ?>">Start a record label</a></li>
	<li><a href="<?php echo $this->createUrl('guest/register',array('group'=>'recordLabel', 'action'=>'join')); ?>">Join an existing record label</a></li>
</ul>

<?php
	$this->widget('application.MWidgets.MEventsCalendar');
?>