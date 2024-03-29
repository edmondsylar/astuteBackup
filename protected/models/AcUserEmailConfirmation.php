<?php

/**
 * This is the model class for table "ac_user_email_confirmation".
 *
 * The followings are the available columns in table 'ac_user_email_confirmation':
 * @property string $emilConfirmationUuid
 * @property string $registrationUuid
 * @property string $verificationCode
 * @property string $verificationCodeExpiry
 * @property string $confirmationStatus
 * @property string $ConfirmedOn
 */
class AcUserEmailConfirmation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ac_user_email_confirmation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emilConfirmationUuid, registrationUuid, verificationCode, verificationCodeExpiry, confirmationStatus, ConfirmedOn', 'required'),
			array('emilConfirmationUuid, registrationUuid, verificationCode, verificationCodeExpiry', 'length', 'max'=>250),
			array('confirmationStatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('emilConfirmationUuid, registrationUuid, verificationCode, verificationCodeExpiry, confirmationStatus, ConfirmedOn', 'safe', 'on'=>'search'),
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
			'emilConfirmationUuid' => 'Emil Confirmation Uuid',
			'registrationUuid' => 'Registration Uuid',
			'verificationCode' => 'Verification Code',
			'verificationCodeExpiry' => 'Verification Code Expiry',
			'confirmationStatus' => 'Confirmation Status',
			'ConfirmedOn' => 'Confirmed On',
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

		$criteria->compare('emilConfirmationUuid',$this->emilConfirmationUuid,true);
		$criteria->compare('registrationUuid',$this->registrationUuid,true);
		$criteria->compare('verificationCode',$this->verificationCode,true);
		$criteria->compare('verificationCodeExpiry',$this->verificationCodeExpiry,true);
		$criteria->compare('confirmationStatus',$this->confirmationStatus,true);
		$criteria->compare('ConfirmedOn',$this->ConfirmedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AcUserEmailConfirmation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
