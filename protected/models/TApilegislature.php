<?php

/**
 * This is the model class for table "t_apilegislature".
 *
 * The followings are the available columns in table 't_apilegislature':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $sources_directory
 * @property string $popolo
 * @property string $popolo_url
 * @property string $names
 * @property integer $lastmod
 * @property integer $person_count
 * @property string $sha
 * @property integer $statement_count
 * @property string $type
 * @property string $country
 * @property string $status
 */
class TApilegislature extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_apilegislature';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, slug, sources_directory, popolo, popolo_url, names, lastmod, person_count, sha, statement_count, type, country', 'required'),
			array('lastmod, person_count, statement_count', 'numerical', 'integerOnly'=>true),
			array('name, slug, sources_directory, popolo, popolo_url, names, sha, type', 'length', 'max'=>255),
			array('country', 'length', 'max'=>2),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, slug, sources_directory, popolo, popolo_url, names, lastmod, person_count, sha, statement_count, type, country, status', 'safe', 'on'=>'search'),
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
			'slug' => 'Slug',
			'sources_directory' => 'Sources Directory',
			'popolo' => 'Popolo',
			'popolo_url' => 'Popolo Url',
			'names' => 'Names',
			'lastmod' => 'Lastmod',
			'person_count' => 'Person Count',
			'sha' => 'Sha',
			'statement_count' => 'Statement Count',
			'type' => 'Type',
			'country' => 'Country',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('sources_directory',$this->sources_directory,true);
		$criteria->compare('popolo',$this->popolo,true);
		$criteria->compare('popolo_url',$this->popolo_url,true);
		$criteria->compare('names',$this->names,true);
		$criteria->compare('lastmod',$this->lastmod);
		$criteria->compare('person_count',$this->person_count);
		$criteria->compare('sha',$this->sha,true);
		$criteria->compare('statement_count',$this->statement_count);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TApilegislature the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
