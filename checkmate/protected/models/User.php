<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $userId
 * @property string $username
 * @property string $password
 * @property string $displayName
 * @property string $createdDate
 */
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_checkmate;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('createdDate', 'required'),
            array('photoFrameId, profilePictureId, active', 'numerical', 'integerOnly' => true),
            array('displayName', 'length', 'max' => 10),
            array('password', 'length', 'max' => 32),
            array('email', 'length', 'max' => 50),
            array('guestId, facebookId', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('userId, email, password, guestId, facebookId, displayName, photoFrameId, profilePictureId, createdDate, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'userId' => 'User',
            'email' => 'Email',
            'password' => 'Password',
            'guestId' => 'Guest ID',
            'facebookId' => 'Facebook ID',
            'displayName' => 'Display Name',
            'photoFrameId' => 'Photo Frame ID',
            'profilePictureId' => 'Profile Picture ID',
            'createdDate' => 'Created Date',
            'active' => 'Active',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('userId', $this->userId);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('guestId', $this->guestId, true);
        $criteria->compare('facebookId', $this->facebookId, true);
        $criteria->compare('displayName', $this->displayName, true);
        $criteria->compare('photoFrameId', $this->photoFrameId, true);
        $criteria->compare('profilePictureId', $this->profilePictureId, true);
        $criteria->compare('createdDate', $this->createdDate, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}