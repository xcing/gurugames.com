<?php

class TeamController extends GeneralBaseController {

    public $layout = 'default';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
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
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TournamentTeam('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Team']))
            $model->attributes = $_GET['Team'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    public function actionResetpassword(){
        $teamId = Yii::app()->request->getParam('teamId');
        $teamModel = $this->loadModel($teamId);
        $teamModel->password = md5('1234');
        if($teamModel->save()){
            Yii::app()->user->setFlash('success', "Reset Password เรียบร้อยครับ");
        }
        $this->redirect(Yii::app()->createUrl('general/tournament/team/view', array('id' => $teamId)));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = TournamentTeam::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'team-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
