<?php

/**
 * This is the model class for table "a_user_roles_invitations".
 *
 * The followings are the available columns in table 'a_user_roles_invitations':
 * @property string $userRoleInvitationUuid
 * @property string $userUuid
 * @property string $businessUuid
 * @property string $roleUuid
 * @property string $status
 * @property string $updatedBy
 * @property string $updatedOn
 */
class AUserRolesInvitations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_user_roles_invitations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userRoleInvitationUuid, userUuid, businessUuid, roleUuid, updatedBy, updatedOn', 'required'),
			array('userRoleInvitationUuid, userUuid, businessUuid, updatedBy', 'length', 'max'=>25),
			array('roleUuid', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userRoleInvitationUuid, userUuid, businessUuid, roleUuid, status, updatedBy, updatedOn', 'safe', 'on'=>'search'),
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
			'userRoleInvitationUuid' => 'User Role Invitation Uuid',
			'userUuid' => 'User Uuid',
			'businessUuid' => 'Business Uuid',
			'roleUuid' => 'Role Uuid',
			'status' => 'Status',
			'updatedBy' => 'Updated By',
			'updatedOn' => 'Updated On',
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

		$criteria->compare('userRoleInvitationUuid',$this->userRoleInvitationUuid,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('roleUuid',$this->roleUuid,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AUserRolesInvitations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
