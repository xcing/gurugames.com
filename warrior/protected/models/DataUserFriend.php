<?php

/**
 * This is the model class for table "data_user_friend".
 *
 * The followings are the available columns in table 'data_user_friend':
 * @property integer $data_user_friendId
 * @property string $data_userId1
 * @property string $data_userId2
 * @property integer $status
 * @property integer $receiveHeartAmount
 */
class DataUserFriend extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DataUserFriend the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_warrior;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'data_user_friend';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('data_userId1, data_userId2, status, receiveHeartAmount', 'required'),
            array('status, receiveHeartAmount', 'numerical', 'integerOnly' => true),
            array('data_userId1, data_userId2', 'length', 'max' => 21),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('data_user_friendId, data_userId1, data_userId2, status, receiveHeartAmount, sendHeartLastedDate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'DataUser', 'data_userId2'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'data_user_friendId' => 'Data User Friend',
            'data_userId1' => 'Data User Id1',
            'data_userId2' => 'Data User Id2',
            'status' => 'Status',
            'receiveHeartAmount' => 'Receive Heart Amount',
            'sendHeartLastedDate' => 'Send Heart Lasted Date',
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

        $criteria->compare('data_user_friendId', $this->data_user_friendId);
        $criteria->compare('data_userId1', $this->data_userId1, true);
        $criteria->compare('data_userId2', $this->data_userId2, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('receiveHeartAmount', $this->receiveHeartAmount);
        $criteria->compare('sendHeartLastedDate', $this->sendHeartLastedDate);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}