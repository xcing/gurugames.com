<?php

class GuideController extends Controller
{
    public $_LIMIT = 9;
    
public function actionHeroes() {

    $id = Yii::app()->request->getParam('id');

    if(!isset($id)){

        $allSTRrad = Hero::model()->findAllByAttributes(
            array(
            'type' => 1,
            'side' => 1,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $allSTRdire = Hero::model()->findAllByAttributes(
            array(
            'type' => 1,
            'side' => 2,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $allAGIrad = Hero::model()->findAllByAttributes(
            array(
            'type' => 2,
            'side' => 1,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $allAGIdire = Hero::model()->findAllByAttributes(
            array(
            'type' => 2,
            'side' => 2,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $allINTrad = Hero::model()->findAllByAttributes(
            array(
            'type' => 3,
            'side' => 1,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $allINTdire = Hero::model()->findAllByAttributes(
            array(
            'type' => 3,
            'side' => 2,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $this->pageTitle = "Heroes - DOTA2 - ข้อมูลฮีโร่ DOTA2";

        $this->render('heroes', array(
            'allSTRrad' => $allSTRrad,
            'allSTRdire' => $allSTRdire,
            'allAGIrad' => $allAGIrad,
            'allAGIdire' => $allAGIdire,
            'allINTrad' => $allINTrad,
            'allINTdire' => $allINTdire,
        ));
    }
    else{

        $model = Hero::model()->findByPk($id);

        $allRoles = Role::model()->findAll(array('order' => 'name ASC'));
        $allRole = array();
        foreach ($allRoles as $role) {
            $allRole[] = $role->name;
            $allRoleName[$role->roleId] = $role->name;
        }
        $roles = $model->role;

        $allGuide = Guidehero::model()->findAllByAttributes(
            array(
            'heroId' => $id,
                ), array(
            'order' => 'dateUpdated DESC',
                //'limit' => 1,
        ));

        $this->pageTitle = "Hero - ".$model->name." - ข้อมูล , รายละเอียดสกิล";

        $this->render('herodetail', array(
            'model' => $model,
            'roles' => $roles,
            'allRole' => $allRole,
            'allRoleName' => $allRoleName,
            'allGuide' => $allGuide,
        ));
    }
    
}  

public function actionItems() {

    $id = Yii::app()->request->getParam('id');

    if(!isset($id)){

         $itemConsumables = Item::model()->findAllByAttributes(
            array(
            'location' => 1,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemAttributes1 = Item::model()->findAllByAttributes(
            array(
            'location' => 2,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemAttributes2 = Item::model()->findAllByAttributes(
            array(
            'location' => 3,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemAttributes3 = Item::model()->findAllByAttributes(
            array(
            'location' => 4,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemCommon = Item::model()->findAllByAttributes(
            array(
            'location' => 5,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemSupport1 = Item::model()->findAllByAttributes(
            array(
            'location' => 6,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemSupport2 = Item::model()->findAllByAttributes(
            array(
            'location' => 7,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));
         $itemWeapon1 = Item::model()->findAllByAttributes(
            array(
            'location' => 8,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

         $itemWeapon2 = Item::model()->findAllByAttributes(
            array(
            'location' => 9,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $itemArtifacts = Item::model()->findAllByAttributes(
            array(
            'location' => 10,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

           $itemSecret = Item::model()->findAllByAttributes(
            array(
            'location' => 11,
                ), array(
            'order' => 'ordinal ASC',
                //'limit' => 1,
        ));

        $this->pageTitle = "Items - DOTA2 - ข้อมูล ไอเท็ม DOTA2";

        $this->render('items', array(
            'itemConsumables' => $itemConsumables,
            'itemAttributes1' => $itemAttributes1,
            'itemAttributes2' => $itemAttributes2,
            'itemAttributes3' => $itemAttributes3,
            'itemSupport1' => $itemSupport1,
            'itemSupport2' => $itemSupport2,
            'itemCommon' => $itemCommon,
            'itemWeapon1' => $itemWeapon1,
            'itemWeapon2' => $itemWeapon2,
            'itemArtifacts' => $itemArtifacts,
            'itemSecret' => $itemSecret,
        ));
    }
    else{

        $model = Item::model()->findByPk($id);

        $modelmaterials = null;
        
        if(trim($model->material) != "")
        {
            $materials = explode( ',', $model->material );
            
            foreach ($materials as $key => $value) {
                
                $modelmaterials[] = Item::model()->findByPk($value);
            }
        }     

        $this->pageTitle = "Item - ".$model->name." รายละเอียดไอเท็ม , การผสมของ";

        $this->render('itemdetail', array(
            'model' => $model,
            'modelmaterials' => $modelmaterials,
        ));
    }
    
}  

public function actionBuilds() {

    $id = Yii::app()->request->getParam('id');
    $stat = Yii::app()->request->getParam('stat');
    $role = Yii::app()->request->getParam('role');
    $hero = Yii::app()->request->getParam('hero');

    if(!isset($id)){

        $criteria = new CDbCriteria;
        $criteria->with = array('hero' => array('alias' => 'h'));
        $criteria->order = 't.dateUpdated DESC';

        $criteriaHero = new CDbCriteria;
        $criteriaHero->order = 't.name ASC';

        if(isset($stat) && $stat != 0)
        {    
            $criteria->addCondition("h.type = '".$stat."' ", 'AND');
            $criteriaHero->addCondition("t.type = '".$stat."' ", 'AND');
        }

        if(isset($role) && $role != 0)
        {    
            $criteria->addCondition("find_in_set('".$role."',h.role) <> 0", 'AND');
            $criteriaHero->addCondition("find_in_set('".$role."',t.role) <> 0", 'AND');
        }

        if(isset($hero) && $hero != 0)
        {    $criteria->addCondition("h.heroId = '".$hero."' ", 'AND');}

        $guidehero = Guidehero::model()->findAllByAttributes(array(
                    //'active' => 1
            ), $criteria);

        $allhero = Hero::model()->findAllByAttributes(array(
                    //'active' => 1
            ), $criteriaHero);

        $allrole = Role::model()->findAllByAttributes(
            array(
                ), array(
            'order' => 'name ASC',
                //'limit' => 1,
        ));

        $this->pageTitle = "Guide Dota2 - แนะนำแนวทางการเล่น, ออกของ , อัพสกิล";

        $this->render('builds', array(
            'guidehero' => $guidehero ,
            'currentStat' => $stat,
            'currentRole' => $role,
            'currentHero' => $hero,
            'allhero' => $allhero,
            'allrole' => $allrole,
            
        ));
    }
    else{

        $guidehero = Guidehero::model()->findByPk($id);

        $hero = Hero::model()->findByPk($guidehero->heroId);

        if(trim($guidehero->skill) != "")
        {
            $skills = explode( ',', $guidehero->skill);   

        }     

        if(trim($guidehero->startItem) != "")
        {
            $startItem = explode( ',', $guidehero->startItem);         
        }     

        if(trim($guidehero->coreItem) != "")
        {
            $coreItem = explode( ',', $guidehero->coreItem);         
        }     

        if(trim($guidehero->dynamicItem) != "")
        {
            $dynamicItem = explode( ',', $guidehero->dynamicItem);         
        }     

        $earlyItem = null;
        if(trim($guidehero->earlyItem) != "")
        {
            $earlyItem = explode( ',', $guidehero->earlyItem);   
            $earlyItem = Item::model()->findAllByAttributes(
                array(
                'itemId' => $earlyItem,
                    ), array(
            ));      
        }   

        $lateItem = null;
        if(trim($guidehero->lateItem) != "")
        {
            $lateItem = explode( ',', $guidehero->lateItem);      
            $lateItem = Item::model()->findAllByAttributes(
                array(
                'itemId' => $lateItem,
                    ), array(
            ));   
        }   

        $allRoles = Role::model()->findAll(array('order' => 'name ASC'));
        $allRole = array();
        foreach ($allRoles as $role) {
            $allRole[] = $role->name;
            $allRoleName[$role->roleId] = $role->name;
        }
        $roles = $hero->role;

        $allSkills = $hero->skill;
        $allSkill = array();
        foreach ($allSkills as $skill) {
            $allSkill[] = $role->name;
            $allRoleName[$role->roleId] = $role->name;
        }

        $startItem = Item::model()->findAllByAttributes(
            array(
            'itemId' => $startItem,
                ), array(
        ));

        $dynamicItem = Item::model()->findAllByAttributes(
            array(
            'itemId' => $dynamicItem,
                ), array(
        ));

        $coreItem = Item::model()->findAllByAttributes(
            array(
            'itemId' => $coreItem,
                ), array(
        ));

        

        $this->pageTitle = "Guide - ".$hero->name." , แนะนำแนวทางการเล่น, ออกของ , อัพสกิล";

        $this->render('builddetail', array(
            'guidehero' => $guidehero ,
            'hero' => $hero ,
            'skills' => $skills ,
            'startItem' => $startItem ,
            'earlyItem' => $earlyItem ,
            'coreItem' => $coreItem ,
            'lateItem' => $lateItem ,
            'dynamicItem' => $dynamicItem ,
            'allRoleName' => $allRoleName ,
            'roles' => $roles ,

        ));
    }
    
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