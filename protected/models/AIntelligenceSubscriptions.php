<?php

/**
 * This is the model class for table "a_intelligence_subscriptions".
 *
 * The followings are the available columns in table 'a_intelligence_subscriptions':
 * @property string $subscriptions_uuid
 * @property string $intelligence_subscription_uid
 * @property string $intelligence_uid
 * @property string $amount
 * @property string $updated_by
 * @property string $updated_on
 * @property string $status
 */
class AIntelligenceSubscriptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_intelligence_subscriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subscriptions_uuid, intelligence_subscription_uid, intelligence_uid, amount, updated_by, updated_on, status', 'required'),
			array('subscriptions_uuid, intelligence_subscription_uid, intelligence_uid, amount, updated_by', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('subscriptions_uuid, intelligence_subscription_uid, intelligence_uid, amount, updated_by, updated_on, status', 'safe', 'on'=>'search'),
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
			'subscriptions_uuid' => 'Subscriptions Uuid',
			'intelligence_subscription_uid' => 'Intelligence Subscription Uid',
			'intelligence_uid' => 'Intelligence Uid',
			'amount' => 'Amount',
			'updated_by' => 'Updated By',
			'updated_on' => 'Updated On',
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

		$criteria->compare('subscriptions_uuid',$this->subscriptions_uuid,true);
		$criteria->compare('intelligence_subscription_uid',$this->intelligence_subscription_uid,true);
		$criteria->compare('intelligence_uid',$this->intelligence_uid,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AIntelligenceSubscriptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
