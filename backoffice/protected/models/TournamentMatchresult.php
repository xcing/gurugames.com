<?php

/**
 * This is the model class for table "tournament_matchresult".
 *
 * The followings are the available columns in table 'tournament_matchresult':
 * @property integer $matchResultId
 * @property integer $result
 * @property integer $matchId
 * @property string $screenshot
 * @property integer $amountGame
 */
class TournamentMatchresult extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TournamentMatchresult the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_matchresult';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('matchId', 'required'),
            array('result, matchId, game', 'numerical', 'integerOnly' => true),
            array('screenshot', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('matchResultId, result, matchId, screenshot, game, dateCreated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'match' => array(self::BELONGS_TO, 'Match', 'matchId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'matchResultId' => 'Match Result',
            'result' => 'Result',
            'matchId' => 'Match',
            'screenshot' => 'Screenshot',
            'game' => 'Game',
            'dateCreated' => 'Date Created',
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

        $criteria->compare('matchResultId', $this->matchResultId);
        $criteria->compare('result', $this->result);
        $criteria->compare('matchId', $this->matchId);
        $criteria->compare('screenshot', $this->screenshot, true);
        $criteria->compare('game', $this->game);
        $criteria->compare('dateCreated', $this->dateCreated);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function checkResult($matchId = null, $amount = 1) {
        $criteria = new CDbCriteria();
        $criteria->select = 'count(*) as result';
        $criteria->condition = 'matchId=:matchId AND result=1';
        $criteria->params = array(':matchId' => $matchId);
        $result1 = $this->model()->find($criteria);
        $criteria = new CDbCriteria();
        $criteria->select = 'count(*) as result';
        $criteria->condition = 'matchId=:matchId AND result=2';
        $criteria->params = array(':matchId' => $matchId);
        $result2 = $this->model()->find($criteria);

        $amountForWin = (floor($amount / 2)) + 1;
        if ((int) $result1->result >= $amountForWin) {
            return 1;
        } else if ((int) $result2->result >= $amountForWin) {
            return 2;
        } else {
            return null;
        }
    }

}