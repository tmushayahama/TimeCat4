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
 * @property string $create_date
 * @property string $joined_time
 * @property string $last_login_time
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property NameTitle $nameTitle
 * @property UserInvites[] $userInvites
 * @property UserInvites[] $userInvites1
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
			array('username, password, name_title_id, first_name, last_name, institution, status', 'required'),
			array('name_title_id, status', 'numerical', 'integerOnly'=>true),
			array('username, password, first_name, last_name, institution', 'length', 'max'=>128),
			array('create_date, joined_time, last_login_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name_title_id, first_name, last_name, institution, create_date, joined_time, last_login_time, status', 'safe', 'on'=>'search'),
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
			'nameTitle' => array(self::BELONGS_TO, 'NameTitle', 'name_title_id'),
			'userInvites' => array(self::HAS_MANY, 'UserInvites', 'inviter_id'),
			'userInvites1' => array(self::HAS_MANY, 'UserInvites', 'invitee_id'),
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
			'create_date' => 'Create Date',
			'joined_time' => 'Joined Time',
			'last_login_time' => 'Last Login Time',
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
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('joined_time',$this->joined_time,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}