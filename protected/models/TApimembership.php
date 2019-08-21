<?php

/**
 * This is the model class for table "t_apimembership".
 *
 * The followings are the available columns in table 't_apimembership':
 * @property integer $id
 * @property string $legislative_period_id
 * @property string $on_behalf_of_id
 * @property string $organization_id
 * @property string $person_id
 * @property string $createdon
 * @property string $maker
 * @property string $supervisor
 * @property string $status
 */
class TApimembership extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_apimembership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('legislative_period_id, on_behalf_of_id, organization_id, person_id, maker', 'required'),
			array('legislative_period_id, organization_id, person_id', 'length', 'max'=>255),
			array('on_behalf_of_id, maker, supervisor', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, legislative_period_id, on_behalf_of_id, organization_id, person_id, createdon, maker, supervisor, status', 'safe', 'on'=>'search'),
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
			'legislative_period_id' => 'Legislative Period',
			'on_behalf_of_id' => 'On Behalf Of',
			'organization_id' => 'Organization',
			'person_id' => 'Person',
			'createdon' => 'Createdon',
			'maker' => 'Maker',
			'supervisor' => 'Supervisor',
			'status' => 'Status',
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
		$criteria->compare('legislative_period_id',$this->legislative_period_id,true);
		$criteria->compare('on_behalf_of_id',$this->on_behalf_of_id,true);
		$criteria->compare('organization_id',$this->organization_id,true);
		$criteria->compare('person_id',$this->person_id,true);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TApimembership the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
