<?php

/**
 * This is the model class for table "t_subscription_module_users".
 *
 * The followings are the available columns in table 't_subscription_module_users':
 * @property string $Uuid
 * @property string $serviceModuleUuid
 * @property string $serviceUuid
 * @property string $businessUuid
 * @property string $email
 * @property string $role
 * @property string $timeStamp
 */
class TSubscriptionModuleUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_subscription_module_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Uuid, serviceModuleUuid, serviceUuid, businessUuid, email, timeStamp', 'required'),
			array('Uuid, serviceModuleUuid, serviceUuid, email', 'length', 'max'=>250),
			array('businessUuid', 'length', 'max'=>25),
			array('role', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Uuid, serviceModuleUuid, serviceUuid, businessUuid, email, role, timeStamp', 'safe', 'on'=>'search'),
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
			'Uuid' => 'Uuid',
			'serviceModuleUuid' => 'Service Module Uuid',
			'serviceUuid' => 'Service Uuid',
			'businessUuid' => 'Business Uuid',
			'email' => 'Email',
			'role' => 'Role',
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

		$criteria->compare('Uuid',$this->Uuid,true);
		$criteria->compare('serviceModuleUuid',$this->serviceModuleUuid,true);
		$criteria->compare('serviceUuid',$this->serviceUuid,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSubscriptionModuleUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
