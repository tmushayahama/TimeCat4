<?php

/**
 * This is the model class for table "tc_user".
 *
 * The followings are the available columns in table 'tc_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $name_title_id
 * @property string $first_name
 * @property string $last_name
 * @property string $institution
 * @property integer $time_zone_id
 * @property string $date_registered
 * @property string $date_joined
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property TcNameTitle $nameTitle
 * @property TcTimeZone $timeZone
 * @property TcUserInvites[] $tcUserInvites
 * @property TcUserInvites[] $tcUserInvites1
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tc_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, name_title_id, first_name, last_name, institution, time_zone_id, date_registered, date_joined, status', 'required'),
			array('name_title_id, time_zone_id, status', 'numerical', 'integerOnly'=>true),
			array('username, password, first_name, last_name, institution', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name_title_id, first_name, last_name, institution, time_zone_id, date_registered, date_joined, status', 'safe', 'on'=>'search'),
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
			'nameTitle' => array(self::BELONGS_TO, 'TcNameTitle', 'name_title_id'),
			'timeZone' => array(self::BELONGS_TO, 'TcTimeZone', 'time_zone_id'),
			'tcUserInvites' => array(self::HAS_MANY, 'TcUserInvites', 'inviter_id'),
			'tcUserInvites1' => array(self::HAS_MANY, 'TcUserInvites', 'invitee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'name_title_id' => 'Name Title',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'institution' => 'Institution',
			'time_zone_id' => 'Time Zone',
			'date_registered' => 'Date Registered',
			'date_joined' => 'Date Joined',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name_title_id',$this->name_title_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('time_zone_id',$this->time_zone_id);
		$criteria->compare('date_registered',$this->date_registered,true);
		$criteria->compare('date_joined',$this->date_joined,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}