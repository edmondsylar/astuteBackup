<?php

/**
 * This is the model class for table "a_intelligence_packs".
 *
 * The followings are the available columns in table 'a_intelligence_packs':
 * @property string $intelligencePackUuid
 * @property string $name
 * @property string $intelligenceUuid
 * @property string $description
 * @property string $status
 * @property string $updatedBy
 * @property string $updatedOn
 */
class AIntelligencePacks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_intelligence_packs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intelligencePackUuid, name, intelligenceUuid, description, updatedBy, updatedOn', 'required'),
			array('intelligencePackUuid, name, intelligenceUuid, updatedBy', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('intelligencePackUuid, name, intelligenceUuid, description, status, updatedBy, updatedOn', 'safe', 'on'=>'search'),
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
			'intelligencePackUuid' => 'Intelligence Pack Uuid',
			'name' => 'Name',
			'intelligenceUuid' => 'Intelligence Uuid',
			'description' => 'Description',
			'status' => 'Status',
			'updatedBy' => 'Updated By',
			'updatedOn' => 'Updated On',
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

		$criteria->compare('intelligencePackUuid',$this->intelligencePackUuid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('intelligenceUuid',$this->intelligenceUuid,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AIntelligencePacks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
