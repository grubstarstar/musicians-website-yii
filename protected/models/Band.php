<?php

/**
 * This is the model class for table "band".
 *
 * The followings are the available columns in table 'band':
 * @property integer $band_id
 * @property integer $group_id
 * @property integer $label_id
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property RecordLabel $label
 * @property Event[] $events
 */
class Band extends MGroupBase
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Band the static model class
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
		return 'band';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id', 'required'),
			array('group_id, label_id', 'numerical', 'integerOnly'=>true),
			array('label_id', 'default', 'setOnEmpty' => true, 'value' => null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('band_id, group_id, label_id', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'group', 'group_id'),
			'label' => array(self::BELONGS_TO, 'label', 'label_id'),
			'events' => array(self::MANY_MANY, 'event', 'band_event(band_id, event_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Band',
			'group_id' => 'Group',
			'label_id' => 'Label',
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
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('label_id',$this->label_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getName() {
		return $this->group->name;
	}
}

