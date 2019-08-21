<?php

/**
 * This is the model class for table "t_email_verification_codes".
 *
 * The followings are the available columns in table 't_email_verification_codes':
 * @property string $emailVerificationCodeUuid
 * @property string $email
 * @property string $emailVerificationCode
 * @property string $emailVerificationCodeExpiryDate
 * @property string $generatedOn
 */
class TEmailVerificationCodes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_email_verification_codes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emailVerificationCodeUuid, email, emailVerificationCode, emailVerificationCodeExpiryDate, generatedOn', 'required'),
			array('emailVerificationCodeUuid, email, emailVerificationCode', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('emailVerificationCodeUuid, email, emailVerificationCode, emailVerificationCodeExpiryDate, generatedOn', 'safe', 'on'=>'search'),
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
			'emailVerificationCodeUuid' => 'Email Verification Code Uuid',
			'email' => 'Email',
			'emailVerificationCode' => 'Email Verification Code',
			'emailVerificationCodeExpiryDate' => 'Email Verification Code Expiry Date',
			'generatedOn' => 'Generated On',
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

		$criteria->compare('emailVerificationCodeUuid',$this->emailVerificationCodeUuid,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('emailVerificationCode',$this->emailVerificationCode,true);
		$criteria->compare('emailVerificationCodeExpiryDate',$this->emailVerificationCodeExpiryDate,true);
		$criteria->compare('generatedOn',$this->generatedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TEmailVerificationCodes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
