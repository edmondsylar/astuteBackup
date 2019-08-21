<?php

/**
 * This is the model class for table "t_person_employment".
 *
 * The followings are the available columns in table 't_person_employment':
 * @property integer $id
 * @property string $person
 * @property integer $organization
 * @property integer $person_position
 * @property integer $person_function
 * @property string $date_created
 * @property string $status
 * @property string $maker
 * @property string $supervisor
 */
class TPersonEmployment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_person_employment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('person, organization, person_position, person_function, date_created, maker', 'required'),
			array('organization, person_position, person_function', 'numerical', 'integerOnly'=>true),
			array('person', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('maker, supervisor', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, person, organization, person_position, person_function, date_created, status, maker, supervisor', 'safe', 'on'=>'search'),
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
			'person' => 'Person',
			'organization' => 'Organization',
			'person_position' => 'Person Position',
			'person_function' => 'Person Function',
			'date_created' => 'Date Created',
			'status' => 'Status',
			'maker' => 'Maker',
			'supervisor' => 'Supervisor',
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
		$criteria->compare('person',$this->person,true);
		$criteria->compare('organization',$this->organization);
		$criteria->compare('person_position',$this->person_position);
		$criteria->compare('person_function',$this->person_function);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('supervisor',$this->supervisor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPersonEmployment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
