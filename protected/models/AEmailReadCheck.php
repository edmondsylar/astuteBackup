<?php

/**
 * This is the model class for table "a_email_read_check".
 *
 * The followings are the available columns in table 'a_email_read_check':
 * @property string $emailRecieptUuid
 * @property string $emailRecipient
 * @property string $emailSender
 * @property string $track_code
 * @property string $status
 * @property string $timeStamp
 */
class AEmailReadCheck extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_email_read_check';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emailRecieptUuid, emailRecipient, emailSender, track_code, timeStamp', 'required'),
			array('emailRecieptUuid, track_code', 'length', 'max'=>25),
			array('emailRecipient, emailSender', 'length', 'max'=>50),
			array('status', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('emailRecieptUuid, emailRecipient, emailSender, track_code, status, timeStamp', 'safe', 'on'=>'search'),
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
			'emailRecieptUuid' => 'Email Reciept Uuid',
			'emailRecipient' => 'Email Recipient',
			'emailSender' => 'Email Sender',
			'track_code' => 'Track Code',
			'status' => 'Status',
			'timeStamp' => 'Time Stamp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('emailRecieptUuid',$this->emailRecieptUuid,true);
		$criteria->compare('emailRecipient',$this->emailRecipient,true);
		$criteria->compare('emailSender',$this->emailSender,true);
		$criteria->compare('track_code',$this->track_code,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AEmailReadCheck the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
