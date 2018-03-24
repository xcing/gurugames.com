<?php

class MonsterController extends GameBaseController {

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
        $model = new Monster;

        $allTalents = Talent::model()->findAll(array('order' => 'nameEN ASC'));
        $allTalent = array();
        foreach ($allTalents as $talent) {
            $allTalent[] = $talent->nameEN;
            $allTalentName[$talent->talentId] = $talent->nameEN;
        }

        if (isset($_POST['Monster'])) {
            $model->attributes = $_POST['Monster'];
            $model->talent = '';
            
            if (isset($_POST['Talent'])) {
                $talents = $_POST['Talent'];
            } else {
                $talents = '';
            }
            $comma = '';
            if (!empty($talents)) {
                foreach ($talents as $talent) {
                    $talentModel = Talent::model()->findByAttributes(array('nameEN' => $talent));
                    if ($talentModel != null) {
                        $model->talent .= $comma . $talentModel->talentId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->talent = 0;
            }
            
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->monsterId));
        }

        $this->render('create', array(
            'model' => $model,
            'allTalent' => $allTalent,
            'allTalentName' => $allTalentName,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $allTalents = Talent::model()->findAll(array('order' => 'nameEN ASC'));
        $allTalent = array();
        foreach ($allTalents as $talent) {
            $allTalent[] = $talent->nameEN;
            $allTalentName[$talent->talentId] = $talent->nameEN;
        }

        if (isset($_POST['Monster'])) {
            $model->attributes = $_POST['Monster'];
            $model->talent = '';
            
            if (isset($_POST['Talent'])) {
                $talents = $_POST['Talent'];
            } else {
                $talents = '';
            }
            $comma = '';
            if (!empty($talents)) {
                foreach ($talents as $talent) {
                    $talentModel = Talent::model()->findByAttributes(array('nameEN' => $talent));
                    if ($talentModel != null) {
                        $model->talent .= $comma . $talentModel->talentId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->talent = 0;
            }
            
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->monsterId));
        }

        $this->render('update', array(
            'model' => $model,
            'allTalent' => $allTalent,
            'allTalentName' => $allTalentName,
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
        $dataProvider = new CActiveDataProvider('Monster');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Monster('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Monster']))
            $model->attributes = $_GET['Monster'];

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
        $model = Monster::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'monster-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
