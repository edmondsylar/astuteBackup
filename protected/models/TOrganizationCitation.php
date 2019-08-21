<?php

/**
 * This is the model class for table "t_organization_citation".
 *
 * The followings are the available columns in table 't_organization_citation':
 * @property integer $id
 * @property string $type
 * @property integer $organization
 * @property string $authors
 * @property string $publish_date
 * @property string $title
 * @property string $url
 * @property string $publisher
 * @property string $ref_publisher
 * @property string $access_date
 * @property string $createdon
 * @property string $maker
 * @property string $data_entrant
 * @property string $status
 * @property string $rejected_reason_dataEntry
 * @property string $discard_reason_researcher
 */
class TOrganizationCitation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_organization_citation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, organization, title, url, publisher, access_date, maker', 'required'),
			array('organization', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>7),
			array('authors, title, url, publisher, ref_publisher', 'length', 'max'=>255),
			array('maker, data_entrant', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			array('rejected_reason_dataEntry, discard_reason_researcher', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, organization, authors, publish_date, title, url, publisher, ref_publisher, access_date, createdon, maker, data_entrant, status, rejected_reason_dataEntry, discard_reason_researcher', 'safe', 'on'=>'search'),
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
			'organization' => 'Organization',
			'authors' => 'Authors',
			'publish_date' => 'Publish Date',
			'title' => 'Title',
			'url' => 'Url',
			'publisher' => 'Publisher',
			'ref_publisher' => 'Ref Publisher',
			'access_date' => 'Access Date',
			'createdon' => 'Createdon',
			'maker' => 'Maker',
			'data_entrant' => 'Data Entrant',
			'status' => 'Status',
			'rejected_reason_dataEntry' => 'Rejected Reason Data Entry',
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
		$criteria->compare('organization',$this->organization);
		$criteria->compare('authors',$this->authors,true);
		$criteria->compare('publish_date',$this->publish_date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('publisher',$this->publisher,true);
		$criteria->compare('ref_publisher',$this->ref_publisher,true);
		$criteria->compare('access_date',$this->access_date,true);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('data_entrant',$this->data_entrant,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('rejected_reason_dataEntry',$this->rejected_reason_dataEntry,true);
		$criteria->compare('discard_reason_researcher',$this->discard_reason_researcher,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TOrganizationCitation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
