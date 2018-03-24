<?php

class CharacterController extends Controller {

    public function init()
    {
        parent::init();
        $this->pageTitle = "EOS | Gurugames";
    }

    public function actionIndex() {
    
        $this->render('index', array(
         
        ));
    }

    public function actionRougebuild() {

        $build = $_GET['build'];

        $this->renderPartial('rougebuild', array(
            'build' =>$build,
        ));
    }

    public function actionRouge() {

        $this->render('rouge', array(
        
        ));
    }

    public function actionGuardianbuild() {

        $build = $_GET['build'];

        $this->renderPartial('guardianbuild', array(
            'build' =>$build,
        ));
    }

    public function actionGuardian() {

        $this->render('guardian', array(
        
        ));
    }

    public function actionSorceressbuild() {

        $build = $_GET['build'];

        $this->renderPartial('sorceressbuild', array(
            'build' =>$build,
        ));
    }

    public function actionSorceress() {

        $this->render('sorceress', array(
        
        ));
    }

    public function actionWarriorbuild() {

        $build = $_GET['build'];

        $this->renderPartial('warriorbuild', array(
            'build' =>$build,
        ));
    }

    public function actionWarrior() {

        $this->render('warrior', array(
        
        ));
    }

    public function actionArcherbuild() {

        $build = $_GET['build'];

        $this->renderPartial('archerbuild', array(
            'build' =>$build,
        ));
    }

    public function actionArcher() {

        $this->render('archer', array(
        
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

    
}