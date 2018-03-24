<?php

class DefaultController extends UserBaseController {

    public $layout='default';
    
    public function actionIndex() {
        $this->render('index');
    }

}