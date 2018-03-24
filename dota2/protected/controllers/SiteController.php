<?php

class SiteController extends Controller
{
    public $_LIMIT = 9;
    
	public function actionIndex() {

        $criteria = new CDbCriteria;
        //$criteria->with = array('content');
        $criteria->order = 'pin DESC, dateCreate DESC';
        $criteria->limit = 6;
        $criteria->addInCondition('type', array(1,));
        $criteria->addInCondition('showType', array(0,2,));
        $newsArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'gameId' => Yii::app()->params['gameId'],
        ),$criteria);

        $criteria = new CDbCriteria;
        //$criteria->with = array('content');
        $criteria->order = 'pin DESC, dateCreate DESC';
        $criteria->limit = 4;
        $criteria->addInCondition('type', array(2,));
        $criteria->addInCondition('showType', array(0,2,));
        $trickArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'gameId' => Yii::app()->params['gameId'],
        ),$criteria);




        $criteria = new CDbCriteria;
        //$criteria->with = array('content');
        $criteria->order = 'pin DESC, dateCreate DESC';
        $criteria->limit = 9;
        $criteria->addInCondition('type', array(4,));
        $criteria->addInCondition('showType', array(0,2,));
        $videoArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'gameId' => Yii::app()->params['gameId'],
        ),$criteria);

        $criteria = new CDbCriteria;
        $criteria->with = array('content' => array('alias'=>'c'));
        $criteria->order = 'dateCreate DESC';
        $criteria->limit = 9;
        $criteria->addInCondition('type', array(4,));
        $criteria->addInCondition('c.gameId', array(Yii::app()->params['gameId'],));
        $bannerMainDatas = Banner::model()->findAllByAttributes(array(
            'position' => 1,
            //'gameId' => Yii::app()->params['gameId'],
        ),$criteria);

        $bannerMainDatas = Banner::model()->findAllByAttributes(
                array(
            //'gameId' => Yii::app()->params['gameId'],
             'position' => 1,
             'gameId' => Yii::app()->params['gameId'],
                ), array(
            'order' => 'ordinal ASC',

            //'limit' => 6,
        ));

        $bannerSide1 = Banner::model()->findByAttributes(array(
            'position' => 2,
            'ordinal' => 1,
             'gameId' => Yii::app()->params['gameId'],
        ));

        $bannerSide2 = Banner::model()->findByAttributes(array(
            'position' => 2,
            'ordinal' => 2,
             'gameId' => Yii::app()->params['gameId'],
        ));

        $bannerSide3 = Banner::model()->findByAttributes(array(
            'position' => 2,
            'ordinal' => 3,
             'gameId' => Yii::app()->params['gameId'],
        ));

        $bannerDatas = Banner::model()->findAllByAttributes(
                array(
            //'gameId' => Yii::app()->params['gameId'],
            'position' => 3,
                ), array(
            'order' => 'ordinal DESC',
            //'limit' => 6,
        ));


        $this->render('index', array(
            'newsArticleDatas' => $newsArticleDatas,
            'trickArticleDatas' => $trickArticleDatas,
            'videoArticleDatas' => $videoArticleDatas,
            'bannerDatas' => $bannerDatas,
            'bannerMainDatas' => $bannerMainDatas,
            'bannerSide1' => $bannerSide1,
            'bannerSide2' => $bannerSide2,
            'bannerSide3' => $bannerSide3,
        ));
        //$this->render('index');
    }

public function actionDetail() {
        $contentId = Yii::app()->request->getParam('contentId');
        $contentData = Content::model()->findByPk($contentId);
        /*$articleData = Article::model()->findByAttributes(array(
            'contentId' => $contentId,
        ));*/
        $platformData = RelateGamePlatform::model()->findAllByAttributes(array(
            'gameId' => $contentData->gameId,
        ));
        
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
            'contentId' => $contentData->contentId,
                ), array(
        ));
