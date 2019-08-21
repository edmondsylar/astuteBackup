<?php

/**
 * This is the model class for table "t_apilegislative_periods".
 *
 * The followings are the available columns in table 't_apilegislative_periods':
 * @property string $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property integer $slug
 * @property string $csv
 * @property string $csv_url
 * @property integer $legislatures
 * @property string $status
 */
class TApilegislativePeriods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_apilegislative_periods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, start_date, slug, csv, csv_url, legislatures', 'required'),
			array('slug, legislatures', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>25),
			array('name, csv, csv_url', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, start_date, end_date, slug, csv, csv_url, legislatures, status', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'slug' => 'Slug',
			'csv' => 'Csv',
			'csv_url' => 'Csv Url',
			'legislatures' => 'Legislatures',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('slug',$this->slug);
		$criteria->compare('csv',$this->csv,true);
		$criteria->compare('csv_url',$this->csv_url,true);
		$criteria->compare('legislatures',$this->legislatures);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TApilegislativePeriods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
