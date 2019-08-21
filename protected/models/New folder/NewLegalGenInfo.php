<?php

/**
 * This is the model class for table "new_legal_gen_info".
 *
 * The followings are the available columns in table 'new_legal_gen_info':
 * @property integer $legal_gen_id
 * @property string $city_of_registration
 * @property string $conkev_created_on
 * @property string $country_of_registration
 * @property string $date_of_registration
 * @property integer $number_of_employees
 * @property string $registration_number
 * @property string $registration_type
 * @property string $rim
 * @property string $sector
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewLegalGenInfo $newCustomerNewLegalGenInfo
 */
class NewLegalGenInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_legal_gen_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number_of_employees', 'required'),
			array('number_of_employees, version', 'numerical', 'integerOnly'=>true),
			array('city_of_registration, country_of_registration, registration_number, registration_type, rim, sector', 'length', 'max'=>255),
			array('conkev_created_on, date_of_registration', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('legal_gen_id, city_of_registration, conkev_created_on, country_of_registration, date_of_registration, number_of_employees, registration_number, registration_type, rim, sector, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewLegalGenInfo' => array(self::HAS_ONE, 'NewCustomerNewLegalGenInfo', 'newLegalGeneralInformations_legal_gen_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'legal_gen_id' => 'Legal Gen',
			'city_of_registration' => 'City Of Registration',
			'conkev_created_on' => 'Conkev Created On',
			'country_of_registration' => 'Country Of Registration',
			'date_of_registration' => 'Date Of Registration',
			'number_of_employees' => 'Number Of Employees',
			'registration_number' => 'Registration Number',
			'registration_type' => 'Registration Type',
			'rim' => 'Rim',
			'sector' => 'Sector',
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

		$criteria->compare('legal_gen_id',$this->legal_gen_id);
		$criteria->compare('city_of_registration',$this->city_of_registration,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('country_of_registration',$this->country_of_registration,true);
		$criteria->compare('date_of_registration',$this->date_of_registration,true);
		$criteria->compare('number_of_employees',$this->number_of_employees);
		$criteria->compare('registration_number',$this->registration_number,true);
		$criteria->compare('registration_type',$this->registration_type,true);
		$criteria->compare('rim',$this->rim,true);
		$criteria->compare('sector',$this->sector,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewLegalGenInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
