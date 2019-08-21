<?php

/**
 * This is the model class for table "new_customer_address".
 *
 * The followings are the available columns in table 'new_customer_address':
 * @property integer $address_id
 * @property string $address_type
 * @property string $building
 * @property string $city
 * @property string $conkev_created_on
 * @property string $country
 * @property string $details
 * @property string $end_date
 * @property string $ownership
 * @property string $plot
 * @property string $rim
 * @property string $road
 * @property string $start_date
 * @property string $town
 * @property string $unit
 * @property integer $version
 * @property string $village
 *
 * The followings are the available model relations:
 * @property NewCustomerNewCustomerAddress $newCustomerNewCustomerAddress
 */
class NewCustomerAddress extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_customer_address';
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
			array('address_type, building, city, country, details, ownership, plot, rim, road, town, unit, village', 'length', 'max'=>255),
			array('conkev_created_on, end_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('address_id, address_type, building, city, conkev_created_on, country, details, end_date, ownership, plot, rim, road, start_date, town, unit, version, village', 'safe', 'on'=>'search'),
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
			'newCustomerNewCustomerAddress' => array(self::HAS_ONE, 'NewCustomerNewCustomerAddress', 'newCustomerAddresses_address_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'address_id' => 'Address',
			'address_type' => 'Address Type',
			'building' => 'Building',
			'city' => 'City',
			'conkev_created_on' => 'Conkev Created On',
			'country' => 'Country',
			'details' => 'Details',
			'end_date' => 'End Date',
			'ownership' => 'Ownership',
			'plot' => 'Plot',
			'rim' => 'Rim',
			'road' => 'Road',
			'start_date' => 'Start Date',
			'town' => 'Town',
			'unit' => 'Unit',
			'version' => 'Version',
			'village' => 'Village',
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

		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('address_type',$this->address_type,true);
		$criteria->compare('building',$this->building,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('ownership',$this->ownership,true);
		$criteria->compare('plot',$this->plot,true);
		$criteria->compare('rim',$this->rim,true);
		$criteria->compare('road',$this->road,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('version',$this->version);
		$criteria->compare('village',$this->village,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewCustomerAddress the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
