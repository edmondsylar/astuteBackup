<?php

/**
 * This is the model class for table "a_invited_system_users".
 *
 * The followings are the available columns in table 'a_invited_system_users':
 * @property string $invitedSystemUserUuid
 * @property string $invitedUser
 * @property string $businessSystemAdmin
 * @property string $businessUuid
 * @property string $invitedBy
 * @property string $invitedOn
 * @property string $status
 */
class AInvitedSystemUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_invited_system_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invitedSystemUserUuid, invitedUser, businessSystemAdmin, businessUuid, invitedBy, invitedOn', 'required'),
			array('invitedSystemUserUuid, invitedUser, businessSystemAdmin, invitedBy', 'length', 'max'=>25),
			array('businessUuid', 'length', 'max'=>50),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('invitedSystemUserUuid, invitedUser, businessSystemAdmin, businessUuid, invitedBy, invitedOn, status', 'safe', 'on'=>'search'),
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
			'invitedSystemUserUuid' => 'Invited System User Uuid',
			'invitedUser' => 'Invited User',
			'businessSystemAdmin' => 'Business System Admin',
			'businessUuid' => 'Business Uuid',
			'invitedBy' => 'Invited By',
			'invitedOn' => 'Invited On',
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

		$criteria->compare('invitedSystemUserUuid',$this->invitedSystemUserUuid,true);
		$criteria->compare('invitedUser',$this->invitedUser,true);
		$criteria->compare('businessSystemAdmin',$this->businessSystemAdmin,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('invitedBy',$this->invitedBy,true);
		$criteria->compare('invitedOn',$this->invitedOn,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AInvitedSystemUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
