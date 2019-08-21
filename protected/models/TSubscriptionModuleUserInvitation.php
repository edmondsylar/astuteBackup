<?php

/**
 * This is the model class for table "t_subscription_module_user_invitation".
 *
 * The followings are the available columns in table 't_subscription_module_user_invitation':
 * @property string $InvitationUuid
 * @property string $senderEmail
 * @property string $receiverEmail
 * @property string $serviceModuleUid
 * @property string $serviceModuleName
 * @property string $timeStamp
 */
class TSubscriptionModuleUserInvitation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_subscription_module_user_invitation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('InvitationUuid, senderEmail, receiverEmail, serviceModuleUid, serviceModuleName, timeStamp', 'required'),
			array('InvitationUuid, senderEmail, receiverEmail, serviceModuleUid, serviceModuleName', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('InvitationUuid, senderEmail, receiverEmail, serviceModuleUid, serviceModuleName, timeStamp', 'safe', 'on'=>'search'),
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
			'InvitationUuid' => 'Invitation Uuid',
			'senderEmail' => 'Sender Email',
			'receiverEmail' => 'Receiver Email',
			'serviceModuleUid' => 'Service Module Uid',
			'serviceModuleName' => 'Service Module Name',
			'timeStamp' => 'Time Stamp',
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

		$criteria->compare('InvitationUuid',$this->InvitationUuid,true);
		$criteria->compare('senderEmail',$this->senderEmail,true);
		$criteria->compare('receiverEmail',$this->receiverEmail,true);
		$criteria->compare('serviceModuleUid',$this->serviceModuleUid,true);
		$criteria->compare('serviceModuleName',$this->serviceModuleName,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSubscriptionModuleUserInvitation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
