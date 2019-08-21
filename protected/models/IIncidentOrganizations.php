<?php

/**
 * This is the model class for table "i_incident_organizations".
 *
 * The followings are the available columns in table 'i_incident_organizations':
 * @property integer $id
 * @property string $incidentOrganizationUuid
 * @property integer $organization_id
 * @property string $incidentUuid
 * @property string $timeStamp
 * @property string $userUuid
 * @property string $status
 */
class IIncidentOrganizations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'i_incident_organizations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incidentOrganizationUuid, organization_id, incidentUuid, timeStamp, userUuid', 'required'),
			array('organization_id', 'numerical', 'integerOnly'=>true),
			array('incidentOrganizationUuid, incidentUuid', 'length', 'max'=>50),
			array('userUuid', 'length', 'max'=>24),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incidentOrganizationUuid, organization_id, incidentUuid, timeStamp, userUuid, status', 'safe', 'on'=>'search'),
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
			'incidentOrganizationUuid' => 'Incident Organization Uuid',
			'organization_id' => 'Organization',
			'incidentUuid' => 'Incident Uuid',
			'timeStamp' => 'Time Stamp',
			'userUuid' => 'User Uuid',
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
		$criteria->compare('incidentOrganizationUuid',$this->incidentOrganizationUuid,true);
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('incidentUuid',$this->incidentUuid,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('userUuid',$this->userUuid,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IIncidentOrganizations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}