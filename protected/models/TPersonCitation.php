<?php

/**
 * This is the model class for table "t_person_citation".
 *
 * The followings are the available columns in table 't_person_citation':
 * @property integer $id
 * @property string $type
 * @property string $authors
 * @property string $publish_date
 * @property string $title
 * @property string $url
 * @property string $publisher
 * @property string $ref_publisher
 * @property string $access_date
 * @property string $status
 * @property string $person
 * @property string $created_on
 * @property string $maker
 * @property string $data_entrant
 * @property string $rejectedreason_dataEntry
 * @property string $discard_reason_researcher
 */
class TPersonCitation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_person_citation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, authors, title, url, publisher, access_date, person, maker', 'required'),
			array('type', 'length', 'max'=>7),
			array('authors, title, publisher, ref_publisher, person', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('maker, data_entrant', 'length', 'max'=>15),
			array('rejectedreason_dataEntry, discard_reason_researcher', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, authors, publish_date, title, url, publisher, ref_publisher, access_date, status, person, created_on, maker, data_entrant, rejectedreason_dataEntry, discard_reason_researcher', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'authors' => 'Authors',
			'publish_date' => 'Publish Date',
			'title' => 'Title',
			'url' => 'Url',
			'publisher' => 'Publisher',
			'ref_publisher' => 'Ref Publisher',
			'access_date' => 'Access Date',
			'status' => 'Status',
			'person' => 'Person',
			'created_on' => 'Created On',
			'maker' => 'Maker',
			'data_entrant' => 'Data Entrant',
			'rejectedreason_dataEntry' => 'Rejectedreason Data Entry',
			'discard_reason_researcher' => 'Discard Reason Researcher',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('authors',$this->authors,true);
		$criteria->compare('publish_date',$this->publish_date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('publisher',$this->publisher,true);
		$criteria->compare('ref_publisher',$this->ref_publisher,true);
		$criteria->compare('access_date',$this->access_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('person',$this->person,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('data_entrant',$this->data_entrant,true);
		$criteria->compare('rejectedreason_dataEntry',$this->rejectedreason_dataEntry,true);
		$criteria->compare('discard_reason_researcher',$this->discard_reason_researcher,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPersonCitation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
