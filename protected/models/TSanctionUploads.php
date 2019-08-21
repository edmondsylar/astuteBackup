<?php

/**
 * This is the model class for table "t_sanction_uploads".
 *
 * The followings are the available columns in table 't_sanction_uploads':
 * @property integer $id
 * @property string $list_name
 * @property string $list_code
 * @property string $version
 * @property string $date_published
 * @property string $file_path
 * @property string $file_type
 * @property integer $file_size
 * @property integer $records
 * @property string $status
 * @property string $extracted
 */
class TSanctionUploads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_sanction_uploads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('list_name, list_code, version, date_published, file_path, file_type, file_size, records', 'required'),
			array('file_size, records', 'numerical', 'integerOnly'=>true),
			array('list_name', 'length', 'max'=>128),
			array('list_code, version, file_type', 'length', 'max'=>25),
			array('file_path', 'length', 'max'=>255),
			array('status, extracted', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, list_name, list_code, version, date_published, file_path, file_type, file_size, records, status, extracted', 'safe', 'on'=>'search'),
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
			'list_name' => 'List Name',
			'list_code' => 'List Code',
			'version' => 'Version',
			'date_published' => 'Date Published',
			'file_path' => 'File Path',
			'file_type' => 'File Type',
			'file_size' => 'File Size',
			'records' => 'Records',
			'status' => 'Status',
			'extracted' => 'Extracted',
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
		$criteria->compare('list_name',$this->list_name,true);
		$criteria->compare('list_code',$this->list_code,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('date_published',$this->date_published,true);
		$criteria->compare('file_path',$this->file_path,true);
		$criteria->compare('file_type',$this->file_type,true);
		$criteria->compare('file_size',$this->file_size);
		$criteria->compare('records',$this->records);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('extracted',$this->extracted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TSanctionUploads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
