<?php

/**
 * This is the model class for table "t_subscription_durations".
 *
 * The followings are the available columns in table 't_subscription_durations':
 * @property integer $id
 * @property string $subscriptionDurationUuid
 * @property string $subscriptionDurationName
 * @property integer $numberOfDays
 * @property string $updateOn
 * @property string $updateBy
 * @property string $status
 */
class TSubscriptionDurations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_subscription_durations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subscriptionDurationUuid, subscriptionDurationName, numberOfDays, updateOn, updateBy', 'required'),
			array('numberOfDays', 'numerical', 'integerOnly'=>true),
			array('subscriptionDurationUuid, subscriptionDurationName, updateBy', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subscriptionDurationUuid, subscriptionDurationName, numberOfDays, updateOn, updateBy, status', 'safe', 'on'=>'search'),
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
			'subscriptionDurationUuid' => 'Subscription Duration Uuid',
			'subscriptionDurationName' => 'Subscription Duration Name',
			'numberOfDays' => 'Number Of Days',
			'updateOn' => 'Update On',
			'updateBy' => 'Update By',
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
		$criteria->compare('subscriptionDurationUuid',$this->subscriptionDurationUuid,true);
		$criteria->compare('subscriptionDurationName',$this->subscriptionDurationName,true);
		$criteria->compare('numberOfDays',$this->numberOfDays);
		$criteria->compare('updateOn',$this->updateOn,true);
		$criteria->compare('updateBy',$this->updateBy,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSubscriptionDurations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
