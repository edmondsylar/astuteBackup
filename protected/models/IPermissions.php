<?php

/**
 * This is the model class for table "i_permissions".
 *
 * The followings are the available columns in table 'i_permissions':
 * @property integer $id
 * @property string $permissionUuid
 * @property string $businessUuid
 * @property string $permissionVariable
 * @property string $Description
 * @property string $UserUuid
 * @property string $timeStamp
 * @property string $status
 */
class IPermissions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'i_permissions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('permissionUuid, businessUuid, permissionVariable, Description, UserUuid, timeStamp', 'required'),
			array('permissionUuid, businessUuid, UserUuid', 'length', 'max'=>35),
			array('permissionVariable', 'length', 'max'=>2),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, permissionUuid, businessUuid, permissionVariable, Description, UserUuid, timeStamp, status', 'safe', 'on'=>'search'),
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
			'permissionUuid' => 'Permission Uuid',
			'businessUuid' => 'Business Uuid',
			'permissionVariable' => 'Permission Variable',
			'Description' => 'Description',
			'UserUuid' => 'User Uuid',
			'timeStamp' => 'Time Stamp',
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
		$criteria->compare('permissionUuid',$this->permissionUuid,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('permissionVariable',$this->permissionVariable,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('UserUuid',$this->UserUuid,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IPermissions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
