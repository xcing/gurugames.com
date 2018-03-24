<?php

/**
 * This is the model class for table "match".
 *
 * The followings are the available columns in table 'match':
 * @property integer $matchId
 * @property integer $gameId
 * @property integer $userId1
 * @property integer $userId2
 * @property integer $result
 * @property string $history
 * @property string $createdDate
 */
class Match extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Match the static model class
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
        return 'match';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('createdDate', 'required'),
            array('gameId, userId1, userId2, result, scoreMatch1, scoreMatch2, score1win, score1lose, score2win, score2lose', 'numerical', 'integerOnly' => true),
            array('history', 'length', 'max' => 18000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('matchId, gameId, userId1, userId2, result, scoreMatch1, scoreMatch2, score1win, score1lose, score2win, score2lose, history, createdDate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'statuser1' => array(self::BELONGS_TO, 'Statuser', 'userId1'),
            'statuser2' => array(self::BELONGS_TO, 'Statuser', 'userId2'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'matchId' => 'Match',
            'gameId' => 'Game',
            'userId1' => 'User Id1',
            'userId2' => 'User Id2',
            'result' => 'Result',
            'scoreMatch1' => 'Score Match 1',
            'scoreMatch2' => 'Score Match 2',
            'score1win' => 'Score 1 Win',
            'score1lose' => 'Score 1 Lose',
            'score2win' => 'Score 2 Win',
            'score2lose' => 'Score 2 Lose',
            'history' => 'History',
            'createdDate' => 'Created Date',
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

        $criteria->compare('matchId', $this->matchId);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('userId1', $this->userId1);
        $criteria->compare('userId2', $this->userId2);
        $criteria->compare('result', $this->result);
        $criteria->compare('scoreMatch1', $this->scoreMatch1);
        $criteria->compare('scoreMatch2', $this->scoreMatch2);
        $criteria->compare('score1win', $this->score1win);
        $criteria->compare('score1lose', $this->score1lose);
        $criteria->compare('score2win', $this->score2win);
        $criteria->compare('score2lose', $this->score2lose);
        $criteria->compare('history', $this->history, true);
        $criteria->compare('createdDate', $this->createdDate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}