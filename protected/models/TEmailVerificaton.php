<?php

/**
 * This is the model class for table "t_email_verificaton".
 *
 * The followings are the available columns in table 't_email_verificaton':
 * @property string $emailverificationUuid
 * @property string $emailAddress
 * @property string $verificationCode
 * @property string $emailVerificationStatus
 * @property string $emailVerificationdate
 */
class TEmailVerificaton extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_email_verificaton';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emailverificationUuid, emailAddress, verificationCode, emailVerificationdate', 'required'),
			array('emailverificationUuid, emailAddress, verificationCode, emailVerificationStatus', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('emailverificationUuid, emailAddress, verificationCode, emailVerificationStatus, emailVerificationdate', 'safe', 'on'=>'search'),
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
			'emailverificationUuid' => 'Emailverification Uuid',
			'emailAddress' => 'Email Address',
			'verificationCode' => 'Verification Code',
			'emailVerificationStatus' => 'Email Verification Status',
			'emailVerificationdate' => 'Email Verificationdate',
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

		$criteria->compare('emailverificationUuid',$this->emailverificationUuid,true);
		$criteria->compare('emailAddress',$this->emailAddress,true);
		$criteria->compare('verificationCode',$this->verificationCode,true);
		$criteria->compare('emailVerificationStatus',$this->emailVerificationStatus,true);
		$criteria->compare('emailVerificationdate',$this->emailVerificationdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TEmailVerificaton the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
