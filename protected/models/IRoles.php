<?php

/**
 * This is the model class for table "i_roles".
 *
 * The followings are the available columns in table 'i_roles':
 * @property string $roleUuid
 * @property string $roleName
 * @property string $Description
 * @property string $userUuid
 * @property string $timeStamp
 * @property string $status
 * @property string $businessUuid
 * @property string $roleStatus
 */
class IRoles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'i_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roleUuid, roleName, Description, userUuid, timeStamp, businessUuid', 'required'),
			array('roleUuid, roleName, userUuid', 'length', 'max'=>35),
			array('status', 'length', 'max'=>2),
			array('businessUuid', 'length', 'max'=>25),
			array('roleStatus', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('roleUuid, roleName, Description, userUuid, timeStamp, status, businessUuid, roleStatus', 'safe', 'on'=>'search'),
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
			'roleUuid' => 'Role Uuid',
			'roleName' => 'Role Name',
			'Description' => 'Description',
			'userUuid' => 'User Uuid',
			'timeStamp' => 'Time Stamp',
			'status' => 'Status',
			'businessUuid' => 'Business Uuid',
			'roleStatus' => 'Role Status',
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

		$criteria->compare('roleUuid',$this->roleUuid,true);
		$criteria->compare('roleName',$this->roleName,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('roleStatus',$this->roleStatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IRoles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
