<?php

/**
 * This is the model class for table "t_person_identification".
 *
 * The followings are the available columns in table 't_person_identification':
 * @property integer $id
 * @property integer $id_type
 * @property string $id_number
 * @property string $issuing_authority
 * @property string $issue_date
 * @property integer $citation
 * @property integer $person
 * @property string $createdon
 * @property string $maker
 * @property string $supervisor
 * @property string $status
 * @property string $supervisor_reject_reason
 * @property string $dataEntrant_discard_reason
 */
class TPersonIdentification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_person_identification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_type, id_number, issuing_authority, issue_date, citation, person, maker', 'required'),
			array('id_type, citation, person', 'numerical', 'integerOnly'=>true),
			array('id_number', 'length', 'max'=>50),
			array('issuing_authority', 'length', 'max'=>255),
			array('maker', 'length', 'max'=>25),
			array('supervisor', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			array('supervisor_reject_reason, dataEntrant_discard_reason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_type, id_number, issuing_authority, issue_date, citation, person, createdon, maker, supervisor, status, supervisor_reject_reason, dataEntrant_discard_reason', 'safe', 'on'=>'search'),
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
			'id_type' => 'Id Type',
			'id_number' => 'Id Number',
			'issuing_authority' => 'Issuing Authority',
			'issue_date' => 'Issue Date',
			'citation' => 'Citation',
			'person' => 'Person',
			'createdon' => 'Createdon',
			'maker' => 'Maker',
			'supervisor' => 'Supervisor',
			'status' => 'Status',
			'supervisor_reject_reason' => 'Supervisor Reject Reason',
			'dataEntrant_discard_reason' => 'Data Entrant Discard Reason',
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
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('id_number',$this->id_number,true);
		$criteria->compare('issuing_authority',$this->issuing_authority,true);
		$criteria->compare('issue_date',$this->issue_date,true);
		$criteria->compare('citation',$this->citation);
		$criteria->compare('person',$this->person);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('supervisor_reject_reason',$this->supervisor_reject_reason,true);
		$criteria->compare('dataEntrant_discard_reason',$this->dataEntrant_discard_reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPersonIdentification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
