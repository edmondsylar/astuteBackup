<?php

/**
 * This is the model class for table "t_person_address".
 *
 * The followings are the available columns in table 't_person_address':
 * @property integer $id
 * @property integer $ownership
 * @property integer $type
 * @property string $country
 * @property string $city
 * @property string $town
 * @property string $county
 * @property string $subcounty
 * @property string $parish
 * @property string $village
 * @property string $street_name
 * @property integer $apartment_number
 * @property string $postal_code
 * @property string $otherdetails
 * @property integer $person
 * @property integer $citation
 * @property string $start_date
 * @property string $end_date
 * @property string $maker
 * @property string $supervisor
 * @property string $status
 * @property string $supervisor_reject_reason
 * @property string $dataEntrant_discard_reason
 */
class TPersonAddress extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_person_address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ownership, type, country, city, town, person, citation, start_date, maker', 'required'),
			array('country, city, town, person, citation, start_date, maker', 'required'),
                        array('ownership, type, apartment_number, person, citation', 'numerical', 'integerOnly'=>true),
			array('country', 'length', 'max'=>2),
			array('city, town, county, subcounty, parish, village, street_name', 'length', 'max'=>255),
			array('postal_code, maker', 'length', 'max'=>25),
			array('supervisor', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			array('supervisor_reject_reason, dataEntrant_discard_reason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ownership, type, country, city, town, county, subcounty, parish, village, street_name, apartment_number, postal_code, otherdetails, person, citation, start_date, end_date, maker, supervisor, status, supervisor_reject_reason, dataEntrant_discard_reason', 'safe', 'on'=>'search'),
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
			'ownership' => 'Ownership',
			'type' => 'Type',
			'country' => 'Country',
			'city' => 'City',
			'town' => 'Town',
			'county' => 'County',
			'subcounty' => 'Subcounty',
			'parish' => 'Parish',
			'village' => 'Village',
			'street_name' => 'Street Name',
			'apartment_number' => 'Apartment Number',
			'postal_code' => 'Postal Code',
			'otherdetails' => 'Otherdetails',
			'person' => 'Person',
			'citation' => 'Citation',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'maker' => 'Maker',
			'supervisor' => 'Supervisor',
			'status' => 'Status',
			'supervisor_reject_reason' => 'Supervisor Reject Reason',
			'dataEntrant_discard_reason' => 'Data Entrant Discard Reason',
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
		$criteria->compare('ownership',$this->ownership);
		$criteria->compare('type',$this->type);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('county',$this->county,true);
		$criteria->compare('subcounty',$this->subcounty,true);
		$criteria->compare('parish',$this->parish,true);
		$criteria->compare('village',$this->village,true);
		$criteria->compare('street_name',$this->street_name,true);
		$criteria->compare('apartment_number',$this->apartment_number);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('otherdetails',$this->otherdetails,true);
		$criteria->compare('person',$this->person);
		$criteria->compare('citation',$this->citation);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('supervisor_reject_reason',$this->supervisor_reject_reason,true);
		$criteria->compare('dataEntrant_discard_reason',$this->dataEntrant_discard_reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPersonAddress the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
