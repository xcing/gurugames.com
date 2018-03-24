<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;

    public function authenticate() {
        $user = User::model()->findByAttributes(array('username' => $this->username));

        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            Yii::app()->user->setFlash('error', 'ชื่อผู้ใช้ไม่ถูกต้องกรุณาลองอีกครั้ง');
        } else if (!$user->active) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            Yii::app()->user->setFlash('error', 'ชื่อผู้ใช้นี้ถูกระงับ กรุณาติดต่อ admin เพื่อทำการแก้ไข');
        } else if ($user->role != 1) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            Yii::app()->user->setFlash('error', 'ชื่อผู้ใช้นี้ไม่สามารถเข้าใช้งานได้');
        } else if ($user->md5_password !== md5($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            Yii::app()->user->setFlash('error', 'รหัสผ่านไม่ถูกต้องกรุณาลองอีกครั้ง');
        } else {
            $this->_id = $user->id;
            $this->setState('username', $user->username);
            //$this->setState('firstname', $user->firstname);
            $this->setState('role', $user->role);
            $this->errorCode = self::ERROR_NONE;
            $user->lastlogin = date('Y-m-d H:i:s');
            $user->update();
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}