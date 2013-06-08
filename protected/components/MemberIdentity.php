<?php

/**
 * MemberIdentity represents the data needed to identity a member.
 * It contains the authentication method that checks if the provided
 * data can identity the member.
 */
class MemberIdentity extends CUserIdentity
{
	private $_id;
	
	/**
	 * Authenticates a member.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$member = Member::model()->find('username=:username', array(':username' => $this->username));
		if(!isset($member) || $member->status != 'active') {
			echo "ERE";
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else if($member->password !== $this->password) {
			echo "pisswo";
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else {
			echo "err none";
			$this->errorCode = self::ERROR_NONE;
			$this->_id = $member->id;
		}
		echo $this->errorCode == self::ERROR_USERNAME_INVALID;
		return !$this->errorCode;
	}
	
	public function getId()
    {
        return $this->_id;
    }
}
