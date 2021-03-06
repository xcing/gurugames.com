<?php

class MenuController extends GeneralBaseController {

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
        $model = new Menu;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Menu'])) {
            $model->attributes = $_POST['Menu'];
            $model->ordinal = $model->getLastOrdinal($model->gameId, $model->parentMenuId);
            if ($model->save()){
                if($model->parentMenuId != 0){
                    $menu_data = Menu::model()->findByPk($model->parentMenuId);
                    if(!$menu_data->haveSubMenu){
                        $menu_data->haveSubMenu = 1;
                        $menu_data->save();
                    }
                }
                $this->redirect(array('view', 'id' => $model->menuId));
            }
                
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

        if (isset($_POST['Menu'])) {
            $model->attributes = $_POST['Menu'];
            if ($model->save()){
                if($model->parentMenuId != 0){
                    $menu_data = Menu::model()->findByPk($model->parentMenuId);
                    if(!$menu_data->haveSubMenu){
                        $menu_data->haveSubMenu = 1;
                        $menu_data->save();
                    }
                }
                
                $this->redirect(array('view', 'id' => $model->menuId));
            }
                
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
        $dataProvider = new CActiveDataProvider('Menu');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Menu('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Menu']))
            $model->attributes = $_GET['Menu'];

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
        $model = Menu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'menu-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionMoveordinalup() {
        $id = Yii::app()->request->getParam('id');
        $menu_data = Menu::model()->findByPk($id);

        $datas = Menu::model()->findAllByAttributes(array('gameId' => $menu_data->gameId, 'parentMenuId' => $menu_data->parentMenuId), array('order' => 'ordinal ASC'));

        foreach ($datas as $idx => $data) {
            if ($data->menuId == $id) {
                if ($idx == 0) {
                    break;
                }
                $topOrdinal = $data->ordinal;
                $btmOrdinal = $datas[$idx - 1]->ordinal;
                $topModel = Menu::model()->findByPk($data->menuId);
                $topModel->ordinal = $btmOrdinal;
                $topModel->save();

                $btmModel = Menu::model()->findByPk($datas[$idx - 1]->menuId);
                $btmModel->ordinal = $topOrdinal;
                $btmModel->save();
                break;
            } else {
                continue;
            }
        }
    }

    public function actionMoveordinaldown() {
        $id = Yii::app()->request->getParam('id');
        $menu_data = Menu::model()->findByPk($id);

        $datas = Menu::model()->findAllByAttributes(array('gameId' => $menu_data->gameId, 'parentMenuId' => $menu_data->parentMenuId), array('order' => 'ordinal ASC'));

        foreach ($datas as $idx => $data) {
            if ($data->menuId == $id) {
                if ($idx == (count($datas) - 1)) {
                    break;
                }
                $topOrdinal = $data->ordinal;
                $btmOrdinal = $datas[$idx + 1]->ordinal;
                $topModel = Menu::model()->findByPk($data->menuId);
                $topModel->ordinal = $btmOrdinal;
                $topModel->save();

                $btmModel = Menu::model()->findByPk($datas[$idx + 1]->menuId);
                $btmModel->ordinal = $topOrdinal;
                $btmModel->save();
                break;
            } else {
                continue;
            }
        }
    }
    
    public function actionAjaxGetParentMenuList() {
        $gameId = Yii::app()->getRequest()->getParam('gameId');
        $criteria = new CDbCriteria(array('order' => 'name asc'));
        $lists = Menu::model()->findAllByAttributes(array('gameId' => $gameId), $criteria);
        echo CHtml::tag('option', array('value' => '0'), '-- None --', true);
        foreach ($lists as $data) {
            echo CHtml::tag('option', array('value' => $data->gameId), $data->name, true);
        }
    }

}
