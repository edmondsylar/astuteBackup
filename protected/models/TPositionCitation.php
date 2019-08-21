<?php

/**
 * This is the model class for table "t_position_citation".
 *
 * The followings are the available columns in table 't_position_citation':
 * @property integer $id
 * @property string $Type
 * @property string $Authors
 * @property string $Publish_date
 * @property string $Title
 * @property string $Url
 * @property string $Publisher
 * @property string $Ref_publisher
 * @property string $Access_date
 * @property string $Status
 * @property integer $Position
 * @property string $Created
 */
class TPositionCitation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_position_citation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Type, Authors, Publish_date, Title, Url, Publisher, Access_date, Position', 'required'),
			array('Position', 'numerical', 'integerOnly'=>true),
			array('Type', 'length', 'max'=>7),
			array('Authors, Title, Url, Publisher, Ref_publisher', 'length', 'max'=>255),
			array('Status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Type, Authors, Publish_date, Title, Url, Publisher, Ref_publisher, Access_date, Status, Position, Created', 'safe', 'on'=>'search'),
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
			'Type' => 'Type',
			'Authors' => 'Authors',
			'Publish_date' => 'Publish Date',
			'Title' => 'Title',
			'Url' => 'Url',
			'Publisher' => 'Publisher',
			'Ref_publisher' => 'Ref Publisher',
			'Access_date' => 'Access Date',
			'Status' => 'Status',
			'Position' => 'Position',
			'Created' => 'Created',
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
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Authors',$this->Authors,true);
		$criteria->compare('Publish_date',$this->Publish_date,true);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Url',$this->Url,true);
		$criteria->compare('Publisher',$this->Publisher,true);
		$criteria->compare('Ref_publisher',$this->Ref_publisher,true);
		$criteria->compare('Access_date',$this->Access_date,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Position',$this->Position);
		$criteria->compare('Created',$this->Created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPositionCitation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
