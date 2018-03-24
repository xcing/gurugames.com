<?php

/**
 * This is the model class for table "tournament_relatetourteam".
 *
 * The followings are the available columns in table 'tournament_relatetourteam':
 * @property integer $relateTourTeamId
 * @property integer $tournamentId
 * @property integer $teamId
 */
class TournamentRelatetourteam extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TournamentRelatetourteam the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_relatetourteam';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tournamentId, teamId', 'required'),
            array('tournamentId, teamId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('relateTourTeamId, tournamentId, teamId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'team' => array(self::BELONGS_TO, 'TournamentTeam', 'teamId'),
            'tournament' => array(self::BELONGS_TO, 'Tournament', 'tournamentId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'relateTourTeamId' => 'Relate Tour Team',
            'tournamentId' => 'Tournament',
            'teamId' => 'Team',
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

        $criteria->compare('relateTourTeamId', $this->relateTourTeamId);
        $criteria->compare('tournamentId', $this->tournamentId);
        $criteria->compare('teamId', $this->teamId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}