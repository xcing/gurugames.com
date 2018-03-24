<?php

class EnemyskillController extends GameBaseController {

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
        $model = new Enemyskill;

        $allConditions = Condition::model()->findAll(array('order' => 'nameEN ASC'));
        $allCondition = array();
        foreach ($allConditions as $condition) {
            $allCondition[] = $condition->nameEN;
            $allConditionName[$condition->conditionId] = $condition->nameEN;
        }

        if (isset($_POST['Enemyskill'])) {
            $model->attributes = $_POST['Enemyskill'];
            $model->condition = '';
            $model->selfCond = '';
            $model->reactCond = '';
            
            if (isset($_POST['Condition'])) {
                $conditions = $_POST['Condition'];
            } else {
                $conditions = '';
            }
            $comma = '';
            if (!empty($conditions)) {
                foreach ($conditions as $condition) {
                    $conditionModel = Condition::model()->findByAttributes(array('nameEN' => $condition));
                    if ($conditionModel != null) {
                        $model->condition .= $comma . $conditionModel->conditionId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->condition = 0;
            }
            
            if (isset($_POST['SelfCond'])) {
                $conditions = $_POST['SelfCond'];
            } else {
                $conditions = '';
            }
            $comma = '';
            if (!empty($conditions)) {
                foreach ($conditions as $condition) {
                    $conditionModel = Condition::model()->findByAttributes(array('nameEN' => $condition));
                    if ($conditionModel != null) {
                        $model->selfCond .= $comma . $conditionModel->conditionId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->selfCond = 0;
            }
            
            if (isset($_POST['ReactCond'])) {
                $conditions = $_POST['ReactCond'];
            } else {
                $conditions = '';
            }
            $comma = '';
            if (!empty($conditions)) {
                foreach ($conditions as $condition) {
                    $conditionModel = Condition::model()->findByAttributes(array('nameEN' => $condition));
                    if ($conditionModel != null) {
                        $model->reactCond .= $comma . $conditionModel->conditionId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->reactCond = 0;
            }
            
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->skillId));
        }

        $this->render('create', array(
            'model' => $model,
            'allCondition' => $allCondition,
            'allConditionName' => $allConditionName,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $allConditions = Condition::model()->findAll(array('order' => 'nameEN ASC'));
        $allCondition = array();
        foreach ($allConditions as $condition) {
            $allCondition[] = $condition->nameEN;
            $allConditionName[$condition->conditionId] = $condition->nameEN;
        }

        if (isset($_POST['Enemyskill'])) {
            $model->attributes = $_POST['Enemyskill'];
            $model->condition = '';
            $model->selfCond = '';
            $model->reactCond = '';
            
            if (isset($_POST['Condition'])) {
                $conditions = $_POST['Condition'];
            } else {
                $conditions = '';
            }
            $comma = '';
            if (!empty($conditions)) {
                foreach ($conditions as $condition) {
                    $conditionModel = Condition::model()->findByAttributes(array('nameEN' => $condition));
                    if ($conditionModel != null) {
                        $model->condition .= $comma . $conditionModel->conditionId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->condition = 0;
            }
            
            if (isset($_POST['SelfCond'])) {
                $conditions = $_POST['SelfCond'];
            } else {
                $conditions = '';
            }
            $comma = '';
            if (!empty($conditions)) {
                foreach ($conditions as $condition) {
                    $conditionModel = Condition::model()->findByAttributes(array('nameEN' => $condition));
                    if ($conditionModel != null) {
                        $model->selfCond .= $comma . $conditionModel->conditionId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->selfCond = 0;
            }
            
            if (isset($_POST['ReactCond'])) {
                $conditions = $_POST['ReactCond'];
            } else {
                $conditions = '';
            }
            $comma = '';
            if (!empty($conditions)) {
                foreach ($conditions as $condition) {
                    $conditionModel = Condition::model()->findByAttributes(array('nameEN' => $condition));
                    if ($conditionModel != null) {
                        $model->reactCond .= $comma . $conditionModel->conditionId;
                    }
                    $comma = ',';
                }
            }
            else{
                $model->reactCond = 0;
            }
            
            if ($model->save()){
                $this->redirect(array('view', 'id' => $model->skillId));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'allCondition' => $allCondition,
            'allConditionName' => $allConditionName,
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
        $dataProvider = new CActiveDataProvider('Enemyskill');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Enemyskill('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Enemyskill']))
            $model->attributes = $_GET['Enemyskill'];

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
        $model = Enemyskill::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'enemyskill-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
