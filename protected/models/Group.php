<?php

/**
 * This is the model class for table "artistgroup".
 *
 * The followings are the available columns in table 'artistgroup':
 * @property integer $id
 * @property string $name
 * @property string $profile_pic_url
 * @property string $website_url
 * @property string $about
 *
 * The followings are the available model relations:
 * @property Band[] $bands
 * @property GenreLookup[] $genreLookups
 * @property Member[] $members
 * @property Producer[] $producers
 * @property Promoter[] $promoters
 * @property Label[] $recordLabels
 */
class Group extends CActiveRecord
{
	public $profilePic; // saves the CUploadedFile object for profile_pic_url
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('name', 'length', 'max'=>40),
			array('profile_pic_url', 'length', 'max'=>80),
			array('website_url', 'length', 'max'=>60),
			array('about', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, profile_pic_url, website_url, about', 'safe', 'on'=>'search'),
			array('profilePic', 'file', 'types'=>'jpg, gif, png'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bands' => array(self::HAS_MANY, 'Band', 'group_id'),
			'genreLookups' => array(self::MANY_MANY, 'GenreLookup', 'group_genre(group_id, genre_id)'),
			'members' => array(self::MANY_MANY, 'Member', 'group_member(group_id, member_id)'),
			'producers' => array(self::HAS_MANY, 'Producer', 'group_id'),
			'promoters' => array(self::HAS_MANY, 'Promoter', 'group_id'),
			'recordLabels' => array(self::HAS_MANY, 'Label', 'group_id'),
			'songs' => array(self::HAS_MANY, 'Song', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Group',
			'name' => 'Name',
			'profile_pic_url' => 'Profile Pic Url',
			'website_url' => 'Website Url',
			'about' => 'About',
		);
	}


	// * DATA FOLDERS / URLS * //
	private $_dataFolder;
	private $_songsFolder;
	private $_dataUrl;
	private $_songsUrl;
	
	// The folder that contains the data for this group
	public function getDataFolder() {
		if(!$this->_dataFolder) {
			$this->_dataFolder = sprintf("%s\\static\\%s", str_replace('\protected', '', Yii::app()->basePath), $this->id);
			$this->createdir(sprintf("%s\\static", str_replace('\protected', '', Yii::app()->basePath)));
			$this->createdir($this->_dataFolder);
		}
		return $this->_dataFolder;
	}

	// The folder that contains the songs for this group
	public function getSongsFolder() {
		if(!$this->_songsFolder) {
			$this->_songsFolder = sprintf("%s\\songs", $this->dataFolder);
			$this->createdir($this->_songsFolder);
		}
		return $this->_songsFolder;
	}
	
	// The url to the data for this group
	public function getDataUrl() {
		if(!$this->_dataUrl) { return $this->_dataUrl = sprintf("%s/static/%s", str_replace('/protected', '', Yii::app()->baseUrl), $this->id); }
	}

	// The url to the songs for this group
	public function getSongsUrl() {
		if(!$this->_songsUrl) { return $this->_songsUrl = sprintf("%s/songs", $this->dataUrl); }
	}
	
	// create directory if it doesn't exist
	private function createdir($path) {
		if(!is_dir($path)) {
			return mkdir($path);
		}
	}

	// Get the sub type of this group Band / Producer ...
	public function getSubGroup() {
		$type = $this->type;
		if(!$type) {
			throw new CHttpException(500, $this->errors);
		}
		$type = ucfirst($type);
		return $type::model()->find("group_id=:group_id", array("group_id" => $this->id));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('profile_pic_url',$this->profile_pic_url,true);
		$criteria->compare('website_url',$this->website_url,true);
		$criteria->compare('about',$this->about,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}