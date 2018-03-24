<?php

class ItemController extends GameBaseController {

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
        $model = new Item;

        $allMaterials = Item::model()->findAll(array('order' => 'name ASC'));
        $allMaterial = array();
        foreach ($allMaterials as $material) {
            $allMaterial[] = $material->name;
            $allMaterialName[$material->itemId] = $material->name;
        }
        $materials = null;

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
            if (isset($_POST['materials'])) {
                $materials = $_POST['materials'];
            } else {
                $materials = '';
            }
            $comma = '';
            if (!empty($materials)) {
                foreach ($materials as $material) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $material));
                    if ($itemModel != null) {
                        $model->material .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            $model->ordinal = $model->getLastOrdinal($model->location);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->itemId));
        }

        $this->render('create', array(
            'model' => $model,
            'materials' => $materials,
            'allMaterial' => $allMaterial,
            'allMaterialName' => $allMaterialName,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $allMaterials = Item::model()->findAll(array('order' => 'name ASC'));
        $allMaterial = array();
        foreach ($allMaterials as $material) {
            $allMaterial[] = $material->name;
            $allMaterialName[$material->itemId] = $material->name;
        }
        $materials = $model->material;

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];
            $model->material = '';
            if (isset($_POST['materials'])) {
                $materials = $_POST['materials'];
            } else {
                $materials = '';
            }
            $comma = '';
            if (!empty($materials)) {
                foreach ($materials as $material) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $material));
                    if ($itemModel != null) {
                        $model->material .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->itemId));
        }

        $this->render('update', array(
            'model' => $model,
            'materials' => $materials,
            'allMaterial' => $allMaterial,
            'allMaterialName' => $allMaterialName,
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
        $dataProvider = new CActiveDataProvider('Item');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Item('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Item']))
            $model->attributes = $_GET['Item'];

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
        $model = Item::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionRanking() {
        $location = Yii::app()->request->getParam('location', 1);

        $item_model = new Item();
        $items = $item_model->findallByAttributes(
                array(
                    'location' => $location,
                ), array(
            'order' => 'ordinal asc',
        ));

        $this->render('ranking', array(
            'items' => $items,
            'location' => $location,
        ));
    }

    public function actionSort() {
        $item_model = new Item();
        $records = Yii::app()->request->getParam('recordsArray');

        foreach ($records as $idxRecord => $record) {
            $item_model->updateAll(array('ordinal' => ($idxRecord + 1)), 'itemId =:i', array(':i' => $record));
        }
        sleep(1);
    }

}
