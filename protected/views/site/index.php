<?php Yii::import('application.lib.*'); ?>

<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php
	
	// $band = Band::model()->findByPk(2);

	// print $this->createUrl('site/page', array('view'=>'about')) . "</br>";
	
	// print $this->createUrl('member/view', array('id'=>18));
	// if(Member::current()) {
	// 	print Member::current()->email;
	// }
	// print Yii::app()->request->requestUri;
	// print "</br><br>";
	// print str_replace('\protected', '', Yii::app()->basePath);

	/*$memberReg = new MemberReg();
	if(!$memberReg->sendRegistrationEmail()) {
		echo $memberReg->ErrorMessage;
	} else {
		echo "Success";
	}*/
	

	$this->widget('application.MWidgets.MEventsCalendar');

?>