<?php

/**
 * This is the model class for table "new_nature_gen_info".
 *
 * The followings are the available columns in table 'new_nature_gen_info':
 * @property integer $gen_n_id
 * @property string $city_of_birth
 * @property string $conkev_created_on
 * @property string $county_of_birth
 * @property string $date_of_birth
 * @property string $gender
 * @property string $literacy_level
 * @property string $marital_status
 * @property integer $number_of_dependants
 * @property string $rim
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewNatureGenInfo $newCustomerNewNatureGenInfo
 */
class NewNatureGenInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_nature_gen_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number_of_dependants', 'required'),
			array('number_of_dependants, version', 'numerical', 'integerOnly'=>true),
			array('city_of_birth, county_of_birth, date_of_birth, gender, literacy_level, marital_status, rim', 'length', 'max'=>255),
			array('conkev_created_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gen_n_id, city_of_birth, conkev_created_on, county_of_birth, date_of_birth, gender, literacy_level, marital_status, number_of_dependants, rim, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewNatureGenInfo' => array(self::HAS_ONE, 'NewCustomerNewNatureGenInfo', 'newNatureGeneralInformations_gen_n_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gen_n_id' => 'Gen N',
			'city_of_birth' => 'City Of Birth',
			'conkev_created_on' => 'Conkev Created On',
			'county_of_birth' => 'County Of Birth',
			'date_of_birth' => 'Date Of Birth',
			'gender' => 'Gender',
			'literacy_level' => 'Literacy Level',
			'marital_status' => 'Marital Status',
			'number_of_dependants' => 'Number Of Dependants',
			'rim' => 'Rim',
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

		$criteria->compare('gen_n_id',$this->gen_n_id);
		$criteria->compare('city_of_birth',$this->city_of_birth,true);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('county_of_birth',$this->county_of_birth,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('literacy_level',$this->literacy_level,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('number_of_dependants',$this->number_of_dependants);
		$criteria->compare('rim',$this->rim,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewNatureGenInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
