<?php

/**
 * This is the model class for table "tournament_appointment".
 *
 * The followings are the available columns in table 'tournament_appointment':
 * @property integer $appointmentId
 * @property integer $matchId
 * @property integer $teamId
 * @property string $detail
 * @property string $date
 */
class TournamentAppointment extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TournamentAppointment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament_appointment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('matchId, teamId', 'numerical', 'integerOnly' => true),
            array('detail, date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('appointmentId, matchId, teamId, detail, date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'team' => array(self::BELONGS_TO, 'TournamentTeam', 'teamId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'appointmentId' => 'Appointment',
            'matchId' => 'Match',
            'teamId' => 'Team',
            'detail' => 'Detail',
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

        $criteria->compare('appointmentId', $this->appointmentId);
        $criteria->compare('matchId', $this->matchId);
        $criteria->compare('teamId', $this->teamId);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('date', $this->date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}