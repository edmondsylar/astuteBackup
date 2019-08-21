<?php

/**
 * This is the model class for table "t_sdnfetchedinformation".
 *
 * The followings are the available columns in table 't_sdnfetchedinformation':
 * @property string $sdnFetchedInformationUid
 * @property string $sdnInformationFetchDate
 * @property string $noOfSdnRecordsFetched
 */
class TSdnfetchedinformation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_sdnfetchedinformation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sdnFetchedInformationUid, sdnInformationFetchDate, noOfSdnRecordsFetched', 'required'),
			array('sdnFetchedInformationUid', 'length', 'max'=>128),
			array('noOfSdnRecordsFetched', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sdnFetchedInformationUid, sdnInformationFetchDate, noOfSdnRecordsFetched', 'safe', 'on'=>'search'),
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
			'sdnFetchedInformationUid' => 'Sdn Fetched Information Uid',
			'sdnInformationFetchDate' => 'Sdn Information Fetch Date',
			'noOfSdnRecordsFetched' => 'No Of Sdn Records Fetched',
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

		$criteria->compare('sdnFetchedInformationUid',$this->sdnFetchedInformationUid,true);
		$criteria->compare('sdnInformationFetchDate',$this->sdnInformationFetchDate,true);
		$criteria->compare('noOfSdnRecordsFetched',$this->noOfSdnRecordsFetched,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSdnfetchedinformation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
