<?php

class DefaultController extends GeneralBaseController {

    public $layout = 'default';
    
    public function actionIndex() {
        $this->render('index');
    }

}