<?php

/**
 * This is the model class for table "t_service_module_subscriptions".
 *
 * The followings are the available columns in table 't_service_module_subscriptions':
 * @property integer $id
 * @property string $serviceModuleSubscriptionUuid
 * @property string $businessUuid
 * @property string $subscriptionPeriodUuid
 * @property string $endDate
 * @property string $timeStamp
 * @property string $user
 * @property string $status
 */
class TServiceModuleSubscriptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_service_module_subscriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serviceModuleSubscriptionUuid, businessUuid, subscriptionPeriodUuid, endDate, timeStamp, user', 'required'),
			array('serviceModuleSubscriptionUuid, user', 'length', 'max'=>191),
			array('businessUuid, subscriptionPeriodUuid', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, serviceModuleSubscriptionUuid, businessUuid, subscriptionPeriodUuid, endDate, timeStamp, user, status', 'safe', 'on'=>'search'),
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
			'serviceModuleSubscriptionUuid' => 'Service Module Subscription Uuid',
			'businessUuid' => 'Business Uuid',
			'subscriptionPeriodUuid' => 'Subscription Period Uuid',
			'endDate' => 'End Date',
			'timeStamp' => 'Time Stamp',
			'user' => 'User',
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
		$criteria->compare('serviceModuleSubscriptionUuid',$this->serviceModuleSubscriptionUuid,true);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('subscriptionPeriodUuid',$this->subscriptionPeriodUuid,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('timeStamp',$this->timeStamp,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TServiceModuleSubscriptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
