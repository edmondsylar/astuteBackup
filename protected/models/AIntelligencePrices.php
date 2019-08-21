<?php

/**
 * This is the model class for table "a_intelligence_prices".
 *
 * The followings are the available columns in table 'a_intelligence_prices':
 * @property string $intelligence_price_uuid
 * @property string $intelligence_uuid
 * @property string $currency_uuid
 * @property string $amount
 * @property string $description
 * @property string $status
 * @property string $updated_by
 * @property string $updated_On
 */
class AIntelligencePrices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_intelligence_prices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intelligence_price_uuid, intelligence_uuid, currency_uuid, amount, description, status, updated_by, updated_On', 'required'),
			array('intelligence_price_uuid', 'length', 'max'=>500),
			array('intelligence_uuid', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('intelligence_price_uuid, intelligence_uuid, currency_uuid, amount, description, status, updated_by, updated_On', 'safe', 'on'=>'search'),
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
			'intelligence_price_uuid' => 'Intelligence Price Uuid',
			'intelligence_uuid' => 'Intelligence Uuid',
			'currency_uuid' => 'Currency Uuid',
			'amount' => 'Amount',
			'description' => 'Description',
			'status' => 'Status',
			'updated_by' => 'Updated By',
			'updated_On' => 'Updated On',
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

		$criteria->compare('intelligence_price_uuid',$this->intelligence_price_uuid,true);
		$criteria->compare('intelligence_uuid',$this->intelligence_uuid,true);
		$criteria->compare('currency_uuid',$this->currency_uuid,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updated_On',$this->updated_On,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AIntelligencePrices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
