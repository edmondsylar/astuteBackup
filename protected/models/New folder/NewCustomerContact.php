<?php

/**
 * This is the model class for table "new_customer_contact".
 *
 * The followings are the available columns in table 'new_customer_contact':
 * @property integer $contact_id
 * @property string $city
 * @property string $conkev_created_on
 * @property string $contact
 * @property string $contact_type
 * @property string $country
 * @property string $end_date
 * @property string $rim
 * @property string $start_date
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewCustomerContact $newCustomerNewCustomerContact
 */
class NewCustomerContact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_customer_contact';
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
			array('city, contact, contact_type, country, rim', 'length', 'max'=>255),
			array('conkev_created_on, end_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contact_id, city, conkev_created_on, contact, contact_type, country, end_date, rim, start_date, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewCustomerContact' => array(self::HAS_ONE, 'NewCustomerNewCustomerContact', 'newCustomerContacts_contact_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contact_id' => 'Contact',
			'city' => 'City',
			'conkev_created_on' => 'Conkev Created On',
			'contact' => 'Contact',
			'contact_type' => 'Contact Type',
			'country' => 'Country',
			'end_date' => 'End Date',
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

		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('contact_type',$this->contact_type,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('end_date',$this->end_date,true);
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
	 * @return NewCustomerContact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
