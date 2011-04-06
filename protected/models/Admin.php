<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $createdate
 * @property string $lastmoddate
 */
class Admin extends CActiveRecord {
  /**
   * Returns the static model of the specified AR class.
   * @return Admin the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'admin';
  }

  /**
   * set current datetime in createdate when insert
   */
  public function beforeSave() {
    if (parent::beforeSave()) {
      if ($this->isNewRecord) {
        $this->createdate = new CDbExpression('NOW()');
        $this->password = md5($this->password);
        $this->creator_id = Yii::app()->user->id;
      }
      return true;
    } else  return false;

  }//end-beforeSave

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    //scenario name: insert, update....
    return array(
      array('username, password', 'required', 'on'=>'insert'),
      array('lastname, firstname, email', 'length', 'max'=>255),
      array('phone', 'length', 'max'=>50),
      array('username, password', 'length', 'min'=>6, 'max'=>15),
      array('password', 'match', 'pattern'=>'/^[a-z0-9]+$/', 'message'=>'Password must be formed by the combination of a-z, 0-9'),
      array('email', 'email', 'checkMX'=>true),
      array('username', 'exist', 'attributeName'=>'username', 'on'=>'insert'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, lastname, firstname, email, phone, username, status', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'creator_id' => array(self::BELONGS_TO, 'Admin', 'id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()	{
    return array(
      'id' => 'ID',
      'lastname' => 'Lastname',
      'firstname' => 'Firstname',
      'email' => 'Email',
      'phone' => 'Phone',
      'username' => 'Username',
      'password' => 'Password',
      'status' => 'Status',
      'createdate' => 'Createdate',
      'lastmoddate' => 'Lastmoddate',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
   */
  public function search() {
    // Warning: Please modify the following code to remove attributes that
    // should not be searched.

    $criteria=new CDbCriteria;
    $criteria->compare('id',$this->id);
    $criteria->compare('lastname',$this->lastname,true);
    $criteria->compare('firstname',$this->firstname,true);
    $criteria->compare('email',$this->email,true);
    $criteria->compare('phone',$this->phone,true);
    $criteria->compare('username',$this->username,true);
    $criteria->compare('status',$this->status);

    return new CActiveDataProvider(get_class($this), array(
      'criteria'=>$criteria,
    ));
  }
}