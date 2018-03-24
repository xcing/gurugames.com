<?php

/**
 * This is the model class for table "tournament_team".
 *
 * The followings are the available columns in table 'tournament_team':
 * @property integer $teamId
 * @property string $name
 * @property string $shortName
 * @property string $password
 * @property string $email
 * @property string $logo
 * @property string $countryCode
 * @property integer $score
 * @property integer $win
 * @property integer $lose
 * @property integer $gameId
 */
class TournamentTeam extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_team';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, shortName, password, email, logo', 'required'),
            array('shortName, email', 'unique', 'message' => '{attribute} นี้มีอยู่ในระบบแล้ว กรุณาเปลี่ยน {attribute} ใหม่ครับ'),
            array('score, win, lose, gameId', 'numerical', 'integerOnly' => true),
            array('name, password, email', 'length', 'max' => 100),
            array('shortName', 'length', 'max' => 10),
            array('logo', 'length', 'max' => 500),
            array('countryCode', 'length', 'max' => 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('teamId, name, shortName, password, email, logo, countryCode, score, win, lose, gameId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'teamId' => 'Team',
            'name' => 'Name',
            'shortName' => 'ชื่อย่อทีม',
            'password' => 'Password',
            'email' => 'Email',
            'logo' => 'Logo',
            'countryCode' => 'Country Code',
            'score' => 'Score',
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

        $criteria->compare('teamId', $this->teamId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('shortName', $this->shortName, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('countryCode', $this->countryCode, true);
        $criteria->compare('score', $this->score);
        $criteria->compare('win', $this->win);
        $criteria->compare('lose', $this->lose);
        $criteria->compare('gameId', $this->gameId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function editScore($teamWinId, $teamLoseId) {
        $teamWin = $this->findByPk($teamWinId);
        $teamLose = $this->findByPk($teamLoseId);

        $teamWin->win += 1;
        $teamLose->lose += 1;

        $scoreTeamWin = $teamWin->score;
        $scoreTeamLose = $teamLose->score;

        $score = TournamentCalculateScore::getResultScore($scoreTeamWin, $scoreTeamLose);
        $teamWin->score = $score['scoreTeamWin'];
        $teamLose->score = $score['scoreTeamLose'];

        $teamWin->save();
        $teamLose->save();

        TournamentStattour::model()->editScore($teamWinId, $teamLoseId);
    }

    public function cancelScore($teamWinId, $teamLoseId) {
        $teamWin = $this->findByPk($teamWinId);
        $teamLose = $this->findByPk($teamLoseId);

        $teamWin->win -= 1;
        $teamLose->lose -= 1;

        $scoreTeamWin = $teamWin->score;
        $scoreTeamLose = $teamLose->score;

        $score = TournamentCalculateScore::getResultScore($scoreTeamWin, $scoreTeamLose, true);
        $teamWin->score = $score['scoreTeamWin'];
        $teamLose->score = $score['scoreTeamLose'];

        $teamWin->save();
        $teamLose->save();

        TournamentStattour::model()->editScore($teamWinId, $teamLoseId, true);
    }

    public function resetPassword($teamId) {
        $this->getDbTable()->update(array('password' => 'RYphr8fCwGCqKig2VmRvDSvEzpwmsLkfqVX3HWWJE8s'), array('teamId = ?' => $teamId));
    }

}