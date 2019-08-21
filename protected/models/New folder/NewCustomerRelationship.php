<?php

/**
 * This is the model class for table "new_customer_relationship".
 *
 * The followings are the available columns in table 'new_customer_relationship':
 * @property integer $relationship_id
 * @property string $conkev_created_on
 * @property string $end_date
 * @property string $name
 * @property string $relation_type
 * @property string $relative_rim
 * @property string $rim
 * @property string $start_date
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewCustomerRelationship $newCustomerNewCustomerRelationship
 */
class NewCustomerRelationship extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_customer_relationship';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('version', 'numerical', 'integerOnly'=>true),
			array('name, relation_type, relative_rim, rim', 'length', 'max'=>255),
			array('conkev_created_on, end_date, start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('relationship_id, conkev_created_on, end_date, name, relation_type, relative_rim, rim, start_date, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewCustomerRelationship' => array(self::HAS_ONE, 'NewCustomerNewCustomerRelationship', 'newCustomerRelationships_relationship_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'relationship_id' => 'Relationship',
			'conkev_created_on' => 'Conkev Created On',
			'end_date' => 'End Date',
			'name' => 'Name',
			'relation_type' => 'Relation Type',
			'relative_rim' => 'Relative Rim',
			'rim' => 'Rim',
			'start_date' => 'Start Date',
			'version' => 'Version',
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

		$criteria->compare('relationship_id',$this->relationship_id);
		$criteria->compare('conkev_created_on',$this->conkev_created_on,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('relation_type',$this->relation_type,true);
		$criteria->compare('relative_rim',$this->relative_rim,true);
		$criteria->compare('rim',$this->rim,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewCustomerRelationship the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
