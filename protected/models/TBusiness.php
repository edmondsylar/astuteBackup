<?php

/**
 * This is the model class for table "t_business".
 *
 * The followings are the available columns in table 't_business':
 * @property string $businessUuid
 * @property string $businessName
 * @property string $businessTypeUuid
 * @property string $registrationNumber
 * @property string $registrationCountryid
 * @property string $registrationDate
 * @property string $updatedOn
 * @property string $updatedBy
 * @property string $status
 */
class TBusiness extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_business';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('businessUuid, businessName, businessTypeUuid, registrationNumber, registrationCountryid, registrationDate, updatedOn, updatedBy', 'required'),
			array('businessUuid, businessTypeUuid, registrationCountryid, updatedBy', 'length', 'max'=>191),
			array('businessName', 'length', 'max'=>100),
			array('registrationNumber', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('businessUuid, businessName, businessTypeUuid, registrationNumber, registrationCountryid, registrationDate, updatedOn, updatedBy, status', 'safe', 'on'=>'search'),
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
			'businessUuid' => 'Business Uuid',
			'businessName' => 'Business Name',
			'businessTypeUuid' => 'Business Type Uuid',
			'registrationNumber' => 'Registration Number',
			'registrationCountryid' => 'Registration Countryid',
			'registrationDate' => 'Registration Date',
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

		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('businessName',$this->businessName,true);
		$criteria->compare('businessTypeUuid',$this->businessTypeUuid,true);
		$criteria->compare('registrationNumber',$this->registrationNumber,true);
		$criteria->compare('registrationCountryid',$this->registrationCountryid,true);
		$criteria->compare('registrationDate',$this->registrationDate,true);
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
	 * @return TBusiness the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
