<?php

/**
 * This is the model class for table "t_users".
 *
 * The followings are the available columns in table 't_users':
 * @property integer $id
 * @property string $user_register_uid
 * @property string $userUuid
 * @property string $username
 * @property string $gender
 * @property string $password
 * @property string $userperm
 * @property string $status
 * @property string $ref
 */
class TUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_register_uid, userUuid, username, gender, password, userperm, ref', 'required'),
			array('user_register_uid, userUuid, password', 'length', 'max'=>191),
			array('username', 'length', 'max'=>80),
			array('gender', 'length', 'max'=>15),
			array('userperm', 'length', 'max'=>10),
			array('status', 'length', 'max'=>1),
			array('ref', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_register_uid, userUuid, username, gender, password, userperm, status, ref', 'safe', 'on'=>'search'),
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
			'user_register_uid' => 'User Register Uid',
			'userUuid' => 'User Uuid',
			'username' => 'Username',
			'gender' => 'Gender',
			'password' => 'Password',
			'userperm' => 'Userperm',
			'status' => 'Status',
			'ref' => 'Ref',
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
		$criteria->compare('user_register_uid',$this->user_register_uid,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('userperm',$this->userperm,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('ref',$this->ref,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
