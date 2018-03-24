<?php

class ImageController extends GameBaseController {

    public $layout = 'default';
    
    public function actionIndex() {
        $this->render('index');
    }

}