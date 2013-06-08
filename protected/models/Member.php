<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $member_id
 * @property string $fname
 * @property string $lname
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $profile_pic_url
 * @property string $remember_me
 *
 * The followings are the available model relations:
 * @property InstrumentLookup[] $instrumentLookups
 * @property Group[] $artistgroups
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, lname, username, email, password', 'required'),
			array('username', 'unique', 'message' => 'The username \'{value}\' has already been taken.'),
			array('email', 'unique', 'message' => 'The email address \'{value}\' is already in use.'),
			array('fname, username', 'length', 'max'=>20),
			array('lname, password', 'length', 'max'=>40),
			array('email, profile_pic_url', 'length', 'max'=>80),
			array('remember_me', 'length', 'max'=>32),
			array('status', 'in', 'on'=>'active, inactive'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, fname, lname, username, email, password, profile_pic_url, remember_me', 'safe', 'on'=>'search'),
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
			'instrumentLookups' => array(self::MANY_MANY, 'InstrumentLookup', 'member_instrument(member_id, instrument_id)'),
			'groups' => array(self::MANY_MANY, 'Group', 'group_member(member_id, group_id)'),
			'activation' => array(self::MANY_MANY, 'MemberActivation', 'member_activation(member_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Member',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'username' => 'Username',
			'email' => 'Email Address',
			'password' => 'Password',
			'profile_pic_url' => 'Profile Pic Url',
			'remember_me' => 'Remeber Me',
			'status' => 'Account Status'
		);
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

		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('profile_pic_url',$this->profile_pic_url,true);
		$criteria->compare('remember_me',$this->remember_me,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Hashes a password consistently using our preferred method for this app.
	 * @return string hashed password.
	 */
	public static function hashword($password) {
		return md5(Yii::app()->params['passwordSalt'] . $password);
	}
	
	/**
	 * Get the currently logged in member
	 * @return the Member instance or null.
	 */
	public static function current() {
		if(!Yii::app()->user->isGuest) {
			return Member::model()->findByPk(Yii::app()->user->id);
		}
	}

	public function getFullName() {
		return $this->fname . " " . $this->lname;
	}
}