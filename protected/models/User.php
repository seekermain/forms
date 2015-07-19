<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $login
 * @property string $realName
 * @property string $password
 * @property string $email
 * @property string $role
 *
 * The followings are the available model relations:
 * @property Requests[] $requests
 */
class User extends CActiveRecord
{
    const ROLE_ADMIN = 'administrator';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, realName, password, email, role', 'required'),
			array('login, realName, password, email', 'length', 'max'=>128),
			array('role', 'length', 'max'=>50),
			array('login','uniqueLogin'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, realName, password, email, role', 'safe', 'on'=>'search'),
		);
	}

	public function uniqueLogin($attribute,$params=array())
	{
	    if(!$this->hasErrors())
	    {
	        $params['criteria']=array(
	            'condition'=>'login=:login',
	            'params'=>array(':login'=>$this->login),
	        );
	        $validator=CValidator::createValidator('unique',$this,$attribute,$params);
	        $validator->validate($this,array($attribute));
	    }
	} 

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'requests' => array(self::HAS_MANY, 'Requests', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
    {
        return array(
            'id' => 'Номер',
            'login' => 'Пользователь',
            'realName' => 'Полное имя',
            'password' => 'Пароль',
            'email' => 'E-mail',
            'role' => 'Тип',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('realName',$this->realName,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    protected function beforeSave(){
    	if(!$this->isNewRecord)
    	{
    		$check_pass = self::model()->findByPk($this->id);
	    	if(is_object($check_pass)&&$this->password!=$check_pass->password)
	        $this->password = md5($this->password);
    	}
    	else
    	{
    		$this->password = md5($this->password);
    	}
        return parent::beforeSave();
    }

    
}
