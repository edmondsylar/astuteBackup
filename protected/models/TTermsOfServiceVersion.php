<?php

/**
 * This is the model class for table "t_terms_of_service_version".
 *
 * The followings are the available columns in table 't_terms_of_service_version':
 * @property integer $id
 * @property string $versionUuid
 * @property integer $versionId
 * @property string $dateCreated
 * @property string $maker
 * @property string $description
 * @property string $status
 */
class TTermsOfServiceVersion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_terms_of_service_version';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('versionUuid, versionId, dateCreated, maker, description', 'required'),
			array('versionId', 'numerical', 'integerOnly'=>true),
			array('versionUuid, maker', 'length', 'max'=>25),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, versionUuid, versionId, dateCreated, maker, description, status', 'safe', 'on'=>'search'),
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
			'versionUuid' => 'Version Uuid',
			'versionId' => 'Version',
			'dateCreated' => 'Date Created',
			'maker' => 'Maker',
			'description' => 'Description',
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
		$criteria->compare('versionUuid',$this->versionUuid,true);
		$criteria->compare('versionId',$this->versionId);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TTermsOfServiceVersion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
