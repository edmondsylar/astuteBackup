<?php

/**
 * This is the model class for table "a_subscriptions".
 *
 * The followings are the available columns in table 'a_subscriptions':
 * @property string $Intelligence_subscriptionUuid
 * @property string $placedBy
 * @property string $subscriptionUuid
 * @property string $currency_uuid
 * @property integer $total
 * @property string $businessUuid
 * @property string $placedOn
 * @property string $status
 */
class ASubscriptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_subscriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Intelligence_subscriptionUuid, placedBy, subscriptionUuid, currency_uuid, total, businessUuid, placedOn, status', 'required'),
			array('total', 'numerical', 'integerOnly'=>true),
			array('Intelligence_subscriptionUuid, placedBy, subscriptionUuid, currency_uuid', 'length', 'max'=>250),
			array('businessUuid', 'length', 'max'=>40),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Intelligence_subscriptionUuid, placedBy, subscriptionUuid, currency_uuid, total, businessUuid, placedOn, status', 'safe', 'on'=>'search'),
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
			'Intelligence_subscriptionUuid' => 'Intelligence Subscription Uuid',
			'placedBy' => 'Placed By',
			'subscriptionUuid' => 'Subscription Uuid',
			'currency_uuid' => 'Currency Uuid',
			'total' => 'Total',
			'businessUuid' => 'Business Uuid',
			'placedOn' => 'Placed On',
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

		$criteria->compare('Intelligence_subscriptionUuid',$this->Intelligence_subscriptionUuid,true);
		$criteria->compare('placedBy',$this->placedBy,true);
		$criteria->compare('subscriptionUuid',$this->subscriptionUuid,true);
		$criteria->compare('currency_uuid',$this->currency_uuid,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('businessUuid',$this->businessUuid,true);
		$criteria->compare('placedOn',$this->placedOn,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ASubscriptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
