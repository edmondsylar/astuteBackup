<?php

/**
 * This is the model class for table "t_profile_search_results".
 *
 * The followings are the available columns in table 't_profile_search_results':
 * @property string $profileSearchResultUuid
 * @property string $searchUuid
 * @property string $profileUuid
 * @property string $status
 * @property string $UpdatedOn
 */
class TProfileSearchResults extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_profile_search_results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profileSearchResultUuid, searchUuid, profileUuid, status, UpdatedOn', 'required'),
			array('profileSearchResultUuid, searchUuid, profileUuid, status', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('profileSearchResultUuid, searchUuid, profileUuid, status, UpdatedOn', 'safe', 'on'=>'search'),
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
			'profileSearchResultUuid' => 'Profile Search Result Uuid',
			'searchUuid' => 'Search Uuid',
			'profileUuid' => 'Profile Uuid',
			'status' => 'Status',
			'UpdatedOn' => 'Updated On',
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

		$criteria->compare('profileSearchResultUuid',$this->profileSearchResultUuid,true);
		$criteria->compare('searchUuid',$this->searchUuid,true);
		$criteria->compare('profileUuid',$this->profileUuid,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('UpdatedOn',$this->UpdatedOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TProfileSearchResults the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
