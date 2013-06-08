<?php

Yii::import('application.lib.*');

class GuestController extends MusoController
{	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/guest/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
	/**
	 * Registering a new member account
	 * @param string $group 'band' / 'promoter' / 'producer' / 'label' / 'solo' is solo artist
	 * @param integer $create whether a new group is to be created or an existing group joined
	 */
	public function actionRegister($group = 'solo', $action = 'create')
	{
		// error if $group is not in 'band' / 'promoter' / 'producer' / 'label' / 'solo'
		// *To do*
	
		$model=new Member;

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			$model->password = Member::model()->hashword($_POST['Member']['password']);
			$model->status = 'inactive';
			if($model->save()) {
				// save the user, add entry in userRegistration table, send email
				$memberReg = new MemberReg(
					$model->id,
					array('group'=>$group, 'action'=>$action)
				);
				print Member::model()->hashword($_POST['Member']['password']);
				$memberReg->sendRegistrationEmail();
				$this->render('thank_you_for_registering');
				Yii::app()->end();
			}
		}

		$this->render('register', array('model'=>$model, 'group'=>$group, 'action'=>$action));
	}
	
	/**
	 * activates the account based on the key produced in the actionRegister function
	 * @param string $k the activation key
	 */
	public function actionActivate($k)
	{
		// try to get record that has that key, error if not
		$act = MemberActivation::model()->find('regkey=:k', array(':k' => $k));
		if(!$act) {
			throw new CHttpException(400, "Invalid activation key");
			
		} else {
			// find member record and activate
			$member = Member::model()->findByPk($act->member_id);
			$member->status = 'active';
			$member->save();
			
			// log the member in
			$identity = new MemberIdentity($member->username,$member->password);
			$identity->authenticate();
			Yii::app()->user->login($identity);

			// send a 'your account has been activated' email
			
			// extract variables and carry out the appropriate action
			$vars = $act->variables();
			if($vars["group"] && $vars["action"]) {
				// if they are joining a group, get all the groups of that type so we can pass them to the view
				$params = null;
				if($vars["action"] == 'join') {
					$ActiveRecordClass = ucfirst($vars["group"]);
					// $ActiveRecordIdField = '$vars["group"] . 'ID'';
					$groups = $ActiveRecordClass::model()->findAll();
					foreach($groups as $group) {
						$params[$group->id] = $group->group->name;
					}
				}
				else if($vars["action"] == 'create') {
					
				}
				$this->render("activate_{$vars['group']}_{$vars['action']}", $params ? array("{$vars['group']}s" => $params) : array());
			}
		}
	}
}