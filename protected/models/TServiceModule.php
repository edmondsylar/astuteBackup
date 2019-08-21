<?php

/**
 * This is the model class for table "t_service_module".
 *
 * The followings are the available columns in table 't_service_module':
 * @property integer $id
 * @property string $serviceModuleUuid
 * @property string $serviceModuleName
 * @property string $serviceUuid
 * @property string $serviceModuleDescription
 * @property string $userUuid
 * @property string $timeStamp
 * @property string $status
 */
class TServiceModule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_service_module';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serviceModuleUuid, serviceModuleName, serviceUuid, serviceModuleDescription, userUuid, timeStamp', 'required'),
			array('serviceModuleUuid, serviceUuid, userUuid', 'length', 'max'=>191),
			array('serviceModuleName', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, serviceModuleUuid, serviceModuleName, serviceUuid, serviceModuleDescription, userUuid, timeStamp, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'serviceModuleUuid' => 'Service Module Uuid',
			'serviceModuleName' => 'Service Module Name',
			'serviceUuid' => 'Service Uuid',
			'serviceModuleDescription' => 'Service Module Description',
			'userUuid' => 'User Uuid',
			'timeStamp' => 'Time Stamp',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('serviceModuleUuid',$this->serviceModuleUuid,true);
		$criteria->compare('serviceModuleName',$this->serviceModuleName,true);
		$criteria->compare('serviceUuid',$this->serviceUuid,true);
		$criteria->compare('serviceModuleDescription',$this->serviceModuleDescription,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TServiceModule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
