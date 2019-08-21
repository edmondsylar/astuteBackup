<?php

/**
 * This is the model class for table "a_profile_connection_reference".
 *
 * The followings are the available columns in table 'a_profile_connection_reference':
 * @property string $profileConnectionReferenceUuid
 * @property string $referenceUuid
 * @property string $status
 * @property string $updatedOn
 * @property string $updatedBy
 */
class AProfileConnectionReference extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_profile_connection_reference';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileConnectionReferenceUuid, referenceUuid, updatedOn, updatedBy', 'required'),
			array('profileConnectionReferenceUuid, referenceUuid, updatedBy', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profileConnectionReferenceUuid, referenceUuid, status, updatedOn, updatedBy', 'safe', 'on'=>'search'),
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
			'profileConnectionReferenceUuid' => 'Profile Connection Reference Uuid',
			'referenceUuid' => 'Reference Uuid',
			'status' => 'Status',
			'updatedOn' => 'Updated On',
			'updatedBy' => 'Updated By',
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

		$criteria->compare('profileConnectionReferenceUuid',$this->profileConnectionReferenceUuid,true);
		$criteria->compare('referenceUuid',$this->referenceUuid,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AProfileConnectionReference the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
