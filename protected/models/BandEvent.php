<?php

/**
 * This is the model class for table "band_event".
 *
 * The followings are the available columns in table 'band_event':
 * @property integer $band_id
 * @property integer $event_id
 * @property string $is_internal
 * @property string $band_name
 */
class Bands2Event extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bands2Event the static model class
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
		return 'band_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('band_id, event_id', 'required'),
			array('band_id, event_id', 'numerical', 'integerOnly'=>true),
			array('is_internal', 'length', 'max'=>1),
			array('band_name', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('band_id, event_id, is_internal, band_name', 'safe', 'on'=>'search'),
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
			'band_id' => 'Band',
			'event_id' => 'Event',
			'is_internal' => 'Is Internal',
			'band_name' => 'Band Name',
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

		$criteria->compare('band_id',$this->band_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('is_internal',$this->is_internal,true);
		$criteria->compare('band_name',$this->band_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}