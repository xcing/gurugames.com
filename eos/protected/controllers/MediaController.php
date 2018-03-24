<?php

class MediaController extends Controller {

    public function actionWallpaper() {
        $objScan = scandir("../images/upload/eos/wallpaper");
        $images = array();
        foreach ($objScan as $file) {
            if (($file != ".") && ($file != "..") && ($file != ".svn")) {
                $images[] = $file;
            }
        }

        $this->render('wallpaper', array(
            'images' => $images,
        ));
    }

    public function actionScreenshot() {
        $objScan = scandir("../images/upload/eos/screenshot");
        $images = array();
        foreach ($objScan as $file) {
            if (($file != ".") && ($file != "..") && ($file != ".svn")) {
                $images[] = $file;
            }
        }

        $this->render('screenshot', array(
            'images' => $images,
        ));
    }
}