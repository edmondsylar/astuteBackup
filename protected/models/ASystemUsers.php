<?php

/**
 * This is the model class for table "a_system_users".
 *
 * The followings are the available columns in table 'a_system_users':
 * @property string $systemUserUuid
 * @property string $email
 * @property string $Names
 * @property string $gender
 * @property string $password
 * @property string $role
 * @property string $Creator
 * @property string $status
 * @property string $addedOn
 */
class ASystemUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_system_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('systemUserUuid, email, Names, gender, password, role, Creator, addedOn', 'required'),
			array('systemUserUuid, Creator', 'length', 'max'=>25),
			array('email', 'length', 'max'=>90),
			array('Names', 'length', 'max'=>60),
			array('gender', 'length', 'max'=>15),
			array('password, role', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('systemUserUuid, email, Names, gender, password, role, Creator, status, addedOn', 'safe', 'on'=>'search'),
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
			'systemUserUuid' => 'System User Uuid',
			'email' => 'Email',
			'Names' => 'Names',
			'gender' => 'Gender',
			'password' => 'Password',
			'role' => 'Role',
			'Creator' => 'Creator',
			'status' => 'Status',
			'addedOn' => 'Added On',
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

		$criteria->compare('systemUserUuid',$this->systemUserUuid,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('Names',$this->Names,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('Creator',$this->Creator,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('addedOn',$this->addedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ASystemUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
