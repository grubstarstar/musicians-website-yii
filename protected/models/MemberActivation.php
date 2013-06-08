<?php

/**
 * This is the model class for table "member_activation".
 *
 * The followings are the available columns in table 'member_activation':
 * @property string $regkey
 * @property integer $member_id
 * @property string $variables
 *
 * The followings are the available model relations:
 * @property Member $member
 */
class MemberActivation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberActivation the static model class
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
		return 'member_activation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('regkey, member_id', 'required'),
			array('member_id', 'numerical', 'integerOnly'=>true),
			array('regkey', 'length', 'max'=>32),
			array('variables', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('regkey, member_id, variables', 'safe', 'on'=>'search'),
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
			'member' => array(self::BELONGS_TO, 'Member', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'regkey' => 'Registraion Key',
			'member_id' => 'Member',
			'variables' => 'Variables',
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

		$criteria->compare('regkey',$this->regkey,true);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('variables',$this->variables,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Generate a registration key
	 * @return string The key.
	 */
	static public function generateRegKey() {
		$hostname = exec("hostname");
		$pid = getmypid();
		$uid = uniqid(Yii::app()->params['passwordSalt'] . $hostname . $pid, true);
		return md5($uid);
	}
	
	/**
	 * a method with the same name as the variables field, which serializes and deserializes the array of parameters for storing in the DB field
	 * @return array the params.
	 */
	public function variables($params_assoc_array = '') {
		// TODO - check the validity of the strings being entered
		
		// serialize the array of params if setter
		if($params_assoc_array) {
			$var_string_arr = array();
			foreach($params_assoc_array as $k => $v) {
				$var_string_arr[] = sprintf("%s=%s", $k, $v);
			}
			$this->variables = implode(';', $var_string_arr);
			return $params_assoc_array;
		}
		// otherwise, return the deserialized params
		else {
			$params = array();
			foreach(explode(';', $this->variables) as $p) {
				list($k, $v) = explode('=', $p);
				$params[$k] = $v;
			}
			return $params;		
		}
	}
}