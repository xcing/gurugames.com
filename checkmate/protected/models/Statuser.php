<?php

/**
 * This is the model class for table "statuser".
 *
 * The followings are the available columns in table 'statuser':
 * @property integer $statuserId
 * @property integer $userId
 * @property integer $gameId
 * @property integer $score
 * @property integer $money
 * @property integer $win
 * @property integer $lose
 * @property integer $draw
 * @property integer $abandon
 */
class Statuser extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Statuser the static model class
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
        return 'statuser';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userId, gameId, score, money, win, lose, draw, abandon, themeEquip, status, currentMatchId, ads', 'numerical', 'integerOnly' => true),
            array('themeHave', 'length', 'max' => 20),
            array('statuserId, userId, gameId, score, money, win, lose, draw, abandon, themeEquip, status, currentMatchId, ads', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'statuserId' => 'Statuser',
            'userId' => 'User',
            'gameId' => 'Game',
            'score' => 'Score',
            'money' => 'Money',
            'win' => 'Win',
            'lose' => 'Lose',
            'draw' => 'Draw',
            'abandon' => 'Abandon',
            'themeHave' => 'Theme Have',
            'themeEquip' => 'Theme Equip',
            'status' => 'Status',
            'currentMatchId' => 'Current Match Id',
            'ads' => 'ADS',
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

        $criteria->compare('statuserId', $this->statuserId);
        $criteria->compare('userId', $this->userId);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('score', $this->score);
        $criteria->compare('money', $this->money);
        $criteria->compare('win', $this->win);
        $criteria->compare('lose', $this->lose);
        $criteria->compare('draw', $this->draw);
        $criteria->compare('abandon', $this->abandon);
        $criteria->compare('themeHave', $this->themeHave);
        $criteria->compare('themeEquip', $this->themeEquip);
        $criteria->compare('status', $this->status);
        $criteria->compare('currentMatchId', $this->currentMatchId);
        $criteria->compare('ads', $this->ads);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}