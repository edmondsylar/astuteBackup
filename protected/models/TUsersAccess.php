<?php

/**
 * This is the model class for table "t_users_access".
 *
 * The followings are the available columns in table 't_users_access':
 * @property integer $id
 * @property string $username
 * @property string $accessUuid
 * @property string $mac_address
 * @property string $ip_address
 * @property string $accessTime
 * @property string $timeOut
 * @property string $status
 */
class TUsersAccess extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_users_access';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, accessUuid, mac_address, ip_address, accessTime, timeOut', 'required'),
			array('username', 'length', 'max'=>50),
			array('accessUuid', 'length', 'max'=>191),
			array('mac_address, ip_address', 'length', 'max'=>250),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, accessUuid, mac_address, ip_address, accessTime, timeOut, status', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'accessUuid' => 'Access Uuid',
			'mac_address' => 'Mac Address',
			'ip_address' => 'Ip Address',
			'accessTime' => 'Access Time',
			'timeOut' => 'Time Out',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('accessUuid',$this->accessUuid,true);
		$criteria->compare('mac_address',$this->mac_address,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('accessTime',$this->accessTime,true);
		$criteria->compare('timeOut',$this->timeOut,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUsersAccess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
