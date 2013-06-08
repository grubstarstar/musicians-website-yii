<?php

class GroupFilter extends CFilter
{	
	protected function preFilter($filterChain) {
		// If they don't have acces to this group return false
		$group_id = Band::model()->findByPk($filterChain->controller->actionParams['id'])->group->groupID;
		if(!in_array($group_id, array_map(function ($a) { return $a->groupID; }, Member::current()->groups))) {
			throw new CHttpException(404,'You are not authorised to view this page, because you are not a member of this group');
			return false;
		} else {
			return true;
		}	
	}
	
	protected function postFilter($filterChain) {
		// nothing needed yet
	}
}