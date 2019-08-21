<?php

/**
 * This is the model class for table "a_intelligence".
 *
 * The followings are the available columns in table 'a_intelligence':
 * @property string $intelligenceUuid
 * @property string $intelligenceName
 * @property string $description
 * @property string $status
 * @property string $updateOn
 * @property string $updateBy
 */
class AIntelligence extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_intelligence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intelligenceUuid, intelligenceName, description, updateOn, updateBy', 'required'),
			array('intelligenceUuid, intelligenceName, description, updateBy', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('intelligenceUuid, intelligenceName, description, status, updateOn, updateBy', 'safe', 'on'=>'search'),
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
			'intelligenceUuid' => 'Intelligence Uuid',
			'intelligenceName' => 'Intelligence Name',
			'description' => 'Description',
			'status' => 'Status',
			'updateOn' => 'Update On',
			'updateBy' => 'Update By',
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

		$criteria->compare('intelligenceUuid',$this->intelligenceUuid,true);
		$criteria->compare('intelligenceName',$this->intelligenceName,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updateOn',$this->updateOn,true);
		$criteria->compare('updateBy',$this->updateBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AIntelligence the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
