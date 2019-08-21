<?php

/**
 * This is the model class for table "t_personrelationships".
 *
 * The followings are the available columns in table 't_personrelationships':
 * @property integer $id
 * @property string $person_uid1
 * @property integer $relationship_id
 * @property string $person_uid2
 * @property string $createdon
 * @property string $status
 * @property string $maker
 */
class TPersonrelationships extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_personrelationships';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('person_uid1, relationship_id, person_uid2, maker', 'required'),
			array('relationship_id', 'numerical', 'integerOnly'=>true),
			array('person_uid1, person_uid2', 'length', 'max'=>300),
			array('status', 'length', 'max'=>1),
			array('maker', 'length', 'max'=>15),
			array('createdon', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, person_uid1, relationship_id, person_uid2, createdon, status, maker', 'safe', 'on'=>'search'),
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
			'person_uid1' => 'Person Uid1',
			'relationship_id' => 'Relationship',
			'person_uid2' => 'Person Uid2',
			'createdon' => 'Createdon',
			'status' => 'Status',
			'maker' => 'Maker',
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
		$criteria->compare('person_uid1',$this->person_uid1,true);
		$criteria->compare('relationship_id',$this->relationship_id);
		$criteria->compare('person_uid2',$this->person_uid2,true);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('maker',$this->maker,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPersonrelationships the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
