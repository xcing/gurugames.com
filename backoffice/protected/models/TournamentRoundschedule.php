<?php

/**
 * This is the model class for table "tournament_roundschedule".
 *
 * The followings are the available columns in table 'tournament_roundschedule':
 * @property string $roundScheduleId
 * @property integer $tournamentId
 * @property integer $round
 * @property string $date
 */
class TournamentRoundschedule extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TournamentRoundschedule the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_roundschedule';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tournamentId, round', 'numerical', 'integerOnly' => true),
            array('date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('roundScheduleId, tournamentId, round, date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'tournament' => array(self::BELONGS_TO, 'Tournament', 'tournamentId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'roundScheduleId' => 'Round Schedule',
            'tournamentId' => 'Tournament',
            'round' => 'Round',
            'date' => 'Date',
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

        $criteria->compare('roundScheduleId', $this->roundScheduleId, true);
        $criteria->compare('tournamentId', $this->tournamentId);
        $criteria->compare('round', $this->round);
        $criteria->compare('date', $this->date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function findRoundsInTour($tournamentId) {
        $rounds = array();
        $resultSet = $this->findAllByAttributes(array(
            'tournamentId' => $tournamentId,
        ));
        if (count($resultSet) > 0) {
            foreach ($resultSet as $row) {
                $round = TournamentRoundschedule::model()->findByPk($row->roundScheduleId);
                $rounds[] = $round;
            }
        }
        return $rounds;
    }
    
    public function findRoundSchedule($tournamentId, $round) {
        $roundSchedule = $this->findByAttributes(array(
            'tournamentId' => $tournamentId,
            'round' => $round,
        ));
        return $roundSchedule;
    }

}