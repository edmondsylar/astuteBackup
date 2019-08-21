<?php

/**
 * This is the model class for table "new_customer".
 *
 * The followings are the available columns in table 'new_customer':
 * @property integer $client_id
 * @property string $branch_code
 * @property string $cb_status
 * @property string $conkev_date_created
 * @property string $created_by
 * @property string $created_on
 * @property string $customer_type
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $nature
 * @property string $opened_by
 * @property string $opened_on
 * @property string $other_name1
 * @property string $other_name2
 * @property string $other_name3
 * @property string $rim
 * @property string $supervised_by
 * @property string $surpervised_on
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property NewCustomerNewCustomerAddress[] $newCustomerNewCustomerAddresses
 * @property NewCustomerNewCustomerCitizien[] $newCustomerNewCustomerCitiziens
 * @property NewCustomerNewCustomerContact[] $newCustomerNewCustomerContacts
 * @property NewCustomerNewCustomerIncome[] $newCustomerNewCustomerIncomes
 * @property NewCustomerNewCustomerRelationship[] $newCustomerNewCustomerRelationships
 * @property NewCustomerNewLegalCustomerIndustry[] $newCustomerNewLegalCustomerIndustries
 * @property NewCustomerNewLegalCustomerOccupation[] $newCustomerNewLegalCustomerOccupations
 * @property NewCustomerNewLegalGenInfo[] $newCustomerNewLegalGenInfos
 * @property NewCustomerNewNatureCustomerEducation[] $newCustomerNewNatureCustomerEducations
 * @property NewCustomerNewNatureCustomerOccupation[] $newCustomerNewNatureCustomerOccupations
 * @property NewCustomerNewNatureGenInfo[] $newCustomerNewNatureGenInfos
 */
class NewCustomer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'new_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('version', 'numerical', 'integerOnly'=>true),
			array('branch_code, cb_status, created_by, customer_type, first_name, last_name, middle_name, nature, opened_by, other_name1, other_name2, other_name3, rim, supervised_by', 'length', 'max'=>255),
			array('conkev_date_created, created_on, opened_on, surpervised_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('client_id, branch_code, cb_status, conkev_date_created, created_by, created_on, customer_type, first_name, last_name, middle_name, nature, opened_by, opened_on, other_name1, other_name2, other_name3, rim, supervised_by, surpervised_on, version', 'safe', 'on'=>'search'),
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
			'newCustomerNewCustomerAddresses' => array(self::HAS_MANY, 'NewCustomerNewCustomerAddress', 'new_customer_client_id'),
			'newCustomerNewCustomerCitiziens' => array(self::HAS_MANY, 'NewCustomerNewCustomerCitizien', 'new_customer_client_id'),
			'newCustomerNewCustomerContacts' => array(self::HAS_MANY, 'NewCustomerNewCustomerContact', 'new_customer_client_id'),
			'newCustomerNewCustomerIncomes' => array(self::HAS_MANY, 'NewCustomerNewCustomerIncome', 'new_customer_client_id'),
			'newCustomerNewCustomerRelationships' => array(self::HAS_MANY, 'NewCustomerNewCustomerRelationship', 'new_customer_client_id'),
			'newCustomerNewLegalCustomerIndustries' => array(self::HAS_MANY, 'NewCustomerNewLegalCustomerIndustry', 'new_customer_client_id'),
			'newCustomerNewLegalCustomerOccupations' => array(self::HAS_MANY, 'NewCustomerNewLegalCustomerOccupation', 'new_customer_client_id'),
			'newCustomerNewLegalGenInfos' => array(self::HAS_MANY, 'NewCustomerNewLegalGenInfo', 'new_customer_client_id'),
			'newCustomerNewNatureCustomerEducations' => array(self::HAS_MANY, 'NewCustomerNewNatureCustomerEducation', 'new_customer_client_id'),
			'newCustomerNewNatureCustomerOccupations' => array(self::HAS_MANY, 'NewCustomerNewNatureCustomerOccupation', 'new_customer_client_id'),
			'newCustomerNewNatureGenInfos' => array(self::HAS_MANY, 'NewCustomerNewNatureGenInfo', 'new_customer_client_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'client_id' => 'Client',
			'branch_code' => 'Branch Code',
			'cb_status' => 'Cb Status',
			'conkev_date_created' => 'Conkev Date Created',
			'created_by' => 'Created By',
			'created_on' => 'Created On',
			'customer_type' => 'Customer Type',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'middle_name' => 'Middle Name',
			'nature' => 'Nature',
			'opened_by' => 'Opened By',
			'opened_on' => 'Opened On',
			'other_name1' => 'Other Name1',
			'other_name2' => 'Other Name2',
			'other_name3' => 'Other Name3',
			'rim' => 'Rim',
			'supervised_by' => 'Supervised By',
			'surpervised_on' => 'Surpervised On',
			'version' => 'Version',
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

		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('branch_code',$this->branch_code,true);
		$criteria->compare('cb_status',$this->cb_status,true);
		$criteria->compare('conkev_date_created',$this->conkev_date_created,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('customer_type',$this->customer_type,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('nature',$this->nature,true);
		$criteria->compare('opened_by',$this->opened_by,true);
		$criteria->compare('opened_on',$this->opened_on,true);
		$criteria->compare('other_name1',$this->other_name1,true);
		$criteria->compare('other_name2',$this->other_name2,true);
		$criteria->compare('other_name3',$this->other_name3,true);
		$criteria->compare('rim',$this->rim,true);
		$criteria->compare('supervised_by',$this->supervised_by,true);
		$criteria->compare('surpervised_on',$this->surpervised_on,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewCustomer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
