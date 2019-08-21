<?php

/**
 * This is the model class for table "ac_business".
 *
 * The followings are the available columns in table 'ac_business':
 * @property string $businessUuid
 * @property string $businessName
 * @property string $businessType
 * @property string $country
 * @property string $updatedBy
 * @property string $updatedOn
 */
class AcBusiness extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ac_business';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('businessUuid, businessName, businessType, country, updatedBy, updatedOn', 'required'),
			array('businessUuid, businessName, businessType, country, updatedBy', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('businessUuid, businessName, businessType, country, updatedBy, updatedOn', 'safe', 'on'=>'search'),
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
			'businessType' => 'Business Type',
			'country' => 'Country',
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

		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('businessName',$this->businessName,true);
		$criteria->compare('businessType',$this->businessType,true);
		$criteria->compare('country',$this->country,true);
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
	 * @return AcBusiness the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
