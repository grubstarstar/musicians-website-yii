<?php

/**
 * This is the model class for table "band".
 *
 * The followings are the available columns in table 'band':
 * @property integer $bandID
 * @property integer $groupID
 * @property integer $labelID
 *
 * The followings are the available model relations:
 * @property Artistgroup $group
 * @property RecordLabel $label
 * @property Event[] $events
 */
class MGroupBase extends CActiveRecord
{	
	/**
    * Saves the name, size, type and data of the uploaded file
    */
    public function afterSave()
    {
        if($file=CUploadedFile::getInstance($this->group,'profilePic'))
        {
			$savePath = sprintf("%s\\%s.%s", $this->group->dataFolder, 'profile_pic', $file->extensionName );
			$file->saveAs($savePath);
			$this->group->profile_pic_url = sprintf("%s/%s.%s", $this->group->dataUrl, 'profile_pic', $file->extensionName);
			$this->group->isNewRecord = false;
			$this->group->saveAttributes(array('profile_pic_url'));
        }
 
		return parent::afterSave();
    }
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Band the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function behaviors(){
	    return array('CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior'));	// save MANY to MANY relations
	}

	public function addMember($member_id=null) {
		if(!$member_id) {
			$member_id = Member::current()->id;
		}
		$gm = new GroupMember();
		$gm->member_id = $member_id;
		$gm->group_id = $this->group->id;
		$gm->is_internal = 1;
		$gm->save();

		// if(!$member_id) {
		// 	$member_id = Member::current()->id;
		// }
		// $gm = new GroupMember();
		// $gm->member_id = $member_id;
		// $gm->group_id = $this->group->id;
		// $gm->is_internal = 1;
		// $gm->save();
	}
}