/*
        $lastestArticleDatas = Article::model()->findAllByAttributes(
                array(
            //'gameId' => Yii::app()->params['gameId'],
            'active' => 1,
            
                ), array(
            'order' => 'dateCreate DESC',
            'limit' => 4,
        ));
*/

        $criteria = new CDbCriteria;
        $criteria->addCondition("t.contentId != '$contentData->contentId' ",'AND');
        $criteria->addInCondition('type', array(1,2,3));
        $criteria->order = 'dateCreate DESC';
        $criteria->limit = 4;
        $lastestArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1
        ),$criteria);

        $tagarray = array();

        foreach ($relatetagDatas as $tag) {
            $tagarray[] = $tag->tagId;
        }

        $criteria = new CDbCriteria;
        //
        $criteria->with = array('content' => array('alias'=>'c'));
        $criteria->addCondition("t.contentId != '$contentData->contentId' ",'AND');
        $criteria->addCondition("c.type != '4' ",'AND');
        $criteria->addCondition("c.active = '1' ", 'AND');
        $criteria->addInCondition('tagId', $tagarray);
        $criteria->group='t.contentId';
        $criteria->order = 'c.dateCreate DESC';
        $criteria->limit = 4;
        $relateArticleDatas = RelateContentTag::model()->findAllByAttributes(array(
            //'active' => 1
        ),$criteria);
