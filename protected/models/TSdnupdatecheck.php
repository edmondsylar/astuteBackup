<?php

/**
 * This is the model class for table "t_sdnupdatecheck".
 *
 * The followings are the available columns in table 't_sdnupdatecheck':
 * @property string $sdnUpdateCheckUid
 * @property string $sdnUpdateCheckDate
 * @property string $sdnPublishDate
 */
class TSdnupdatecheck extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_sdnupdatecheck';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sdnUpdateCheckUid, sdnUpdateCheckDate, sdnPublishDate', 'required'),
			array('sdnUpdateCheckUid', 'length', 'max'=>128),
			array('sdnPublishDate', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sdnUpdateCheckUid, sdnUpdateCheckDate, sdnPublishDate', 'safe', 'on'=>'search'),
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
			'sdnUpdateCheckUid' => 'Sdn Update Check Uid',
			'sdnUpdateCheckDate' => 'Sdn Update Check Date',
			'sdnPublishDate' => 'Sdn Publish Date',
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

		$criteria->compare('sdnUpdateCheckUid',$this->sdnUpdateCheckUid,true);
		$criteria->compare('sdnUpdateCheckDate',$this->sdnUpdateCheckDate,true);
		$criteria->compare('sdnPublishDate',$this->sdnPublishDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSdnupdatecheck the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
