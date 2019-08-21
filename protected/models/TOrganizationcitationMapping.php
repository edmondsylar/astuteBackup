<?php

/**
 * This is the model class for table "t_organizationcitation_mapping".
 *
 * The followings are the available columns in table 't_organizationcitation_mapping':
 * @property integer $id
 * @property integer $organization
 * @property integer $citation
 * @property integer $research
 * @property string $status
 * @property string $maker
 * @property string $data_entrant
 * @property string $rejectedreason_dataEntry
 * @property string $discard_reason_researcher
 */
class TOrganizationcitationMapping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_organizationcitation_mapping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organization, citation, research, maker', 'required'),
			array('organization, citation, research', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>1),
			array('maker, data_entrant', 'length', 'max'=>15),
			array('rejectedreason_dataEntry, discard_reason_researcher', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, organization, citation, research, status, maker, data_entrant, rejectedreason_dataEntry, discard_reason_researcher', 'safe', 'on'=>'search'),
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
			'organization' => 'Organization',
			'citation' => 'Citation',
			'research' => 'Research',
			'status' => 'Status',
			'maker' => 'Maker',
			'data_entrant' => 'Data Entrant',
			'rejectedreason_dataEntry' => 'Rejectedreason Data Entry',
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
		$criteria->compare('organization',$this->organization);
		$criteria->compare('citation',$this->citation);
		$criteria->compare('research',$this->research);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('data_entrant',$this->data_entrant,true);
		$criteria->compare('rejectedreason_dataEntry',$this->rejectedreason_dataEntry,true);
		$criteria->compare('discard_reason_researcher',$this->discard_reason_researcher,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TOrganizationcitationMapping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
