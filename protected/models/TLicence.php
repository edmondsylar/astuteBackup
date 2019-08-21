<?php

/**
 * This is the model class for table "t_licence".
 *
 * The followings are the available columns in table 't_licence':
 * @property integer $id
 * @property string $licenceUuid
 * @property string $clientUuid
 * @property string $intelligence_name
 * @property string $start_date
 * @property string $end_date
 * @property string $timestamp
 * @property string $status
 * @property string $maker
 */
class TLicence extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_licence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licenceUuid, clientUuid, intelligence_name, start_date, end_date, timestamp, maker', 'required'),
			array('licenceUuid', 'length', 'max'=>40),
			array('clientUuid, intelligence_name, maker', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, licenceUuid, clientUuid, intelligence_name, start_date, end_date, timestamp, status, maker', 'safe', 'on'=>'search'),
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
			'licenceUuid' => 'Licence Uuid',
			'clientUuid' => 'Client Uuid',
			'intelligence_name' => 'Intelligence Name',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'timestamp' => 'Timestamp',
			'status' => 'Status',
			'maker' => 'Maker',
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
		$criteria->compare('licenceUuid',$this->licenceUuid,true);
		$criteria->compare('clientUuid',$this->clientUuid,true);
		$criteria->compare('intelligence_name',$this->intelligence_name,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('maker',$this->maker,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TLicence the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
