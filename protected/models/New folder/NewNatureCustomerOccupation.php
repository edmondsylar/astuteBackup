<?php

/**
 * This is the model class for table "new_nature_customer_occupation".
 *
 * The followings are the available columns in table 'new_nature_customer_occupation':
 * @property integer $occupation_id
 * @property string $city_stationed
 * @property string $conkev_created_on
 * @property string $country_stationed
 * @property string $description
 * @property string $employer
 * @property string $employment_type
 * @property string $end_date
 * @property string $job_title
 * @property string $position
 * @property string $profession
 * @property string $rim
 * @property string $start_date
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewNatureCustomerOccupation $newCustomerNewNatureCustomerOccupation
 */
class NewNatureCustomerOccupation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_nature_customer_occupation';
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
			array('city_stationed, country_stationed, description, employer, employment_type, job_title, position, profession, rim', 'length', 'max'=>255),
			array('conkev_created_on, end_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('occupation_id, city_stationed, conkev_created_on, country_stationed, description, employer, employment_type, end_date, job_title, position, profession, rim, start_date, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewNatureCustomerOccupation' => array(self::HAS_ONE, 'NewCustomerNewNatureCustomerOccupation', 'newNatureCustomerOccupations_occupation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'occupation_id' => 'Occupation',
			'city_stationed' => 'City Stationed',
			'conkev_created_on' => 'Conkev Created On',
			'country_stationed' => 'Country Stationed',
			'description' => 'Description',
			'employer' => 'Employer',
			'employment_type' => 'Employment Type',
			'end_date' => 'End Date',
			'job_title' => 'Job Title',
			'position' => 'Position',
			'profession' => 'Profession',
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
		$criteria->compare('city_stationed',$this->city_stationed,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('country_stationed',$this->country_stationed,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('employer',$this->employer,true);
		$criteria->compare('employment_type',$this->employment_type,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('job_title',$this->job_title,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('profession',$this->profession,true);
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
	 * @return NewNatureCustomerOccupation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
