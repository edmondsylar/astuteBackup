<?php

/**
 * This is the model class for table "a_service_intelligence".
 *
 * The followings are the available columns in table 'a_service_intelligence':
 * @property string $serviceIntelligenceUuid
 * @property string $serviceUuid
 * @property string $intelligenceUuid
 * @property string $status
 * @property string $updatedBy
 * @property string $updatedOn
 */
class AServiceIntelligence extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_service_intelligence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serviceIntelligenceUuid, serviceUuid, intelligenceUuid, updatedBy, updatedOn', 'required'),
			array('serviceIntelligenceUuid, serviceUuid, intelligenceUuid, updatedBy', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('serviceIntelligenceUuid, serviceUuid, intelligenceUuid, status, updatedBy, updatedOn', 'safe', 'on'=>'search'),
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
			'serviceIntelligenceUuid' => 'Service Intelligence Uuid',
			'serviceUuid' => 'Service Uuid',
			'intelligenceUuid' => 'Intelligence Uuid',
			'status' => 'Status',
			'updatedBy' => 'Updated By',
			'updatedOn' => 'Updated On',
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

		$criteria->compare('serviceIntelligenceUuid',$this->serviceIntelligenceUuid,true);
		$criteria->compare('serviceUuid',$this->serviceUuid,true);
		$criteria->compare('intelligenceUuid',$this->intelligenceUuid,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AServiceIntelligence the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
