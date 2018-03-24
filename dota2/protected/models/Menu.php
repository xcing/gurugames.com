<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $menuId
 * @property string $name
 * @property string $image
 * @property string $link
 * @property integer $position
 * @property integer $ordinal
 * @property integer $gameId
 * @property integer $parentMenuId
 */
class Menu extends CActiveRecord {

    public $maxOrdinal = 0;
    public $positionArray = array(
        '1' => 'top menu',
        '2' => 'left menu',
    );

    public function getPositionArray() {
        return $this->positionArray;
    }

    public function getPositionValue($positionId) {
        return $this->positionArray[$positionId];
    }

    public function convertPosition($data) {
        return $this->positionArray[$data->position];
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('position, ordinal, gameId, parentMenuId, haveSubMenu', 'numerical', 'integerOnly' => true),
            array('name, image, link', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('menuId, name, image, link, position, ordinal, gameId, parentMenuId, haveSubMenu', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
            'parentMenu' => array(self::BELONGS_TO, 'Menu', 'parentMenuId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'menuId' => 'Menu',
            'name' => 'Name',
            'image' => 'Image',
            'link' => 'Link',
            'position' => 'Position',
            'ordinal' => 'Ordinal',
            'gameId' => 'Game',
            'parentMenuId' => 'Parent Menu',
            'haveSubMenu' => 'Have Sub Menu',
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

        $criteria->compare('menuId', $this->menuId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('position', $this->position);
        $criteria->compare('ordinal', $this->ordinal);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('parentMenuId', $this->parentMenuId);
        $criteria->compare('haveSubMenu', $this->haveSubMenu);
        $criteria->order = 'ordinal ASC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getLastOrdinal($gameId, $parentMenuId) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(ordinal) AS maxOrdinal';
        $criteria->condition = 'gameId = :gameId AND parentMenuId = :parentMenuId';
        $criteria->params = array(
            ':gameId' => $gameId,
            ':parentMenuId' => $parentMenuId,
        );
        $data = $this->find($criteria);
        return ($data['maxOrdinal'] + 1);
    }

    public function filterMenu() {
        $lists = array();
        $lists[0] = array(
            'menuId' => 0,
            'name' => '-- None --',
        );
        $menu_datas = Menu::model()->findAll();
        foreach ($menu_datas as $idx => $data) {
            $lists[$idx + 1] = array(
                'menuId' => $data->menuId,
                'name' => $data->name,
            );
        }
        return $lists;
    }

}