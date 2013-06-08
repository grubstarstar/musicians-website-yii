<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property integer $promoter_id
 * @property string $event_name
 *
 * The followings are the available model relations:
 * @property Band[] $bands
 * @property Promoter $promoter
 */
class Event extends CActiveRecord
{
	/**
    * Saves the name, size, type and data of the uploaded file
    */
    public function beforeSave()
    {
    	if(parent::beforeSave()) {
	        if(isset($_REQUEST['Event']['to']))
	        {
				$this->to = strtotime($_REQUEST['Event']['to']);
				$this->isNewRecord = false;
				$this->saveAttributes(array('to'));
	        }

	        if(isset($_REQUEST['Event']['from']))
	        {
				$this->from = strtotime($_REQUEST['Event']['from']);
				$this->isNewRecord = false;
				$this->saveAttributes(array('from'));
	        }
	        return true;
	    } else {
	    	return false;
	    }
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promoter_id, event_name', 'required'),
			array('promoter_id', 'numerical', 'integerOnly'=>true),
			array('event_name', 'length', 'max'=>60),
			//array('to, from', 'type', 'type' => 'date', 'message' => '{attribute}: is not a date!', 'dateFormat' => 'yyyy-MM-dd hh:mm:ss'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, promoter_id, event_name', 'safe', 'on'=>'search'),
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
			'bands' => array(self::MANY_MANY, 'Band', 'band_event(event_id, band_id)'),
			'promoter' => array(self::BELONGS_TO, 'Promoter', 'promoter_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Event',
			'promoter_id' => 'Promoter',
			'event_name' => 'Event Name',
			'to' => 'To',
			'from' => 'From',
		);
	}

	public function behaviors(){
	        return array('CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior'));	// save MANY to MANY relations
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
		$criteria->compare('promoter_id',$this->promoter_id);
		$criteria->compare('event_name',$this->event_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getStart() {
		return new DateTime(date(DATE_RFC822, $this->from));
		//var_dump($dt->format('Y-m-d H:i:s'));
	}

	public function getEnd() {
		return new DateTime(date(DATE_RFC822, $this->to));
		//var_dump($dt->format('Y-m-d H:i:s'));
	}

	public function getStartFormatted() {
		return $this->start->format('Y-m-d H:i:s');
	}

	public function getEndFormatted() {
		return $this->end->format('Y-m-d H:i:s');
	}
}