/*
        foreach ($relatetagDatas as $tagData) {
            $tagData->tag->tagId

             $criteria = new CDbCriteria;
            $criteria->with = array('content');
            $criteria->order = 'dateCreate DESC';
            $lastestArticleDatas = RelateContentTag::model()->findAllByAttributes(array(
                'active' => 1
            ),$criteria);
        }
*/
        /*print_r($tagarray);
        foreach ($relateArticleDatas as $key) {
            # code...
            echo $key->contentId."<br>";
        }
        exit();*/
        $this->pageTitle = $contentData->title;

        //print_r();exit();

        $model = new Comment;

        $this->render('detail', array(
            'contentData' => $contentData,
            //'articleData' => $articleData,
            'platformData' => $platformData,
            'user' => $user,
            'commentDatas' => $commentDatas,
          
            'lastestArticleDatas' => $lastestArticleDatas,
            'relateusergameDatas' => $relateusergameDatas,
            'relatetagDatas' => $relatetagDatas,
            'relateArticleDatas' => $relateArticleDatas,
            'model' => $model,
        ));
    }

    public function actionNews() {
        $page = Yii::app()->request->getParam('p', 1);
        $start = ($page * $this->_LIMIT) - $this->_LIMIT;

        $allNews = Content::model()->countByAttributes(array(
            'active' => 1,
            'type' => 1,
            'gameId' => Yii::app()->params['gameId'],
        ));

        $newsArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'type' => 1,
            'gameId' => Yii::app()->params['gameId'],
                ), array(
            'order' => 'pin DESC,dateCreate DESC',
            'limit' => $this->_LIMIT,
            'offset' => $start,
                )
        );
        if ($allNews > $page * $this->_LIMIT) {
            $next = ++$page;
        }
        else{$next = null;}
        $this->render('news', array(
            'newsArticleDatas' => $newsArticleDatas,
            'next' => $next,
            'allNews' => $allNews,
        ));
    }

    public function actionReview() {
        $page = Yii::app()->request->getParam('p', 1);
        $start = ($page * $this->_LIMIT) - $this->_LIMIT;

        $allNews = Content::model()->countByAttributes(array(
            'active' => 1,
            'type' => 3,
            'gameId' => Yii::app()->params['gameId'],
        ));

        $reviewArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'type' => 3,
            'gameId' => Yii::app()->params['gameId'],
                ), array(
            'order' => 'pin DESC,dateCreate DESC',
            'limit' => $this->_LIMIT,
            'offset' => $start,
                )
        );
        if ($allNews > $page * $this->_LIMIT) {
            $next = ++$page;
        }
        else{$next = null;}
        

        $this->render('review', array(
            'reviewArticleDatas' => $reviewArticleDatas,
            'next' => $next,
        ));
    }

    public function actionArticle() {
        $page = Yii::app()->request->getParam('p', 1);
        $start = ($page * $this->_LIMIT) - $this->_LIMIT;

        $allNews = Content::model()->countByAttributes(array(
            'active' => 1,
            'type' => 2,
            'gameId' => Yii::app()->params['gameId'],
        ));

        $trickArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'type' => 2,
            'gameId' => Yii::app()->params['gameId'],
                ), array(
            'order' => 'pin DESC,dateCreate DESC',
            'limit' => $this->_LIMIT,
            'offset' => $start,
                )
        );
        if ($allNews > $page * $this->_LIMIT) {
            $next = ++$page;
        }
        else{$next = null;}

        $this->render('article', array(
            'trickArticleDatas' => $trickArticleDatas,
            'next' => $next,
        ));
    }

    public function actionVideo() {
        $page = Yii::app()->request->getParam('p', 1);
        $start = ($page * $this->_LIMIT) - $this->_LIMIT;

        $allNews = Content::model()->countByAttributes(array(
            'active' => 1,
            'type' => 4,
            'gameId' => Yii::app()->params['gameId'],
        ));

        $videoArticleDatas = Content::model()->findAllByAttributes(array(
            'active' => 1,
            'type' => 4,
            'gameId' => Yii::app()->params['gameId'],
                ), array(
            'order' => 'pin DESC,dateCreate DESC',
            'limit' => $this->_LIMIT,
            'offset' => $start,
                )
        );
        if ($allNews > $page * $this->_LIMIT) {
            $next = ++$page;
        }
        else{$next = null;}

        $this->render('video', array(
            'videoArticleDatas' => $videoArticleDatas,
            'next' => $next,
        ));
    }

    public function actionEos() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->renderpartial('eos');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegister() {
        $model = new User;

        if (isset($_POST['User'])) {
            $model = new User;
            $model->setScenario('register');
            $model->username = $_POST['User']['username'];
            $model->md5_password = md5($_POST['User']['md5_password']);
            $model->confirm_password = md5($_POST['User']['confirm_password']);
            $model->displayName = $_POST['User']['displayName'];
            $model->role = 3;
            $model->active = 0;
            $model->usergroup = 'Client';
            $model->registerDate = date('Y-m-d H:i:s');

            if ($model->save()) {
                //send mail
                $message = new YiiMailMessage;
                $message->view = 'mail';

                $encodeUser = Password::encode($model->id);
                $verifyLink = 'http://www.gurugames.in.th/index.php?r=site/verify&a=' . $encodeUser;

                $data = array(
                    'displayName' => $model->displayName,
                    'verifyLink' => $verifyLink,
                );

                $subject = 'Please verify the email for your gurugames account';
                $message->setSubject($subject);
                $message->setBody(array('data' => $data), 'text/html');

                $message->addTo($model->username);
                $message->from = 'pawanwit.s@gmail.com';
                $result = Yii::app()->mail->send($message);

                $this->redirect(array('registerdone'));
            } else {
                $model->md5_password = $_POST['User']['md5_password'];
                $model->confirm_password = $_POST['User']['confirm_password'];
                foreach ($model->getErrors() as $error) {
                    Yii::app()->user->setFlash('error', $error[0]);
                }
            }
        }

        $this->render('register', array(
            'model' => $model,
        ));
    }

    /* public function actionTestmail() {
      $message = new YiiMailMessage;
      $message->view = 'mail';

      $encodeUser = Password::encode('12');
      $verifyLink = 'http://www.gurugames.in.th';

      $data = array(
      'displayName' => 'xcing',
      'verifyLink' => $verifyLink,
      );

      $subject = 'Please verify the email for your gurugames account';
      $message->setSubject($subject);
      $message->setBody(array('data' => $data), 'text/html');

      $message->addTo('pawanwit@mol.com');
      $message->from = 'pawanwit.s@gmail.com';
      $result = Yii::app()->mail->send($message);

      if($result){
      die('Send Mail Success');
      }
      else{
      die('Not Success');
      }
      } */

    public function actionRegisterdone() {
        $this->render('registerdone');
    }

    public function actionVerify() {
        $a = Yii::app()->request->getParam('a');
        $userId = Password::decode($a);
        $userModel = User::model()->findByPk($userId);
        if ($userModel->active) {
            $message = 'This user is already verify';
        } else {
            $userModel->active = '1';
            $userModel->save();
            $message = 'Verify Done you can login your account';
        }

        $this->render('verify', array(
            'message' => $message,
        ));
    }
    
    public function actionRadar(){
        $this->render('radar');
    }
}