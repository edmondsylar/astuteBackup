<?php

/**
 * This is the model class for table "t_passwords_old".
 *
 * The followings are the available columns in table 't_passwords_old':
 * @property string $oldPasswordUuid
 * @property string $dateChanged
 * @property string $userUuid
 * @property string $password
 */
class TPasswordsOld extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_passwords_old';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('oldPasswordUuid, dateChanged, userUuid, password', 'required'),
			array('oldPasswordUuid', 'length', 'max'=>25),
			array('userUuid', 'length', 'max'=>50),
			array('password', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('oldPasswordUuid, dateChanged, userUuid, password', 'safe', 'on'=>'search'),
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
			'oldPasswordUuid' => 'Old Password Uuid',
			'dateChanged' => 'Date Changed',
			'userUuid' => 'User Uuid',
			'password' => 'Password',
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

		$criteria->compare('oldPasswordUuid',$this->oldPasswordUuid,true);
		$criteria->compare('dateChanged',$this->dateChanged,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPasswordsOld the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
