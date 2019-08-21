<?php

/**
 * This is the model class for table "i_users".
 *
 * The followings are the available columns in table 'i_users':
 * @property integer $id
 * @property string $userUuid
 * @property string $email
 * @property string $password
 * @property string $timeStamp
 * @property string $roles
 * @property string $status
 * @property string $role
 * @property string $userperm
 */
class IUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'i_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userUuid, email, password, timeStamp, status, role, userperm', 'required'),
			array('userUuid, email, password', 'length', 'max'=>250),
			array('roles', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
			array('role, userperm', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userUuid, email, password, timeStamp, roles, status, role, userperm', 'safe', 'on'=>'search'),
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
			'userUuid' => 'User Uuid',
			'email' => 'Email',
			'password' => 'Password',
			'timeStamp' => 'Time Stamp',
			'roles' => 'Roles',
			'status' => 'Status',
			'role' => 'Role',
			'userperm' => 'Userperm',
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
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('roles',$this->roles,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('userperm',$this->userperm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
