<head>
    <meta name="google-site-verification" content="wFnkvBIwp-poClGxKzKR_R6axFzXASIsPmUxloy22kU" />
    <title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
<!--     <meta property="og:image" content="http://gurugames.in.th/images/logo-big.png"/>
    <meta property="og:image:secure_url" content="http://gurugames.in.th/images/logo-big.png" />
    <link rel="image_src" href="http://gurugames.in.th/images/logo-big.png"/> -->
    <link rel="icon" href="<?= Yii::app()->request->baseUrl; ?>/images/ico-horizontal.ico">
    <link rel="shortcut icon" href="<?= Yii::app()->request->baseUrl; ?>/images/ico-horizontal.ico">
    
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/style.css">
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/camera.css">
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/custom_bootstrap.css">
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/jquery-mmenu/jquery.mmenu.css">
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/jquery-mmenu/jquery.mmenu.positioning.css">
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/flexslider.css">

    <!--script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script-->
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.1.1.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/script.js"></script><meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/superfish.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.ui.totop.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.equalheights.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.mobilemenu.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/camera.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery-mmenu/jquery.mmenu.js"></script>
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.flexslider.js"></script>
    <!--script src="<?= Yii::app()->request->baseUrl; ?>/js/chart/Chart.js"></script-->
    

    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script>
        $(document).ready(function() {
            $().UItoTop({easingType: 'easeOutQuart'});
        });

        $(document).ready(function() {

            var images = ['bg-batpuck.jpg', '250-7992975589_44466d9815_o.jpg','bg-csgo.jpg','bg-hs.jpg'];
            $('body').css({'background': 'url(../images/' + images[Math.floor(Math.random() * images.length)] + ') 0 -10px repeat-x #000000'});
            $('body').css({'background-attachment': 'fixed'});

            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: true,
                thumbnails: false,
                height: '40.79207920792079%',
                caption: false,
                navigation: true,
                fx: 'mosaic'
            });

            $('.flexslider').flexslider({
                animation: "slide",
                directionNav: true,
                pauseOnAction: false,
                pauseOnHover: true,
                
                controlNav: false, 
                
              });

            $('#sliderflex').flexslider({
                animation: "slide",
                directionNav: true,
                pauseOnAction: false,
                pauseOnHover: true,
                controlNav: false
              });
/*
            $('.img_border').hover(function() { 
                    $(this).children(".img_border2").fadeIn(); 
                }, function() { 
                    $(this).children(".img_border2").fadeOut(); 
                });
    
*/
            $('.videolink').hover(function() { 
                    $(this).children(".titlevideo").fadeIn(); 
                    $(this).children(".youtubeplay").fadeOut();
                    
                }, function() { 
                    $(this).children(".titlevideo").fadeOut(); 
                    $(this).children(".youtubeplay").fadeIn(); 
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