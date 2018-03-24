<?php

class SettingController extends UserBaseController {

    public $layout = 'default';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->md5_password = md5($model->md5_password);
            $model->created = date('Y-m-d H:i:s');
            $model->save();

            AuthManager::genAuth($model->id, $model->role);

            $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $isChangePass = false;
            $isChangeRole = false;
            if ($model->md5_password != $_POST['User']['md5_password']) {
                $isChangePass = true;
            }
            if ($model->role != $_POST['User']['role']) {
                $isChangeRole = true;
            }
            $model->attributes = $_POST['User'];
            if ($isChangePass) {
                $model->md5_password = md5($model->md5_password);
            }
            if ($isChangeRole) {
                AuthManager::updateAuth($model->id, $model->role);
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPassword() {
        //if (Yii::app()->user->id == 1)
        //    throw new CHttpException(403, 'Super admin password not allow to direct changes. Please contact your IT Administrator.');
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
