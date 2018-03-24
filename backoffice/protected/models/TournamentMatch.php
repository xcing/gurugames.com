<?php

/**
 * This is the model class for table "tournament_match".
 *
 * The followings are the available columns in table 'tournament_match':
 * @property integer $matchId
 * @property integer $team1Id
 * @property integer $team2Id
 * @property integer $teamSide
 * @property integer $round
 * @property integer $result
 * @property integer $winnerMatchId
 * @property integer $loserMatchId
 * @property integer $tournamentId
 * @property integer $ordinal
 */
class TournamentMatch extends CActiveRecord {

    private $_matchResults;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_match';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tournamentId, ordinal', 'required'),
            array('team1Id, team2Id, teamSide, round, loserRound, result, winnerMatchId, loserMatchId, tournamentId, ordinal', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('matchId, team1Id, team2Id, teamSide, round, loserRound, result, winnerMatchId, loserMatchId, tournamentId, ordinal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'team1' => array(self::BELONGS_TO, 'TournamentTeam', 'team1Id'),
            'team2' => array(self::BELONGS_TO, 'TournamentTeam', 'team2Id'),
            'tournament' => array(self::BELONGS_TO, 'Tournament', 'tournamentId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'matchId' => 'Match',
            'team1Id' => 'Team1',
            'team2Id' => 'Team2',
            'teamSide' => 'Team Side',
            'round' => 'Round',
            'loserRound' => 'Loser Round',
            'result' => 'Result',
            'winnerMatchId' => 'Winner Match',
            'loserMatchId' => 'Loser Match',
            'tournamentId' => 'Tournament',
            'ordinal' => 'Ordinal',
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
        $criteria->compare('team1Id', $this->team1Id);
        $criteria->compare('team2Id', $this->team2Id);
        $criteria->compare('teamSide', $this->teamSide);
        $criteria->compare('round', $this->round);
        $criteria->compare('loserRound', $this->loserRound);
        $criteria->compare('result', $this->result);
        $criteria->compare('winnerMatchId', $this->winnerMatchId);
        $criteria->compare('loserMatchId', $this->loserMatchId);
        $criteria->compare('tournamentId', $this->tournamentId);
        $criteria->compare('ordinal', $this->ordinal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function saveAll(&$models) {
        foreach ($models as $model) {
            $model->save();
        }
    }

    public function editResult($matchId = null, $result = null, $isFinalRound = false) {
        $matchModel = $this->findByPk($matchId);
        $matchModel->result = $result;
        $matchModel->save();

        if ($result == 1) {
            $teamWinId = $matchModel->team1Id;
            $teamLoseId = $matchModel->team2Id;
        } else {
            $teamWinId = $matchModel->team2Id;
            $teamLoseId = $matchModel->team1Id;
        }

        if ($isFinalRound) {
            $tournamentModel = new Tournament;
            $tournamentModel->editResult($matchModel->tournamentId, $teamWinId, $teamLoseId);
            $tournamentModel->editStatus($matchModel->tournamentId, 3);
        } else {
            $nextMatchModel = $this->findByPk($matchModel->winnerMatchId);
            if ($matchModel->ordinal % 2 != 0) {
                $nextMatchModel->team1Id = $teamWinId;
            } else {
                $nextMatchModel->team2Id = $teamWinId;
            }
            $nextMatchModel->save();
        }
    }

    public function bothLoseBye($matchId = null) {
        $matchModel = $this->findByPk($matchId);
        $matchModel->result = 0;
        $matchModel->save();
        
        if (0 == count($matchModel)) {
            return;
        }
        $ordinal = $matchModel->ordinal;

        if ($ordinal % 2 != 0) {
            $result = '2';
        } else {
            $result = '1';
        }
        
        $data = array($result, $matchModel->winnerMatchId);

        // move team auto win to next match
        $nextMatchModel = $this->findByPk($matchModel->winnerMatchId);
        if (0 == count($nextMatchModel)) {
            return;
        }
        $nextMatchModel->result = $result;
        
        if ($ordinal % 2 != 0) {
            $teamAutoWin = $nextMatchModel->team2Id;
        } else {
            $teamAutoWin = $nextMatchModel->team1Id;
        }
        $nextMatchModel->save();
        
        $next2MatchModel = $this->findByPk($nextMatchModel->winnerMatchId);
        if ($nextMatchModel->ordinal % 2 != 0) {
            $next2MatchModel->team1Id = $teamAutoWin;
        } else {
            $next2MatchModel->team2Id = $teamAutoWin;
        }
        $next2MatchModel->save();

        return $data;
    }

    public function cancelResult($matchId = null, $parentId, $ordinal) {
        $matchModel = $this->findByPk($matchId);
        $matchModel->result = null;
        $matchModel->save();
        
        $WinnerMatchModel = $this->findByPk($parentId);
        if ($ordinal % 2 != 0) {
            $WinnerMatchModel->team1Id = 0;
        } else {
            $WinnerMatchModel->team2Id = 0;
        }
        $WinnerMatchModel->save();
    }

    public function findMatchesInTournament($tournamentId) {
        $resultSet = $this->findAllByAttributes(array(
            'tournamentId' => $tournamentId,
                ), array(
            'order' => 'round, ordinal',
        ));

        if (count($resultSet) > 0) {
            $matchResults = array();
            $previousMatchId = 0;

            foreach ($resultSet as $row) {
                $match = TournamentMatch::model()->findByPk($row->matchId);

                if ($previousMatchId == $match->matchId) {
                    $match = array_pop($matches);
                } else {
                    $matchResults = array();
                    $previousMatchId = $match->matchId;
                }
                $matchResult = TournamentMatchresult::model()->findAllByAttributes(array('matchId' => $row->matchId));
                if (!empty($matchResult)) {
                    $matchResults[] = $matchResult;
                    $match->setMatchResults($matchResult);
                }
                $matches[] = $match;
            }
        }

        return $matches;
    }

    public function getMatchResults() {
        return $this->_matchResults;
    }

    public function setMatchResults($matchResults) {
        $this->_matchResults = $matchResults;
    }

}