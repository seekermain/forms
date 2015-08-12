<?php

/**
 * This is the model class for table "documents".
 *
 * The followings are the available columns in table 'documents':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $city
 * @property string $area
 * @property string $amount
 * @property string $contribution
 * @property string $need
 * @property string $analysis
 * @property string $datetime
 * @property string $state
 */
class Documents extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, contribution, need', 'numerical', 'integerOnly'=>true),
			array('name, city, area, amount, contribution, need, analysis, state', 'required'),
			array('name', 'length', 'max'=>200),
			array('city, area', 'length', 'max'=>20),
			array('amount, contribution, need', 'length', 'max'=>50),
			array('state', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, name, city, area, amount, contribution, need, analysis, datetime, state', 'safe', 'on'=>'search'),
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
			'reqs' => array(self::HAS_MANY, 'Requests', 'id'),
			'areas' => array(self::BELONGS_TO, 'Area', 'area'),
			'cities' => array(self::BELONGS_TO, 'City', 'city'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер заявки',
			'user_id' => 'ID пользователя',
			'name' => 'Название заявки',
			'city' => 'Города районного подчинения и айыл окмоту',
			'area' => 'Районы и города республиканского и областного подчинения',
			'amount' => 'Стоимость',
			'contribution' => 'Совклад',
			'need' => 'Потребность',
			'analysis' => 'Анализ',
			'datetime' => 'Время создания',
			'state' => 'Статус',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('contribution',$this->contribution,true);
		$criteria->compare('need',$this->need,true);
		$criteria->compare('analysis',$this->analysis,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('state',$this->state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Documents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->user_id = Yii::app()->user->id;
			$this->datetime = date("Y-m-d H:i:s");
			$this->state = 'Save';
		}
		return parent::beforeSave();
	}

	public function translateState($param)
	{
		$translates = array(
			'Save' => 'Сохранено',
			'Inquiry' => 'Запрашивается изменение',
			'Access' => 'Изменение разрешено',
			);
		return $translates[$param];
	}
}
