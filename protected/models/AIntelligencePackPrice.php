<?php

/**
 * This is the model class for table "a_intelligence_pack_price".
 *
 * The followings are the available columns in table 'a_intelligence_pack_price':
 * @property string $intelligencePackPriceUuid
 * @property string $intelligencePackUuid
 * @property string $currency
 * @property integer $amount
 * @property string $status
 * @property string $updatedOn
 * @property string $updatedBy
 */
class AIntelligencePackPrice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_intelligence_pack_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intelligencePackPriceUuid, intelligencePackUuid, currency, amount, updatedOn, updatedBy', 'required'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('intelligencePackPriceUuid, updatedBy', 'length', 'max'=>25),
			array('intelligencePackUuid', 'length', 'max'=>30),
			array('currency', 'length', 'max'=>5),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('intelligencePackPriceUuid, intelligencePackUuid, currency, amount, status, updatedOn, updatedBy', 'safe', 'on'=>'search'),
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
			'intelligencePackPriceUuid' => 'Intelligence Pack Price Uuid',
			'intelligencePackUuid' => 'Intelligence Pack Uuid',
			'currency' => 'Currency',
			'amount' => 'Amount',
			'status' => 'Status',
			'updatedOn' => 'Updated On',
			'updatedBy' => 'Updated By',
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

		$criteria->compare('intelligencePackPriceUuid',$this->intelligencePackPriceUuid,true);
		$criteria->compare('intelligencePackUuid',$this->intelligencePackUuid,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AIntelligencePackPrice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
