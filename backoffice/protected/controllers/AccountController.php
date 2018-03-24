<?php

class AccountController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionPassword() {
        if(Yii::app()->user->id==1)
            throw new CHttpException(403, 'Super admin password not allow to direct changes. Please contact your IT Administrator.');
        $model = User::model()->findByPk(Yii::app()->user->id);

        if (isset($_POST['User'])) {
            $model->setScenario('changepassword');
            $model->attributes = $_POST['User'];
            $model->current_password_md5 = md5($model->current_password);
            if ($model->validate()) {
                $model->md5_password = md5($model->new_password);
                if ($model->save(false)) {
                    Yii::app()->user->setFlash('success', 'Success, change password !');
                } else {
                    Yii::app()->user->setFlash('error', 'Error, can not change password !');
                }
            }
        }
        $this->render('password', array('model' => $model));
    }

}