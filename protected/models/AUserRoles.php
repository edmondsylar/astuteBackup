<?php

/**
 * This is the model class for table "a_user_roles".
 *
 * The followings are the available columns in table 'a_user_roles':
 * @property string $userRoleUuid
 * @property string $RoleUuid
 * @property string $assignedTo
 * @property string $status
 * @property string $assignedBy
 * @property string $assignedOn
 * @property string $businessUuid
 */
class AUserRoles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_user_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userRoleUuid, RoleUuid, assignedTo, assignedBy, assignedOn, businessUuid', 'required'),
			array('userRoleUuid, assignedTo, assignedBy, businessUuid', 'length', 'max'=>25),
			array('RoleUuid', 'length', 'max'=>35),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userRoleUuid, RoleUuid, assignedTo, status, assignedBy, assignedOn, businessUuid', 'safe', 'on'=>'search'),
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
			'userRoleUuid' => 'User Role Uuid',
			'RoleUuid' => 'Role Uuid',
			'assignedTo' => 'Assigned To',
			'status' => 'Status',
			'assignedBy' => 'Assigned By',
			'assignedOn' => 'Assigned On',
			'businessUuid' => 'Business Uuid',
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

		$criteria->compare('userRoleUuid',$this->userRoleUuid,true);
		$criteria->compare('RoleUuid',$this->RoleUuid,true);
		$criteria->compare('assignedTo',$this->assignedTo,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('assignedBy',$this->assignedBy,true);
		$criteria->compare('assignedOn',$this->assignedOn,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AUserRoles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
