<?php

class HeroController extends GameBaseController {

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
        $model = new Hero;

        $allRoles = Role::model()->findAll(array('order' => 'name ASC'));
        $allRole = array();
        foreach ($allRoles as $role) {
            $allRole[] = $role->name;
            $allRoleName[$role->roleId] = $role->name;
        }
        $roles = null;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Hero'])) {
            $model->attributes = $_POST['Hero'];
            if (isset($_POST['roles'])) {
                $roles = $_POST['roles'];
            } else {
                $roles = '';
            }
            $comma = '';
            if (!empty($roles)) {
                foreach ($roles as $role) {
                    $roleModel = Role::model()->findByAttributes(array('name' => $role));
                    if ($roleModel != null) {
                        $model->role .= $comma . $roleModel->roleId;
                    }
                    $comma = ',';
                }
            }
            $model->ordinal = $model->getLastOrdinal($model->type, $model->side);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->heroId));
        }

        $this->render('create', array(
            'model' => $model,
            'roles' => $roles,
            'allRole' => $allRole,
            'allRoleName' => $allRoleName,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $allRoles = Role::model()->findAll(array('order' => 'name ASC'));
        $allRole = array();
        foreach ($allRoles as $role) {
            $allRole[] = $role->name;
            $allRoleName[$role->roleId] = $role->name;
        }
        $roles = $model->role;

        if (isset($_POST['Hero'])) {
            $model->attributes = $_POST['Hero'];
            $model->role = '';
            if (isset($_POST['roles'])) {
                $roles = $_POST['roles'];
            } else {
                $roles = '';
            }
            $comma = '';
            if (!empty($roles)) {
                foreach ($roles as $role) {
                    $roleModel = Role::model()->findByAttributes(array('name' => $role));
                    if ($roleModel != null) {
                        $model->role .= $comma . $roleModel->roleId;
                    }
                    $comma = ',';
                }
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->heroId));
        }

        $this->render('update', array(
            'model' => $model,
            'roles' => $roles,
            'allRole' => $allRole,
            'allRoleName' => $allRoleName,
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
        $dataProvider = new CActiveDataProvider('Hero');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Hero('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Hero']))
            $model->attributes = $_GET['Hero'];

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
        $model = Hero::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hero-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRanking() {
        $type = Yii::app()->request->getParam('type', 1);
        $side = Yii::app()->request->getParam('side', 1);

        $hero_model = new Hero();
        $heros = $hero_model->findallByAttributes(
                array(
            'type' => $type,
            'side' => $side,
                ), array(
            'order' => 'ordinal asc',
        ));

        $this->render('ranking', array(
            'heros' => $heros,
            'type' => $type,
            'side' => $side,
        ));
    }

    public function actionSort() {
        $hero_model = new Hero();
        $records = Yii::app()->request->getParam('recordsArray');

        foreach ($records as $idxRecord => $record) {
            $hero_model->updateAll(array('ordinal' => ($idxRecord + 1)), 'heroId =:i', array(':i' => $record));
        }
        sleep(1);
    }

}
