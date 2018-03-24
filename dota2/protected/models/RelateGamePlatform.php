<?php

/**
 * This is the model class for table "relate_game_platform".
 *
 * The followings are the available columns in table 'relate_game_platform':
 * @property integer $relate_game_platformId
 * @property integer $gameId
 * @property integer $platformId
 * @property integer $webDownload
 * @property integer $webOfficial
 */
class RelateGamePlatform extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'relate_game_platform';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gameId, platformId', 'numerical', 'integerOnly' => true),
            array('webDownload, webOfficial', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('relate_game_platformId, gameId, platformId, webDownload, webOfficial', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'platform' => array(self::BELONGS_TO, 'Platform', 'platformId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'relate_game_platformId' => 'Relate Game Platform',
            'gameId' => 'Game',
            'platformId' => 'Platform',
            'webDownload' => 'Web Download',
            'webOfficial' => 'Web Official',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('relate_game_platformId', $this->relate_game_platformId);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('platformId', $this->platformId);
        $criteria->compare('webDownload', $this->webDownload, true);
        $criteria->compare('webOfficial', $this->webOfficial, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RelateGamePlatform the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
