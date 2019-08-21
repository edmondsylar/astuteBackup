<?php

/**
 * This is the model class for table "t_profile_search".
 *
 * The followings are the available columns in table 't_profile_search':
 * @property string $searchUuid
 * @property string $searchText
 * @property string $searchedOn
 * @property string $searchedBy
 * @property string $status
 */
class TProfileSearch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_profile_search';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('searchUuid, searchText, searchedOn, searchedBy, status', 'required'),
			array('searchUuid, searchText, searchedOn, searchedBy, status', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchUuid, searchText, searchedOn, searchedBy, status', 'safe', 'on'=>'search'),
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
			'searchUuid' => 'Search Uuid',
			'searchText' => 'Search Text',
			'searchedOn' => 'Searched On',
			'searchedBy' => 'Searched By',
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

		$criteria->compare('searchUuid',$this->searchUuid,true);
		$criteria->compare('searchText',$this->searchText,true);
		$criteria->compare('searchedOn',$this->searchedOn,true);
		$criteria->compare('searchedBy',$this->searchedBy,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TProfileSearch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
