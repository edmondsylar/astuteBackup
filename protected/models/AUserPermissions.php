<?php

/**
 * This is the model class for table "a_user_permissions".
 *
 * The followings are the available columns in table 'a_user_permissions':
 * @property integer $id
 * @property string $userPermUuid
 * @property string $permission
 * @property string $user
 * @property string $AssignedBy
 * @property string $status
 * @property string $CreatedOn
 * @property string $AssignedOn
 */
class AUserPermissions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_user_permissions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userPermUuid, permission, user, AssignedBy, CreatedOn, AssignedOn', 'required'),
			array('userPermUuid', 'length', 'max'=>25),
			array('permission', 'length', 'max'=>255),
			array('user', 'length', 'max'=>60),
			array('AssignedBy', 'length', 'max'=>45),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userPermUuid, permission, user, AssignedBy, status, CreatedOn, AssignedOn', 'safe', 'on'=>'search'),
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
			'userPermUuid' => 'User Perm Uuid',
			'permission' => 'Permission',
			'user' => 'User',
			'AssignedBy' => 'Assigned By',
			'status' => 'Status',
			'CreatedOn' => 'Created On',
			'AssignedOn' => 'Assigned On',
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
		$criteria->compare('userPermUuid',$this->userPermUuid,true);
		$criteria->compare('permission',$this->permission,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('AssignedBy',$this->AssignedBy,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('CreatedOn',$this->CreatedOn,true);
		$criteria->compare('AssignedOn',$this->AssignedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AUserPermissions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
