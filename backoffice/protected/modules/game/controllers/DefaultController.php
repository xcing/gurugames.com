<?php

class DefaultController extends GameBaseController {

    public function actionIndex() {
        $this->render('index');
    }

}