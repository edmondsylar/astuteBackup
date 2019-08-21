<?php

/**
 * This is the model class for table "t_personphotourl".
 *
 * The followings are the available columns in table 't_personphotourl':
 * @property integer $id
 * @property string $person
 * @property string $url
 * @property string $image_name
 * @property string $type
 * @property string $temp_name
 * @property string $size
 * @property string $date_Created
 * @property string $maker
 * @property string $status
 */
class TPersonPhotoUrl extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_personphotourl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('person, url, maker', 'required'),
			array('person, image_name, type, temp_name, size', 'length', 'max'=>255),
			array('maker', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, person, url, image_name, type, temp_name, size, date_Created, maker, status', 'safe', 'on'=>'search'),
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
			'person' => 'Person',
			'url' => 'Url',
			'image_name' => 'Image Name',
			'type' => 'Type',
			'temp_name' => 'Temp Name',
			'size' => 'Size',
			'date_Created' => 'Date Created',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('person',$this->person,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('image_name',$this->image_name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('temp_name',$this->temp_name,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('date_Created',$this->date_Created,true);
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
	 * @return TPersonPhotoUrl the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
