<?php

/**
 * This is the model class for table "ac_user_sign_in".
 *
 * The followings are the available columns in table 'ac_user_sign_in':
 * @property string $userSignInUuid
 * @property string $userUuid
 * @property string $time
 * @property string $ipAddress
 * @property string $macAddress
 * @property string $status
 */
class AcUserSignIn extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ac_user_sign_in';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userSignInUuid, userUuid, time, ipAddress, macAddress, status', 'required'),
			array('userSignInUuid, userUuid, ipAddress, macAddress', 'length', 'max'=>250),
			array('status', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userSignInUuid, userUuid, time, ipAddress, macAddress, status', 'safe', 'on'=>'search'),
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
			'userSignInUuid' => 'User Sign In Uuid',
			'userUuid' => 'User Uuid',
			'time' => 'Time',
			'ipAddress' => 'Ip Address',
			'macAddress' => 'Mac Address',
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

		$criteria->compare('userSignInUuid',$this->userSignInUuid,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('ipAddress',$this->ipAddress,true);
		$criteria->compare('macAddress',$this->macAddress,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AcUserSignIn the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
