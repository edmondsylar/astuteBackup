<?php

/**
 * This is the model class for table "new_legal_customer_occupation".
 *
 * The followings are the available columns in table 'new_legal_customer_occupation':
 * @property integer $occupation_id
 * @property string $city
 * @property string $conkev_created_on
 * @property string $country
 * @property string $customer
 * @property string $description
 * @property string $end_date
 * @property string $engagement_type
 * @property string $industry
 * @property string $prod
 * @property string $rim
 * @property string $start_date
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewLegalCustomerOccupation $newCustomerNewLegalCustomerOccupation
 */
class NewLegalCustomerOccupation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_legal_customer_occupation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('version', 'numerical', 'integerOnly'=>true),
			array('city, country, customer, description, engagement_type, industry, prod, rim', 'length', 'max'=>255),
			array('conkev_created_on, end_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('occupation_id, city, conkev_created_on, country, customer, description, end_date, engagement_type, industry, prod, rim, start_date, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewLegalCustomerOccupation' => array(self::HAS_ONE, 'NewCustomerNewLegalCustomerOccupation', 'newLegalCustomerOccupations_occupation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'occupation_id' => 'Occupation',
			'city' => 'City',
			'conkev_created_on' => 'Conkev Created On',
			'country' => 'Country',
			'customer' => 'Customer',
			'description' => 'Description',
			'end_date' => 'End Date',
			'engagement_type' => 'Engagement Type',
			'industry' => 'Industry',
			'prod' => 'Prod',
			'rim' => 'Rim',
			'start_date' => 'Start Date',
			'version' => 'Version',
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

		$criteria->compare('occupation_id',$this->occupation_id);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('engagement_type',$this->engagement_type,true);
		$criteria->compare('industry',$this->industry,true);
		$criteria->compare('prod',$this->prod,true);
		$criteria->compare('rim',$this->rim,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewLegalCustomerOccupation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
