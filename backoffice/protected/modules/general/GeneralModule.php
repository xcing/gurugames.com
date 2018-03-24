<?php

class GeneralModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'general.models.*',
            'general.components.*',
        ));
        $this->setModules(array(
            'central',
            'tournament',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (!Yii::app()->user->checkAccess('General_Module')) {
            throw new CHttpException('403', 'You are not authorized to perform this page.');
        }
        return true;
    }

}
