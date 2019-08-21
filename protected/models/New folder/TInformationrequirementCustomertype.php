<?php

/**
 * This is the model class for table "t_informationrequirement_customertype".
 *
 * The followings are the available columns in table 't_informationrequirement_customertype':
 * @property integer $id
 * @property integer $information_requirement
 * @property string $customer_type
 */
class TInformationrequirementCustomertype extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_informationrequirement_customertype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('information_requirement, customer_type', 'required'),
			array('information_requirement', 'numerical', 'integerOnly'=>true),
			array('customer_type', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, information_requirement, customer_type', 'safe', 'on'=>'search'),
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
			'information_requirement' => 'Information Requirement',
			'customer_type' => 'Customer Type',
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
		$criteria->compare('information_requirement',$this->information_requirement);
		$criteria->compare('customer_type',$this->customer_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TInformationrequirementCustomertype the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        //logging events in audit trail
        public function behaviors()
        {
            return array(
                'LoggableBehavior'=>
                    'application.modules.auditTrail.behaviors.LoggableBehavior',
            );
        }
}
