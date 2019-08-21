<?php

/**
 * This is the model class for table "i_incident_person_details".
 *
 * The followings are the available columns in table 'i_incident_person_details':
 * @property integer $id
 * @property string $incidentPersonDetailsUuid
 * @property string $incidentPersonUuid
 * @property string $incidentUuid
 * @property string $title
 * @property string $details
 * @property string $timeStamp
 * @property string $userUuid
 * @property string $status
 */
class IIncidentPersonDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'i_incident_person_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incidentPersonDetailsUuid, incidentPersonUuid, incidentUuid, title, details, timeStamp, userUuid', 'required'),
			array('incidentPersonDetailsUuid, incidentPersonUuid', 'length', 'max'=>255),
			array('incidentUuid, userUuid', 'length', 'max'=>45),
			array('title', 'length', 'max'=>34),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incidentPersonDetailsUuid, incidentPersonUuid, incidentUuid, title, details, timeStamp, userUuid, status', 'safe', 'on'=>'search'),
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
			'incidentPersonDetailsUuid' => 'Incident Person Details Uuid',
			'incidentPersonUuid' => 'Incident Person Uuid',
			'incidentUuid' => 'Incident Uuid',
			'title' => 'Title',
			'details' => 'Details',
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
		$criteria->compare('incidentPersonDetailsUuid',$this->incidentPersonDetailsUuid,true);
		$criteria->compare('incidentPersonUuid',$this->incidentPersonUuid,true);
		$criteria->compare('incidentUuid',$this->incidentUuid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('details',$this->details,true);
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
	 * @return IIncidentPersonDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
