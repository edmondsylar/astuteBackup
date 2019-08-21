<?php

/**
 * This is the model class for table "a_profile_content".
 *
 * The followings are the available columns in table 'a_profile_content':
 * @property string $profileContentUuid
 * @property string $profileUuid
 * @property string $title
 * @property string $content
 * @property string $status
 * @property string $updatedOn
 * @property string $updatedBy
 */
class AProfileContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_profile_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileContentUuid, profileUuid, title, content, status, updatedOn, updatedBy', 'required'),
			array('profileContentUuid, profileUuid, title, updatedBy', 'length', 'max'=>250),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profileContentUuid, profileUuid, title, content, status, updatedOn, updatedBy', 'safe', 'on'=>'search'),
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
			'profileContentUuid' => 'Profile Content Uuid',
			'profileUuid' => 'Profile Uuid',
			'title' => 'Title',
			'content' => 'Content',
			'status' => 'Status',
			'updatedOn' => 'Updated On',
			'updatedBy' => 'Updated By',
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

		$criteria->compare('profileContentUuid',$this->profileContentUuid,true);
		$criteria->compare('profileUuid',$this->profileUuid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updatedOn',$this->updatedOn,true);
		$criteria->compare('updatedBy',$this->updatedBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AProfileContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}