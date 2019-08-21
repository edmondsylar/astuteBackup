<?php

/**
 * This is the model class for table "t_customertype_category".
 *
 * The followings are the available columns in table 't_customertype_category':
 * @property integer $id
 * @property string $customer_type
 * @property integer $category
 * @property string $maker
 * @property string $status
 */
class TCustomertypeCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_customertype_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_type, category, maker', 'required'),
			array('category', 'numerical', 'integerOnly'=>true),
			array('customer_type', 'length', 'max'=>2),
			array('maker', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customer_type, category, maker, status', 'safe', 'on'=>'search'),
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
			'customer_type' => 'Customer Type',
			'category' => 'Category',
			'maker' => 'Maker',
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
		$criteria->compare('customer_type',$this->customer_type,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TCustomertypeCategory the static model class
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
