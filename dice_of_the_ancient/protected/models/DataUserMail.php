<?php

/**
 * This is the model class for table "data_user_mail".
 *
 * The followings are the available columns in table 'data_user_mail':
 * @property integer $data_user_mailId
 * @property string $userId
 * @property string $mailId
 * @property integer $opened
 */
class DataUserMail extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DataUserMail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_dice;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'data_user_mail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userId, mailId', 'required'),
            array('opened', 'numerical', 'integerOnly' => true),
            array('userId', 'length', 'max' => 21),
            array('mailId', 'length', 'max' => 16),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('data_user_mailId, userId, mailId, opened', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'mail' => array(self::BELONGS_TO, 'Mail', 'mailId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'data_user_mailId' => 'Data User Mail',
            'userId' => 'User',
            'mailId' => 'Mail',
            'opened' => 'Opened',
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

        $criteria->compare('data_user_mailId', $this->data_user_mailId);
        $criteria->compare('userId', $this->userId, true);
        $criteria->compare('mailId', $this->mailId, true);
        $criteria->compare('opened', $this->opened);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}