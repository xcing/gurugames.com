<?php

/**
 * This is the model class for table "tournament_stattour".
 *
 * The followings are the available columns in table 'tournament_stattour':
 * @property integer $statTourId
 * @property integer $team1Id
 * @property integer $team2Id
 * @property integer $win
 * @property integer $lose
 * @property integer $gameId
 */
class TournamentStattour extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TournamentStattour the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_stattour';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('team1Id, team2Id, win, lose, gameId', 'required'),
            array('team1Id, team2Id, win, lose, gameId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('statTourId, team1Id, team2Id, win, lose, gameId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'team1' => array(self::BELONGS_TO, 'TournamentTeam', 'team1Id'),
            'team2' => array(self::BELONGS_TO, 'TournamentTeam', 'team2Id'),
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'statTourId' => 'Stat Tour',
            'team1Id' => 'Team1',
            'team2Id' => 'Team2',
            'win' => 'Win',
            'lose' => 'Lose',
            'gameId' => 'Game',
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

        $criteria->compare('statTourId', $this->statTourId);
        $criteria->compare('team1Id', $this->team1Id);
        $criteria->compare('team2Id', $this->team2Id);
        $criteria->compare('win', $this->win);
        $criteria->compare('lose', $this->lose);
        $criteria->compare('gameId', $this->gameId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function editScore($teamWinId, $teamLoseId, $isCancel = false) {
        $teamWin = $this->findByAttributes(array(
            'team1Id' => $teamWinId,
            'team2Id' => $teamLoseId,
        ));
        $teamLose = $this->findByAttributes(array(
            'team1Id' => $teamLoseId,
            'team2Id' => $teamWinId,
        ));
        $teamModel = TournamentTeam::model()->findByPk($teamWinId);
        
        if (0 == count($teamWin)) {
            //insert win
            $statTourModel = new TournamentStattour;
            $statTourModel->team1Id = $teamWinId;
            $statTourModel->team2Id = $teamLoseId;
            $statTourModel->win = 1;
            $statTourModel->lose = 0;
            $statTourModel->gameId = $teamModel->gameId;
            $statTourModel->save();
        } else {
            //update win
            if (!$isCancel)
                $teamWin->win += 1;
            else
               $teamWin->win -= 1;
            $teamWin->save();
        }
        if (0 == count($teamLose)) {
            //insert lose
            $statTourModel = new TournamentStattour;
            $statTourModel->team1Id = $teamLoseId;
            $statTourModel->team2Id = $teamWinId;
            $statTourModel->win = 0;
            $statTourModel->lose = 1;
            $statTourModel->gameId = $teamModel->gameId;
            $statTourModel->save();
        } else {
            //update lose
            if (!$isCancel)
                $teamLose->lose += 1;
            else
                $teamLose->lose -= 1;
            $teamLose->save();
        }
    }

}