<?php

class SiteController extends Controller {

    public function init()
    {
        parent::init();
        $this->pageTitle = "EOS | Gurugames";
    }
    public function actionIndex() {
        $newsArticleDatas = Article::model()->findAllByAttributes(
                array(
            'gameId' => Yii::app()->params['gameId'],
            'type' => 1,
                ), array(
            'order' => 'ordinal DESC',
            'limit' => 4,
        ));

        $trickArticleDatas = Article::model()->findAllByAttributes(
                array(
            'gameId' => Yii::app()->params['gameId'],
            'type' => 2,
                ), array(
            'order' => 'ordinal DESC',
            'limit' => 4,
        ));

        $this->render('index', array(
            'newsArticleDatas' => $newsArticleDatas,
            'trickArticleDatas' => $trickArticleDatas,
        ));
    }

    public function actionDetail() {
        $contentId = Yii::app()->request->getParam('contentId');
        $contentData = Content::model()->findByPk($contentId);
        
        $commentDatas = Comment::model()->findAllByAttributes(
                array(
            'contentId' => $contentId,
                ), array(
            'order' => 'dateCreate DESC',
            //'limit' => 1,
        ));

        $user = User::model()->findByAttributes(
        array(
            'id' => $contentData->userCreate,
        ));

        

        $relateusergameDatas = RelateUserGame::model()->findAllByAttributes(
                array(
            'userId' => $user->id,
                ), array(
            'order' => 'updatedDate DESC',
            'limit' => 3,
        ));

        $relatetagDatas = RelateContentTag::model()->findAllByAttributes(
                array(
            'contentId' => $contentId,
                ), array(
        ));

        $newsArticleDatas = Article::model()->findAllByAttributes(
                array(
            'gameId' => Yii::app()->params['gameId'],
            'type' => 1,
                ), array(
            'order' => 'ordinal DESC',
            'limit' => 4,
        ));

        $trickArticleDatas = Article::model()->findAllByAttributes(
                array(
            'gameId' => Yii::app()->params['gameId'],
            'type' => 2,
                ), array(
            'order' => 'ordinal DESC',
            'limit' => 4,
        ));

        $this->pageTitle = $contentData->title;

        //print_r();exit();

        $model=new Comment;

        $this->render('detail', array(
            'contentData' => $contentData,
            'user' => $user,
            'commentDatas' => $commentDatas,
            'newsArticleDatas' => $newsArticleDatas,
            'trickArticleDatas' => $trickArticleDatas,
            'relateusergameDatas' => $relateusergameDatas,
            'relatetagDatas' => $relatetagDatas,
            'model' => $model,
        ));
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionCharacter() {
    

        $this->render('character', array(
       
        ));
    }

    public function actionNews() {
        $newsArticleDatas = Article::model()->findAllByAttributes(
                array(
            'gameId' => Yii::app()->params['gameId'],
            'type' => 1,
                ), array(
            'order' => 'ordinal DESC',
        ));

        $this->render('news', array(
            'newsArticleDatas' => $newsArticleDatas,
        ));
    }
    public function actionTrick() {
        $trickArticleDatas = Article::model()->findAllByAttributes(
                array(
            'gameId' => Yii::app()->params['gameId'],
            'type' => 2,
                ), array(
            'order' => 'ordinal DESC',
        ));

        $this->render('trick', array(
            'trickArticleDatas' => $trickArticleDatas,
        ));
    }

    public function actionAddcomment(){

       $model=new Comment;

        // // Uncomment the following line if AJAX validation is needed
        // // $this->performAjaxValidation($model);
      
        if(isset($_POST['detail']))
        {
        //     $model->attributes=$_POST['Content'];
                        $model->detail = $_POST['detail'];
                        $model->userId = $_POST['userId'];
                        $model->contentId = $_POST['contentId'];
                        $model->dateCreate = date('Y-m-d H:i:s');
            if($model->save())
            {
                Yii::app()->user->setFlash('error', 'กรอกข้อมูลไม่ครบ');
                $this->redirect(array('site/detail','contentId'=>$model->contentId));
            }
                
            
        }

        // $this->render('create',array(
        //     'model'=>$model,
        // ));
    }
}