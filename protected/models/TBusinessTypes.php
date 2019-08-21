<?php

/**
 * This is the model class for table "t_business_types".
 *
 * The followings are the available columns in table 't_business_types':
 * @property integer $id
 * @property string $businessTypeUuid
 * @property string $businessTypeName
 * @property string $createdOn
 * @property string $createdBy
 * @property string $status
 */
class TBusinessTypes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_business_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('businessTypeUuid, businessTypeName, createdOn, createdBy', 'required'),
			array('businessTypeUuid', 'length', 'max'=>128),
			array('businessTypeName', 'length', 'max'=>25),
			array('createdBy', 'length', 'max'=>191),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, businessTypeUuid, businessTypeName, createdOn, createdBy, status', 'safe', 'on'=>'search'),
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
			'businessTypeUuid' => 'Business Type Uuid',
			'businessTypeName' => 'Business Type Name',
			'createdOn' => 'Created On',
			'createdBy' => 'Created By',
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
		$criteria->compare('businessTypeUuid',$this->businessTypeUuid,true);
		$criteria->compare('businessTypeName',$this->businessTypeName,true);
		$criteria->compare('createdOn',$this->createdOn,true);
		$criteria->compare('createdBy',$this->createdBy,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TBusinessTypes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
