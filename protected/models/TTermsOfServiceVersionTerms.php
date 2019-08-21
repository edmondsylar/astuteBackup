<?php

/**
 * This is the model class for table "t_terms_of_service_version_terms".
 *
 * The followings are the available columns in table 't_terms_of_service_version_terms':
 * @property string $termUuid
 * @property string $VersionOfTermsOfServiceUuid
 * @property string $title
 * @property string $content
 * @property string $dateCreated
 * @property string $maker
 * @property string $status
 */
class TTermsOfServiceVersionTerms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_terms_of_service_version_terms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('termUuid, VersionOfTermsOfServiceUuid, title, content, dateCreated, maker, status', 'required'),
			array('termUuid, VersionOfTermsOfServiceUuid, title, content, maker, status', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('termUuid, VersionOfTermsOfServiceUuid, title, content, dateCreated, maker, status', 'safe', 'on'=>'search'),
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
			'termUuid' => 'Term Uuid',
			'VersionOfTermsOfServiceUuid' => 'Version Of Terms Of Service Uuid',
			'title' => 'Title',
			'content' => 'Content',
			'dateCreated' => 'Date Created',
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

		$criteria->compare('termUuid',$this->termUuid,true);
		$criteria->compare('VersionOfTermsOfServiceUuid',$this->VersionOfTermsOfServiceUuid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
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
	 * @return TTermsOfServiceVersionTerms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
