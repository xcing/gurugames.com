<?php

class DefaultController extends GameBaseController {

    public $layout = 'default';
    
    public function actionIndex() {
        $this->render('index');
    }

}