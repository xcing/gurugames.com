<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $md5_password
 * @property string $usergroup
 * @property string $created
 * @property string $updated
 * @property string $lastlogin
 */
class User extends CActiveRecord {

    public $current_password;
    public $current_password_md5;
    public $new_password;
    public $new_password_repeat;
    public $confirm_password;
    public $roleArray = array(
        1 => 'admin',
        2 => 'mod',
        3 => 'general',
    );
    
    public $activeArray = array(
        0 => 'ไม่ใช้งาน',
        1 => 'ใช้งาน',
    );

    public function getRoleArray() {
        return $this->roleArray;
    }

    public function getRoleValue($roleId) {
        return $this->roleArray[$roleId];
    }

    public function convertRole($data) {
        return $this->roleArray[$data->role];
    }

    public function getActiveArray() {
        return $this->activeArray;
    }

    public function getActiveValue($activeId) {
        return $this->activeArray[$activeId];
    }

    public function convertActive($data) {
        return $this->activeArray[$data->active];
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('confirm_password', 'compare', 'compareAttribute' => 'md5_password', 'on' => 'register', 'message' => 'Confirm Password not matched.'),
            array('current_password_md5', 'compare', 'compareAttribute' => 'md5_password', 'on' => 'changepassword', 'message' => 'Current password not matched.'),
            array('current_password, new_password, new_password_repeat', 'required', 'on' => 'changepassword'),
            array('new_password', 'length', 'min' => 8, 'max' => 16),
            array('new_password', 'compare'),
            array('new_password_repeat', 'safe'),
            //array('new_password', 'ext.validators.EPasswordStrength', 'min' => 8, 'message' => 'รหัสผ่านง่ายเกินไป รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว ประกอบไปด้วย ตัวภาษาอังกฤษอย่างน้อย 1 ตัว, ตัวเลขอย่างน้อย 1 ตัว', 'on' => 'changepassword'),
            array('displayName, username', 'required', 'message' => '{attribute} must not be empty'),
            array('role, active', 'numerical', 'integerOnly' => true, 'message' => '{attribute} must be number'),
            array('username','email', 'message' => 'Email is not correct.'),
            array('username', 'unique', 'message' => 'Email is already exist.'),
            array('signature, displayImage', 'length', 'max' => 200),
            array('username', 'length', 'max' => 80),
            array('displayName', 'length', 'max' => 50),
            array('md5_password', 'length', 'max' => 32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, md5_password, displayName, displayImage, signature, role, active, usergroup, registerDate, lastlogin', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Email',
            'md5_password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'displayName' => 'Display Name',
            'displayImage' => 'Display Image',
            'signature' => 'Signature',
            'current_password' => 'รหัสผ่านปัจจุบัน',
            'new_password' => 'รหัสผ่านใหม่',
            'new_password_repeat' => 'โปรดใส่รหัสผ่านใหม่อีกครั้ง',
            'role' => 'Role',
            'active' => 'Active',
            'usergroup' => 'User Group',
            'registerDate' => 'Register Date',
            'lastlogin' => 'Last Login',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('md5_password', $this->md5_password, true);
        $criteria->compare('displayName', $this->displayName, true);
        $criteria->compare('displayImage', $this->displayImage, true);
        $criteria->compare('signature', $this->signature, true);
        $criteria->compare('role', $this->role);
        $criteria->compare('active', $this->active);
        $criteria->compare('usergroup', $this->usergroup);
        $criteria->compare('registerDate', $this->registerDate);
        $criteria->compare('lastlogin', $this->lastlogin);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50
            ),
        ));
    }

    public function getGroupOptions() {
        return array(
            'Admin' => 'Admin',
            'Staff' => 'Staff',
            'Client' => 'Client',
        );
    }

}