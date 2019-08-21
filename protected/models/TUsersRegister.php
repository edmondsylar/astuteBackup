<?php

/**
 * This is the model class for table "t_users_register".
 *
 * The followings are the available columns in table 't_users_register':
 * @property integer $id
 * @property string $person_uid
 * @property string $names
 * @property string $gender
 * @property string $email
 * @property string $phone
 * @property string $phone_country_code
 * @property string $date_of_birth
 * @property string $password
 * @property string $created_on
 * @property string $status
 */
class TUsersRegister extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_users_register';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('person_uid, names, gender, email, phone, phone_country_code, date_of_birth, password, created_on', 'required'),
			array('person_uid, password, status', 'length', 'max'=>191),
			array('names', 'length', 'max'=>25),
			array('gender, phone', 'length', 'max'=>15),
			array('email', 'length', 'max'=>40),
			array('phone_country_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, person_uid, names, gender, email, phone, phone_country_code, date_of_birth, password, created_on, status', 'safe', 'on'=>'search'),
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
			'person_uid' => 'Person Uid',
			'names' => 'Names',
			'gender' => 'Gender',
			'email' => 'Email',
			'phone' => 'Phone',
			'phone_country_code' => 'Phone Country Code',
			'date_of_birth' => 'Date Of Birth',
			'password' => 'Password',
			'created_on' => 'Created On',
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
		$criteria->compare('person_uid',$this->person_uid,true);
		$criteria->compare('names',$this->names,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('phone_country_code',$this->phone_country_code,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TUsersRegister the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
