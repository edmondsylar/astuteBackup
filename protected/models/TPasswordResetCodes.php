<?php

/**
 * This is the model class for table "t_password_reset_codes".
 *
 * The followings are the available columns in table 't_password_reset_codes':
 * @property string $Uuid
 * @property string $userUuid
 * @property string $code
 * @property string $timestamp
 * @property string $codeExpiry
 * @property string $status
 */
class TPasswordResetCodes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_password_reset_codes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Uuid, userUuid, code, timestamp', 'required'),
			array('Uuid, userUuid', 'length', 'max'=>191),
			array('code', 'length', 'max'=>100),
			array('codeExpiry', 'length', 'max'=>8),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Uuid, userUuid, code, timestamp, codeExpiry, status', 'safe', 'on'=>'search'),
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
			'Uuid' => 'Uuid',
			'userUuid' => 'User Uuid',
			'code' => 'Code',
			'timestamp' => 'Timestamp',
			'codeExpiry' => 'Code Expiry',
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

		$criteria->compare('Uuid',$this->Uuid,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('codeExpiry',$this->codeExpiry,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPasswordResetCodes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
