<?php

/**
 * This is the model class for table "t_profiles".
 *
 * The followings are the available columns in table 't_profiles':
 * @property integer $id
 * @property string $profileUuid
 * @property string $source
 * @property string $sourceid
 * @property string $prifileType
 * @property string $businessUuid
 * @property string $name
 * @property string $createdOn
 * @property string $createdBy
 * @property string $status
 * @property string $updatedOn
 */
class TProfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileUuid, source, sourceid, prifileType, businessUuid, name, createdOn, createdBy, updatedOn', 'required'),
			array('profileUuid, source, sourceid, prifileType, name, createdBy', 'length', 'max'=>250),
			array('businessUuid', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, profileUuid, source, sourceid, prifileType, businessUuid, name, createdOn, createdBy, status, updatedOn', 'safe', 'on'=>'search'),
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
			'profileUuid' => 'Profile Uuid',
			'source' => 'Source',
			'sourceid' => 'Sourceid',
			'prifileType' => 'Prifile Type',
			'businessUuid' => 'Business Uuid',
			'name' => 'Name',
			'createdOn' => 'Created On',
			'createdBy' => 'Created By',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('profileUuid',$this->profileUuid,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('sourceid',$this->sourceid,true);
		$criteria->compare('prifileType',$this->prifileType,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('createdOn',$this->createdOn,true);
		$criteria->compare('createdBy',$this->createdBy,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
