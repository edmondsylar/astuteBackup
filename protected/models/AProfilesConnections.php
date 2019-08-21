<?php

/**
 * This is the model class for table "a_profiles_connections".
 *
 * The followings are the available columns in table 'a_profiles_connections':
 * @property string $profileConnectionUuid
 * @property string $principalProfileUuid
 * @property string $connectedProfileUuid
 * @property string $connectionUuid
 * @property string $connectionWeightUuid
 * @property string $connectionStartDate
 * @property string $connectionEndDate
 * @property string $status
 * @property string $updatedOn
 * @property string $updatedBy
 */
class AProfilesConnections extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_profiles_connections';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileConnectionUuid, principalProfileUuid, connectedProfileUuid, connectionUuid, connectionWeightUuid, connectionStartDate, connectionEndDate, status, updatedOn, updatedBy', 'required'),
			array('profileConnectionUuid, principalProfileUuid, connectedProfileUuid, connectionUuid, connectionWeightUuid, connectionStartDate, connectionEndDate, status, updatedBy', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profileConnectionUuid, principalProfileUuid, connectedProfileUuid, connectionUuid, connectionWeightUuid, connectionStartDate, connectionEndDate, status, updatedOn, updatedBy', 'safe', 'on'=>'search'),
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
			'profileConnectionUuid' => 'Profile Connection Uuid',
			'principalProfileUuid' => 'Principal Profile Uuid',
			'connectedProfileUuid' => 'Connected Profile Uuid',
			'connectionUuid' => 'Connection Uuid',
			'connectionWeightUuid' => 'Connection Weight Uuid',
			'connectionStartDate' => 'Connection Start Date',
			'connectionEndDate' => 'Connection End Date',
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

		$criteria->compare('profileConnectionUuid',$this->profileConnectionUuid,true);
		$criteria->compare('principalProfileUuid',$this->principalProfileUuid,true);
		$criteria->compare('connectedProfileUuid',$this->connectedProfileUuid,true);
		$criteria->compare('connectionUuid',$this->connectionUuid,true);
		$criteria->compare('connectionWeightUuid',$this->connectionWeightUuid,true);
		$criteria->compare('connectionStartDate',$this->connectionStartDate,true);
		$criteria->compare('connectionEndDate',$this->connectionEndDate,true);
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
	 * @return AProfilesConnections the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}