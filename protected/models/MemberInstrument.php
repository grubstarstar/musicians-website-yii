<?php

/**
 * This is the model class for table "member_instrument".
 *
 * The followings are the available columns in table 'member_instrument':
 * @property integer $member_id
 * @property integer $instrument_id
 * @property integer $skillLevel
 */
class Instrument2Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Instrument2Member the static model class
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
		return 'member_instrument';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, instrument_id', 'required'),
			array('member_id, instrument_id, skillLevel', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, instrument_id, skillLevel', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'member_id' => 'Member',
			'instrument_id' => 'Instrument',
			'skillLevel' => 'Skill Level',
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
		$criteria->compare('instrument_id',$this->instrument_id);
		$criteria->compare('skillLevel',$this->skillLevel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}