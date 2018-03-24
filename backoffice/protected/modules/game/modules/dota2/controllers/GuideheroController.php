<?php

class GuideheroController extends GameBaseController {

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
        $model = new Guidehero;

        $allItems = Item::model()->findAll(array('order' => 'name ASC'));
        $allItem = array();
        foreach ($allItems as $item) {
            $allItem[] = $item->name;
            $allItemName[$item->itemId] = $item->name;
        }

        if (isset($_POST['Guidehero'])) {
            $model->attributes = $_POST['Guidehero'];
            
            if (isset($_POST['startItem'])) {
                $startItems = $_POST['startItem'];
            } else {
                $startItems = '';
            }
            $comma = '';
            if (!empty($startItems)) {
                foreach ($startItems as $startItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $startItem));
                    if ($itemModel != null) {
                        $model->startItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['earlyItem'])) {
                $earlyItems = $_POST['earlyItem'];
            } else {
                $earlyItems = '';
            }
            $comma = '';
            if (!empty($earlyItems)) {
                foreach ($earlyItems as $earlyItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $earlyItem));
                    if ($itemModel != null) {
                        $model->earlyItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['coreItem'])) {
                $coreItems = $_POST['coreItem'];
            } else {
                $coreItems = '';
            }
            $comma = '';
            if (!empty($coreItems)) {
                foreach ($coreItems as $coreItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $coreItem));
                    if ($itemModel != null) {
                        $model->coreItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['lateItem'])) {
                $lateItems = $_POST['lateItem'];
            } else {
                $lateItems = '';
            }
            $comma = '';
            if (!empty($lateItems)) {
                foreach ($lateItems as $lateItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $lateItem));
                    if ($itemModel != null) {
                        $model->lateItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['dynamicItem'])) {
                $dynamicItems = $_POST['dynamicItem'];
            } else {
                $dynamicItems = '';
            }
            $comma = '';
            if (!empty($dynamicItems)) {
                foreach ($dynamicItems as $dynamicItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $dynamicItem));
                    if ($itemModel != null) {
                        $model->dynamicItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            $model->detail = $_POST['Guidehero']['detail'];
            $model->ordinal = $model->getLastOrdinal($model->heroId);
            $model->dateUpdated = date('Y-m-d H:i:s');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->guideHeroId));
        }

        $this->render('create', array(
            'model' => $model,
            'allItem' => $allItem,
            'allItemName' => $allItemName,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $allItems = Item::model()->findAll(array('order' => 'name ASC'));
        $allItem = array();
        foreach ($allItems as $item) {
            $allItem[] = $item->name;
            $allItemName[$item->itemId] = $item->name;
        }

        if (isset($_POST['Guidehero'])) {
            $model->attributes = $_POST['Guidehero'];
            $model->detail = $_POST['Guidehero']['detail'];
            $model->startItem = '';
            $model->coreItem = '';
            $model->dynamicItem = '';
            if (isset($_POST['startItem'])) {
                $startItems = $_POST['startItem'];
            } else {
                $startItems = '';
            }
            $comma = '';
            if (!empty($startItems)) {
                foreach ($startItems as $startItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $startItem));
                    if ($itemModel != null) {
                        $model->startItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['earlyItem'])) {
                $earlyItems = $_POST['earlyItem'];
            } else {
                $earlyItems = '';
            }
            $comma = '';
            if (!empty($earlyItems)) {
                foreach ($earlyItems as $earlyItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $earlyItem));
                    if ($itemModel != null) {
                        $model->earlyItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['coreItem'])) {
                $coreItems = $_POST['coreItem'];
            } else {
                $coreItems = '';
            }
            $comma = '';
            if (!empty($coreItems)) {
                foreach ($coreItems as $coreItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $coreItem));
                    if ($itemModel != null) {
                        $model->coreItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['lateItem'])) {
                $lateItems = $_POST['lateItem'];
            } else {
                $lateItems = '';
            }
            $comma = '';
            if (!empty($lateItems)) {
                foreach ($lateItems as $lateItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $lateItem));
                    if ($itemModel != null) {
                        $model->lateItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            if (isset($_POST['dynamicItem'])) {
                $dynamicItems = $_POST['dynamicItem'];
            } else {
                $dynamicItems = '';
            }
            $comma = '';
            if (!empty($dynamicItems)) {
                foreach ($dynamicItems as $dynamicItem) {
                    $itemModel = Item::model()->findByAttributes(array('name' => $dynamicItem));
                    if ($itemModel != null) {
                        $model->dynamicItem .= $comma . $itemModel->itemId;
                    }
                    $comma = ',';
                }
            }
            
            $model->dateUpdated = date('Y-m-d H:i:s');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->guideHeroId));
        }

        $this->render('update', array(
            'model' => $model,
            'allItem' => $allItem,
            'allItemName' => $allItemName,
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
        $dataProvider = new CActiveDataProvider('Guidehero');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Guidehero('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Guidehero']))
            $model->attributes = $_GET['Guidehero'];

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
        $model = Guidehero::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'guidehero-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRanking() {
        $heroId = Yii::app()->request->getParam('heroId', 3);

        $guideheroModel = new Guidehero();
        $guideheros = $guideheroModel->findallByAttributes(
                array(
            'heroId' => $heroId,
                ), array(
            'order' => 'ordinal asc',
        ));

        $this->render('ranking', array(
            'guideheros' => $guideheros,
            'heroId' => $heroId,
        ));
    }

    public function actionSort() {
        $guideheroModel = new Guidehero();
        $records = Yii::app()->request->getParam('recordsArray');

        foreach ($records as $idxRecord => $record) {
            $guideheroModel->updateAll(array('ordinal' => ($idxRecord + 1)), 'guideHeroId =:i', array(':i' => $record));
        }
        sleep(1);
    }

}
