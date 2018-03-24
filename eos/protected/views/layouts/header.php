<head>
        <title><?php echo $this->pageTitle; ?></title>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <link rel="icon" href="<?=Yii::app()->request->baseUrl;?>/images/favicon.ico">
        <link rel="shortcut icon" href="<?=Yii::app()->request->baseUrl;?>/images/favicon.ico">
        
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/style.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/camera.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/custom_bootstrap.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/jquery-mmenu/jquery.mmenu.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/css/jquery-mmenu/jquery.mmenu.positioning.css">
        
        <!--script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script-->
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-migrate-1.1.1.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/script.js"></script><meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <script src="<?=Yii::app()->request->baseUrl;?>/js/superfish.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.ui.totop.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.equalheights.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.mobilemenu.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.easing.1.3.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/camera.js"></script>
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery-mmenu/jquery.mmenu.js"></script>
        
        <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="<?=Yii::app()->request->baseUrl;?>/js/jquery.mobile.customized.min.js"></script>
        <!--<![endif]-->
        <script>
            $(document).ready(function() {
                $().UItoTop({easingType: 'easeOutQuart'});
            });


            $(document).ready(function() {
                jQuery('#camera_wrap').camera({
                    loader: false,
                    pagination: true,
                    thumbnails: false,
                    height: '40.79207920792079%',
                    caption: false,
                    navigation: true,
                    fx: 'mosaic'
                });
            });

        </script>
        <!--[if lt IE 8]>
          <div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
              <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
            </a>
         </div>
       <![endif]-->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <link rel="stylesheet" media="screen" href="css/ie.css">
    
    
        <![endif]-->
        <!--link type="text/css" rel="stylesheet" href="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/style.css">
        <script type="text/javascript" charset="utf-8" src="chrome-extension://cpngackimfmofbokmjmljamhdncknpmg/js/page_context.js"></script>
        <meta name="chromesniffer" id="chromesniffer_meta" content="{&quot;Google Analytics&quot;:-1,&quot;jQuery&quot;:&quot;1.9.1&quot;}">
        <script type="text/javascript" src="chrome-extension://homgcnaoacgigpkkljjjekpignblkeae/detector.js"></script-->
    </head>