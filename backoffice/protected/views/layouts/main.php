<?php
$cs = Yii::app()->clientScript;
/*
  $cs->scriptMap = array(
  'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
  );
  $cs->registerScriptFile('jquery', CClientScript::POS_HEAD);
 *
 */
$cs->packages = array(
    'jquery' => array(
        'baseUrl' => Yii::app()->baseUrl,
        'js' => array('js/jquery-1.9.1.min.js'))
);
$cs->registerCoreScript('jquery');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon"
              href="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-horizontal.ico"
              type="image/x-icon" />
        
        <link
            href="<?php echo Yii::app()->request->baseUrl; ?>/css/flag.css"
            rel="stylesheet">
        
        <!-- google font -->
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/css.css"
            rel="stylesheet" type="text/css">

        <!-- bootstrap -->
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.css"
            rel="stylesheet">
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-responsive.css"
            rel="stylesheet">
        <!-- yii -->
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/yii.css"
            rel="stylesheet">

        <!-- custom style -->
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/custom.css"
            rel="stylesheet">
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/custom-ui.css"
            rel="stylesheet">
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/custom-form.css"
            rel="stylesheet">

        <!-- icons -->
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.css"
            rel="stylesheet">
    </head>
    <body id="top">
        <header class="header">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse"
                                data-target=".nav-collapse">
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span>
                        </button>
                        <a class="brand" href="<?php echo Yii::app()->createUrl('') ?>">
                            <img src="<?= Yii::app()->request->BaseUrl . '/images/logo-gurugames2.png'; ?>" width="50px" />
                            <span class="color-white"><img src="<?= Yii::app()->request->BaseUrl . '/images/logo-gurugames4.png'; ?>" width="150px" /></span>
                        </a>
                        <div class="nav-collapse collapse">
                            <?php
                            $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                    array('label' => 'Game', 'url' => array('/game'), 'visible' => Yii::app()->user->checkAccess('Game_Module')),
                                    array('label' => 'General', 'url' => array('/general'), 'visible' => Yii::app()->user->checkAccess('General_Module')),
                                    array('label' => 'Authen', 'url' => array('/rights'), 'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName)),
                                    array('label' => 'User', 'url' => array('/user/setting/password'), 'visible' => Yii::app()->user->checkAccess('User_Module')),
                                    array('label' => 'Log out (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                ),
                                'htmlOptions' => array(
                                    'class' => 'nav'
                                )
                            ));
                            ?>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!--/.navbar -->
        </header>
        <section class="section">
            <?php echo $content; ?>
        </section>

        <!-- javascript -->
        <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
        <script
        src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.js"></script>
        <!--/javascript -->

        <!-- tag -->
        <script
        src="<?php echo Yii::app()->baseUrl; ?>/js/tag/tag-it.min.js"></script>
    </body>
</html>
