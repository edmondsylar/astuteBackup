<?php

/**
 * This is the model class for table "t_intelligence".
 *
 * The followings are the available columns in table 't_intelligence':
 * @property integer $id
 * @property string $intelligence_uuid
 * @property string $intelligence_name
 * @property string $intelligence_category_name
 * @property string $intelligence_category_status
 * @property string $intelligence_category_timestamp
 * @property string $maker
 */
class TIntelligence extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_intelligence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intelligence_uuid, intelligence_name, intelligence_category_name, intelligence_category_timestamp, maker', 'required'),
			array('intelligence_uuid, intelligence_name, intelligence_category_name, maker', 'length', 'max'=>255),
			array('intelligence_category_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, intelligence_uuid, intelligence_name, intelligence_category_name, intelligence_category_status, intelligence_category_timestamp, maker', 'safe', 'on'=>'search'),
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
			'intelligence_uuid' => 'Intelligence Uuid',
			'intelligence_name' => 'Intelligence Name',
			'intelligence_category_name' => 'Intelligence Category Name',
			'intelligence_category_status' => 'Intelligence Category Status',
			'intelligence_category_timestamp' => 'Intelligence Category Timestamp',
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
		$criteria->compare('intelligence_uuid',$this->intelligence_uuid,true);
		$criteria->compare('intelligence_name',$this->intelligence_name,true);
		$criteria->compare('intelligence_category_name',$this->intelligence_category_namex,true);
		$criteria->compare('intelligence_category_status',$this->intelligence_category_status,true);
		$criteria->compare('intelligence_category_timestamp',$this->intelligence_category_timestamp,true);
		$criteria->compare('maker',$this->maker,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TIntelligence the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
