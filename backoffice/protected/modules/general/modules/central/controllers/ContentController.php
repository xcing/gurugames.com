<?php

class ContentController extends GeneralBaseController {

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
        $model = new Content;
        $allTags = Tag::model()->findAll(array('order' => 'name ASC'));
        $allTag = array();
        foreach ($allTags as $tag) {
            $allTag[] = $tag->name;
        }
        $tags = null;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            $model->userCreate = Yii::app()->user->id;
            $model->userUpdate = Yii::app()->user->id;
            $model->dateCreate = date('Y-m-d H:i:s');
            $model->dateUpdate = date('Y-m-d H:i:s');
            if ($model->save()) {
                if (isset($_POST['tags'])) {
                    $tags = $_POST['tags'];
                }
                else{
                    $tags = '';
                }
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        $tagModel = Tag::model()->findByAttributes(array('name' => $tag));
                        if ($tagModel != null) {
                            $relateTag = new RelateContentTag;
                            $relateTag->contentId = $model->contentId;
                            $relateTag->tagId = $tagModel->tagId;
                            $relateTag->save();
                        } else {
                            $tagModel = new Tag;
                            $tagModel->name = $tag;
                            if ($tagModel->save()) {
                                $relateTag = new RelateContentTag;
                                $relateTag->contentId = $model->contentId;
                                $relateTag->tagId = $tagModel->tagId;
                                $relateTag->save();
                            }
                        }
                    }
                }

                $this->redirect(array('view', 'id' => $model->contentId));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'tags' => $tags,
            'allTag' => $allTag,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $allTags = Tag::model()->findAll(array('order' => 'name ASC'));
        $allTag = array();
        foreach ($allTags as $tag) {
            $allTag[] = $tag->name;
        }
        $tags = RelateContentTag::model()->findAllByAttributes(array(
            'contentId' => $id,
        ));
        
        $categoryDataProvider = new CActiveDataProvider('RelateContentCategory', array(
            'criteria' => array(
                'condition' => 'contentId=:id',
                'params' => array(':id' => $id),
                'order' => 'categoryId ASC',
            ),
        ));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            $model->userUpdate = Yii::app()->user->id;
            $model->dateUpdate = date('Y-m-d H:i:s');
            if ($model->save()) {
                RelateContentTag::model()->deleteAllByAttributes(array(
                    'contentId' => $id,
                ));
                if (isset($_POST['tags'])) {
                    $tags = $_POST['tags'];
                }
                else{
                    $tags = '';
                }
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        $tagModel = Tag::model()->findByAttributes(array('name' => $tag));
                        if ($tagModel != null) {
                            $relateTag = new RelateContentTag;
                            $relateTag->contentId = $model->contentId;
                            $relateTag->tagId = $tagModel->tagId;
                            $relateTag->save();
                        } else {
                            $tagModel = new Tag;
                            $tagModel->name = $tag;
                            if ($tagModel->save()) {
                                $relateTag = new RelateContentTag;
                                $relateTag->contentId = $model->contentId;
                                $relateTag->tagId = $tagModel->tagId;
                                $relateTag->save();
                            }
                        }
                    }
                }

                $this->redirect(array('view', 'id' => $model->contentId));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'tags' => $tags,
            'allTag' => $allTag,
            'categoryDataProvider' => $categoryDataProvider,
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

            RelateContentTag::model()->deleteAllByAttributes(array(
                'contentId' => $id,
            ));
            RelateContentCategory::model()->deleteAllByAttributes(array(
                'contentId' => $id,
            ));

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
        $dataProvider = new CActiveDataProvider('Content');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Content('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Content']))
            $model->attributes = $_GET['Content'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    public function actionAjax_insert_category() {
        $categoryId = Yii::app()->request->getParam('categoryId');
        $contentId = Yii::app()->request->getParam('contentId');
        $relateContentCategoryModel = new RelateContentCategory;
        $relateContentCategoryModel->categoryId = $categoryId;
        $relateContentCategoryModel->contentId = $contentId;
        $relateContentCategoryModel->save();
    }
    
    public function actionDelete_category() {
        $categoryId = Yii::app()->request->getParam('categoryId');
        $contentId = Yii::app()->request->getParam('contentId');
        
        RelateContentCategory::model()->deleteAllByAttributes(array(
            'categoryId' => $categoryId,
            'contentId' => $contentId,
        ));

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('update', 'id' => $contentId));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Content::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'content-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
