<?php

/**
 * This is the model class for table "t_services".
 *
 * The followings are the available columns in table 't_services':
 * @property string $serviceUuid
 * @property string $serviceName
 * @property string $serviceDescription
 * @property string $businessUuid
 * @property string $updatedOn
 * @property string $updatedBy
 * @property string $status
 */
class TServices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serviceUuid, serviceName, serviceDescription, businessUuid, updatedOn, updatedBy', 'required'),
			array('serviceUuid, updatedBy', 'length', 'max'=>191),
			array('serviceName', 'length', 'max'=>50),
			array('businessUuid', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('serviceUuid, serviceName, serviceDescription, businessUuid, updatedOn, updatedBy, status', 'safe', 'on'=>'search'),
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
			'serviceUuid' => 'Service Uuid',
			'serviceName' => 'Service Name',
			'serviceDescription' => 'Service Description',
			'businessUuid' => 'Business Uuid',
			'updatedOn' => 'Updated On',
			'updatedBy' => 'Updated By',
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

		$criteria->compare('serviceUuid',$this->serviceUuid,true);
		$criteria->compare('serviceName',$this->serviceName,true);
		$criteria->compare('serviceDescription',$this->serviceDescription,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TServices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
