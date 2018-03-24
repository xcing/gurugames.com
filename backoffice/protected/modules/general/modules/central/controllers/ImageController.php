<?php

class ImageController extends GeneralBaseController {

    public $layout = 'default';
    
    public function actionIndex() {
        $this->render('index');
    }

}