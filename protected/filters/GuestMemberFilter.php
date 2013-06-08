<?php

class GuestMemberFilter extends CFilter
{
	// The url to redirect guests to 
	public $redirectUrl;
	
	// The filter will not be applied to controller routes that match these regexes
	public $routeExceptionsRegex;

	public function init() 
	{
		$this->redirectUrl = Yii::app()->createUrl('guest');
		$this->routeExceptionsRegex = array(
			'guest'
		);
		parent::init();
	}
	
	protected function preFilter($filterChain) {
		// If they are a guest and the requested url is not in the list, then redirect them to the guest home page
		if(Yii::app()->user->isGuest && !array_filter($this->routeExceptionsRegex, function ($a) { return preg_match("/$a/", Yii::app()->getController()->route); }))
		{
			Yii::app()->controller->redirect($this->redirectUrl, true);
		}
		else
		{
			return true;
		}
	}
	protected function postFilter($filterChain) {
		// nothing needed yet
	}
}