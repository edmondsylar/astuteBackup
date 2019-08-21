<?php

/**
 * This is the model class for table "t_personpositions".
 *
 * The followings are the available columns in table 't_personpositions':
 * @property integer $id
 * @property string $name
 * @property string $maker
 * @property string $supervisor
 * @property string $createdon
 * @property string $status
 * @property string $supervisor_reject_reason
 * @property string $dataEntrant_discard_reason
 */
class TPersonpositions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_personpositions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, maker,', 'required'),
			array('name', 'length', 'max'=>300),
			array('maker', 'length', 'max'=>25),
			array('supervisor', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			array('supervisor_reject_reason, dataEntrant_discard_reason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, maker, supervisor, createdon, status, supervisor_reject_reason, dataEntrant_discard_reason', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'maker' => 'Maker',
			'supervisor' => 'Supervisor',
			'createdon' => 'Createdon',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('createdon',$this->createdon,true);
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
	 * @return TPersonpositions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
