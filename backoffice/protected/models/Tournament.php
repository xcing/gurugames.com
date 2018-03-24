<?php

/**
 * This is the model class for table "tournament".
 *
 * The followings are the available columns in table 'tournament':
 * @property integer $tournamentId
 * @property string $name
 * @property string $url_reward
 * @property string $picture
 * @property string $picture2
 * @property string $startDate
 * @property integer $champId
 * @property integer $secondId
 * @property integer $thirdId
 * @property integer $gameAmount
 * @property integer $finalGameAmount
 * @property integer $type
 * @property integer $roundAmount
 * @property integer $thirdPlace
 * @property integer $status
 * @property integer $gameId
 */
class Tournament extends CActiveRecord {

    public $typeArray = array(
        '1' => 'Single Eliminate',
        '2' => 'Double Eliminate',
        '3' => 'Leauge',
    );

    public function getTypeArray() {
        return $this->typeArray;
    }

    public function getTypeValue($data) {
        return $this->typeArray[$data];
    }

    public function convertType($data) {
        return $this->typeArray[$data->type];
    }
    
    public $thirdPlaceArray = array(
        '0' => 'ไม่มีชิงที่ 3',
        '1' => 'มีชิงที่ 3',
    );

    public function getThirdPlaceArray() {
        return $this->thirdPlaceArray;
    }

    public function getThirdPlaceValue($data) {
        return $this->thirdPlaceArray[$data];
    }

    public function convertThirdPlace($data) {
        return $this->thirdPlaceArray[$data->thirdPlace];
    }
    
    public $statusArray = array(
        '0' => 'กำลังเปิดรับสมัคร', 
        '1' => 'ปิดรับสมัครแล้ว แต่ยังไม่สร้างตาราง', 
        '2' => 'สร้างตารางแล้ว',
        '3' => 'แข่งจบแล้ว',
    );

    public function getStatusArray() {
        return $this->statusArray;
    }

    public function getStatusValue($data) {
        return $this->statusArray[$data];
    }

    public function convertStatus($data) {
        return $this->statusArray[$data->status];
    }
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tournament';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, startDate, deadlineDate, gameId', 'required'),
            array('champId, secondId, thirdId, gameAmount, finalGameAmount, type, roundAmount, thirdPlace, status, gameId', 'numerical', 'integerOnly' => true),
            array('name, reward, url_reward', 'length', 'max' => 100),
            array('picture, picture2', 'length', 'max' => 150),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('tournamentId, name, reward, url_reward, picture, picture2, startDate, deadlineDate, champId, secondId, thirdId, gameAmount, finalGameAmount, type, roundAmount, thirdPlace, status, gameId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'team1' => array(self::BELONGS_TO, 'TournamentTeam', 'champId'),
            'team2' => array(self::BELONGS_TO, 'TournamentTeam', 'secondId'),
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'tournamentId' => 'Tournament',
            'name' => 'Name',
            'reward' => 'Reward',
            'url_reward' => 'Url Reward',
            'picture' => 'Picture',
            'picture2' => 'Picture2',
            'startDate' => 'Start Date',
            'deadlineDate' => 'Deadline Date',
            'champId' => 'Champ',
            'secondId' => 'Second',
            'thirdId' => 'Third',
            'gameAmount' => 'Game Amount',
            'finalGameAmount' => 'Final Game Amount',
            'type' => 'Type',
            'roundAmount' => 'Round Amount',
            'thirdPlace' => 'Third Place',
            'status' => 'Status',
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

        $criteria->compare('tournamentId', $this->tournamentId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('reward', $this->reward, true);
        $criteria->compare('url_reward', $this->url_reward, true);
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('picture2', $this->picture2, true);
        $criteria->compare('startDate', $this->startDate, true);
        $criteria->compare('deadlineDate', $this->deadlineDate, true);
        $criteria->compare('champId', $this->champId);
        $criteria->compare('secondId', $this->secondId);
        $criteria->compare('thirdId', $this->thirdId);
        $criteria->compare('gameAmount', $this->gameAmount);
        $criteria->compare('finalGameAmount', $this->finalGameAmount);
        $criteria->compare('type', $this->type);
        $criteria->compare('roundAmount', $this->roundAmount);
        $criteria->compare('thirdPlace', $this->thirdPlace);
        $criteria->compare('status', $this->status);
        $criteria->compare('gameId', $this->gameId);
        $criteria->order = 'tournamentId DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function editResult($tournamentId = null, $teamChampId = null, $teamSecondId = null)
    {
        $tournamentModel = $this->findByPk($tournamentId);
        $tournamentModel->champId = $teamChampId;
        $tournamentModel->secondId = $teamSecondId;
        $tournamentModel->save();
        /*if(!$tournamentModel->save()){
            print_r($tournamentModel->getErrors());exit;
        }*/
    }
    public function editStatus($tournamentId = null, $status = null)
    {
        $tournamentModel = $this->findByPk($tournamentId);
        $tournamentModel->status = $status;
        $tournamentModel->save();
        /*if(!$tournamentModel->save()){
            print_r($tournamentModel->getErrors());exit;
        }*/
    }

}