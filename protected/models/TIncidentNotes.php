<?php

/**
 * This is the model class for table "t_incident_notes".
 *
 * The followings are the available columns in table 't_incident_notes':
 * @property integer $id
 * @property string $incidentNoteUuid
 * @property string $incidentUuid
 * @property string $noteTitle
 * @property string $note
 * @property string $dateCreated
 * @property string $maker
 * @property string $status
 */
class TIncidentNotes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_incident_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('incidentNoteUuid, incidentUuid, noteTitle, note, dateCreated, maker', 'required'),
			array('incidentNoteUuid', 'length', 'max'=>50),
			array('incidentUuid', 'length', 'max'=>45),
			array('noteTitle, maker', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, incidentNoteUuid, incidentUuid, noteTitle, note, dateCreated, maker, status', 'safe', 'on'=>'search'),
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
			'incidentNoteUuid' => 'Incident Note Uuid',
			'incidentUuid' => 'Incident Uuid',
			'noteTitle' => 'Note Title',
			'note' => 'Note',
			'dateCreated' => 'Date Created',
			'maker' => 'Maker',
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
		$criteria->compare('incidentNoteUuid',$this->incidentNoteUuid,true);
		$criteria->compare('incidentUuid',$this->incidentUuid,true);
		$criteria->compare('noteTitle',$this->noteTitle,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TIncidentNotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
