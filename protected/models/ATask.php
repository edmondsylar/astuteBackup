<?php

/**
 * This is the model class for table "a_task".
 *
 * The followings are the available columns in table 'a_task':
 * @property string $taskUuid
 * @property string $task_Name
 * @property string $description
 * @property string $status
 * @property string $updatedBy
 * @property string $updatedOn
 * @property string $businessUuid
 */
class ATask extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taskUuid, task_Name, description, status, updatedBy, updatedOn, businessUuid', 'required'),
			array('taskUuid, task_Name, description, updatedBy, businessUuid', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('taskUuid, task_Name, description, status, updatedBy, updatedOn, businessUuid', 'safe', 'on'=>'search'),
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
			'taskUuid' => 'Task Uuid',
			'task_Name' => 'Task Name',
			'description' => 'Description',
			'status' => 'Status',
			'updatedBy' => 'Updated By',
			'updatedOn' => 'Updated On',
			'businessUuid' => 'Business Uuid',
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

		$criteria->compare('taskUuid',$this->taskUuid,true);
		$criteria->compare('task_Name',$this->task_Name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ATask the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
