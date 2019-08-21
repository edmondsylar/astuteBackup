<?php

/**
 * This is the model class for table "new_nature_customer_education".
 *
 * The followings are the available columns in table 'new_nature_customer_education':
 * @property integer $education_id
 * @property string $award
 * @property string $city
 * @property string $conkev_created_on
 * @property string $country
 * @property string $end_date
 * @property string $institution
 * @property string $profession
 * @property string $programme
 * @property string $rim
 * @property string $start_date
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewNatureCustomerEducation $newCustomerNewNatureCustomerEducation
 */
class NewNatureCustomerEducation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_nature_customer_education';
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
			array('award, city, country, institution, profession, programme, rim', 'length', 'max'=>255),
			array('conkev_created_on, end_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('education_id, award, city, conkev_created_on, country, end_date, institution, profession, programme, rim, start_date, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewNatureCustomerEducation' => array(self::HAS_ONE, 'NewCustomerNewNatureCustomerEducation', 'newNatureCustomerEducations_education_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'education_id' => 'Education',
			'award' => 'Award',
			'city' => 'City',
			'conkev_created_on' => 'Conkev Created On',
			'country' => 'Country',
			'end_date' => 'End Date',
			'institution' => 'Institution',
			'profession' => 'Profession',
			'programme' => 'Programme',
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

		$criteria->compare('education_id',$this->education_id);
		$criteria->compare('award',$this->award,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('profession',$this->profession,true);
		$criteria->compare('programme',$this->programme,true);
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
	 * @return NewNatureCustomerEducation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
