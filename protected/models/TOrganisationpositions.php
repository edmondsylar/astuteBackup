<?php

/**
 * This is the model class for table "t_organisationpositions".
 *
 * The followings are the available columns in table 't_organisationpositions':
 * @property integer $id
 * @property integer $organization
 * @property integer $position
 * @property integer $level
 * @property string $start_date
 * @property string $end_date
 * @property string $createdon
 * @property string $maker
 * @property string $supervisor
 * @property string $status
 * @property string $supervisor_reject_reason
 * @property string $dataEntrant_discard_reason
 */
class TOrganisationpositions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_organisationpositions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organization, position, level, maker', 'required'),
			array('organization, position, level', 'numerical', 'integerOnly'=>true),
			array('maker', 'length', 'max'=>25),
			array('supervisor', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			array('start_date, end_date, supervisor_reject_reason, dataEntrant_discard_reason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, organization, position, level, start_date, end_date, createdon, maker, supervisor, status, supervisor_reject_reason, dataEntrant_discard_reason', 'safe', 'on'=>'search'),
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
			'organization' => 'Organization',
			'position' => 'Position',
			'level' => 'Level',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
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
		$criteria->compare('organization',$this->organization);
		$criteria->compare('position',$this->position);
		$criteria->compare('level',$this->level);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
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
	 * @return TOrganisationpositions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
