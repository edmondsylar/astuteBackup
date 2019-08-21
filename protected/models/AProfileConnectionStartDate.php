<?php

/**
 * This is the model class for table "a_profile_connection_start_date".
 *
 * The followings are the available columns in table 'a_profile_connection_start_date':
 * @property integer $profileConnectionStartDateUuid
 * @property integer $profileConnectionUuid
 * @property string $startDate
 * @property string $status
 * @property string $updatedOn
 * @property string $updatedBy
 */
class AProfileConnectionStartDate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_profile_connection_start_date';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileConnectionStartDateUuid, profileConnectionUuid, startDate, updatedOn, updatedBy', 'required'),
			array('profileConnectionStartDateUuid, profileConnectionUuid', 'numerical', 'integerOnly'=>true),
			array('startDate, updatedBy', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profileConnectionStartDateUuid, profileConnectionUuid, startDate, status, updatedOn, updatedBy', 'safe', 'on'=>'search'),
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
			'profileConnectionStartDateUuid' => 'Profile Connection Start Date Uuid',
			'profileConnectionUuid' => 'Profile Connection Uuid',
			'startDate' => 'Start Date',
			'status' => 'Status',
			'updatedOn' => 'Updated On',
			'updatedBy' => 'Updated By',
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

		$criteria->compare('profileConnectionStartDateUuid',$this->profileConnectionStartDateUuid);
		$criteria->compare('profileConnectionUuid',$this->profileConnectionUuid);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AProfileConnectionStartDate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
