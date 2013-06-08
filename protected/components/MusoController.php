<?php

class MusoController extends Controller
{	
	public function filters() {
		return array(
			array('application.filters.GuestMemberFilter - login'),
		);
	}
}