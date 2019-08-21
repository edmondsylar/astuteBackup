<?php

/**
 * This is the model class for table "a_profile_dates".
 *
 * The followings are the available columns in table 'a_profile_dates':
 * @property string $profileDateUuid
 * @property string $profileUuid
 * @property string $status
 * @property string $dateTypeUuid
 * @property string $date
 * @property string $updateOn
 * @property string $updatedBy
 */
class AProfileDates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_profile_dates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileDateUuid, profileUuid, dateTypeUuid, date, updateOn, updatedBy', 'required'),
			array('profileDateUuid, profileUuid, dateTypeUuid, date, updatedBy', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profileDateUuid, profileUuid, status, dateTypeUuid, date, updateOn, updatedBy', 'safe', 'on'=>'search'),
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
			'profileDateUuid' => 'Profile Date Uuid',
			'profileUuid' => 'Profile Uuid',
			'status' => 'Status',
			'dateTypeUuid' => 'Date Type Uuid',
			'date' => 'Date',
			'updateOn' => 'Update On',
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

		$criteria->compare('profileDateUuid',$this->profileDateUuid,true);
		$criteria->compare('profileUuid',$this->profileUuid,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('dateTypeUuid',$this->dateTypeUuid,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('updateOn',$this->updateOn,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AProfileDates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
